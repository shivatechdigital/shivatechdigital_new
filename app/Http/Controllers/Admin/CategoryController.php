<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categories.view')->only(['index', 'show']);
        $this->middleware('permission:categories.create')->only(['create', 'store', 'import']);
        $this->middleware('permission:categories.update')->only(['edit', 'update']);
        $this->middleware('permission:categories.delete')->only(['destroy', 'bulkDelete']);
    }

    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $imageFilter = (string) $request->input('image_filter', 'all');
        $sortBy = (string) $request->input('sort_by', 'created');
        $sortOrder = strtolower((string) $request->input('sort_order', 'desc'));
        $allowedPerPage = [10, 20, 50, 100];
        $perPage = (int) $request->input('per_page', 10);

        if (!in_array($perPage, $allowedPerPage, true)) {
            $perPage = 10;
        }

        if (!in_array($sortOrder, ['asc', 'desc'], true)) {
            $sortOrder = 'desc';
        }

        $sortMap = [
            'number' => 'id',
            'name' => 'name',
            'slug' => 'slug',
            'posts_count' => 'posts_count',
            'created' => 'created_at',
        ];

        if (!array_key_exists($sortBy, $sortMap)) {
            $sortBy = 'created';
        }

        $categoriesQuery = $this->buildCategoriesQuery($search, $imageFilter)
            ->orderBy($sortMap[$sortBy], $sortOrder);

        $categories = $categoriesQuery
            ->paginate($perPage)
            ->appends($request->query());

        return view('adminDashboard.pages.categories.index', compact(
            'categories',
            'search',
            'imageFilter',
            'sortBy',
            'sortOrder',
            'perPage'
        ));
    }

    public function create()
    {
        return view('adminDashboard.pages.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        Category::create($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('adminDashboard.pages.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
            'remove_image' => 'nullable|boolean',
        ]);

        if ($request->boolean('remove_image') && $category->image) {
            Storage::disk('public')->delete($category->image);
            $validated['image'] = null;
            $category->image = null;
        }

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }

    public function bulkDelete(Request $request)
    {
        $validated = $request->validate([
            'category_ids' => 'required|array|min:1',
            'category_ids.*' => 'exists:categories,id',
        ]);

        $categories = Category::whereIn('id', $validated['category_ids'])->get();

        foreach ($categories as $category) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $category->delete();
        }

        return redirect()->route('admin.categories.index')
            ->with('success', 'Selected categories deleted successfully');
    }

    public function export(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $imageFilter = (string) $request->input('image_filter', 'all');

        $categories = $this->buildCategoriesQuery($search, $imageFilter)
            ->orderBy('created_at', 'desc')
            ->get();

        $filename = 'categories-' . now()->format('Ymd-His') . '.csv';

        return response()->streamDownload(function () use ($categories) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['name', 'description']);

            foreach ($categories as $category) {
                fputcsv($handle, [
                    $category->name,
                    $category->description,
                ]);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }

    public function import(Request $request)
    {
        $validated = $request->validate([
            'import_file' => 'required|file|mimes:csv,txt|max:4096',
        ]);

        $filePath = $validated['import_file']->getRealPath();
        $handle = fopen($filePath, 'r');

        if ($handle === false) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Unable to read the import file.');
        }

        $header = fgetcsv($handle);
        $imported = 0;
        $skipped = 0;

        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) < 1) {
                $skipped++;
                continue;
            }

            $name = trim((string) ($row[0] ?? ''));
            $description = trim((string) ($row[1] ?? ''));

            if ($name === '') {
                $skipped++;
                continue;
            }

            $exists = Category::whereRaw('LOWER(name) = ?', [Str::lower($name)])->exists();
            if ($exists) {
                $skipped++;
                continue;
            }

            Category::create([
                'name' => $name,
                'description' => $description !== '' ? $description : null,
            ]);
            $imported++;
        }

        fclose($handle);

        return redirect()->route('admin.categories.index')
            ->with('success', "Import completed. Imported: {$imported}, Skipped: {$skipped}");
    }

    private function buildCategoriesQuery(string $search, string $imageFilter)
    {
        $query = Category::withCount('posts');

        if ($search !== '') {
            $query->where(function ($innerQuery) use ($search) {
                $innerQuery->where('name', 'like', '%' . $search . '%')
                    ->orWhere('slug', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($imageFilter === 'with_image') {
            $query->whereNotNull('image')->where('image', '!=', '');
        } elseif ($imageFilter === 'without_image') {
            $query->where(function ($innerQuery) {
                $innerQuery->whereNull('image')->orWhere('image', '');
            });
        }

        return $query;
    }
}