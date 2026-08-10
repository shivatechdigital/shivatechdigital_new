<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tags.view')->only(['index', 'show']);
        $this->middleware('permission:tags.create')->only(['create', 'store']);
        $this->middleware('permission:tags.update')->only(['edit', 'update']);
        $this->middleware('permission:tags.delete')->only(['destroy', 'bulkDelete']);
    }

    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
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

        $tags = $this->buildTagsQuery($search)
            ->orderBy($sortMap[$sortBy], $sortOrder)
            ->paginate($perPage)
            ->appends($request->query());

        return view('adminDashboard.pages.tags.index', compact(
            'tags',
            'search',
            'sortBy',
            'sortOrder',
            'perPage'
        ));
    }

    public function create()
    {
        return view('adminDashboard.pages.tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:tags|max:255'
        ]);

        Tag::create($validated);

        return redirect()->route('admin.tags.index')
            ->with('success', 'Tag created successfully');
    }

    public function edit(Tag $tag)
    {
        return view('adminDashboard.pages.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:tags,name,' . $tag->id
        ]);

        $tag->update($validated);

        return redirect()->route('admin.tags.index')
            ->with('success', 'Tag updated successfully');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')
            ->with('success', 'Tag deleted successfully');
    }

    public function bulkDelete(Request $request)
    {
        $validated = $request->validate([
            'tag_ids' => 'required|array|min:1',
            'tag_ids.*' => 'exists:tags,id',
        ]);

        Tag::whereIn('id', $validated['tag_ids'])->delete();

        return redirect()->route('admin.tags.index')
            ->with('success', 'Selected tags deleted successfully');
    }

    private function buildTagsQuery(string $search)
    {
        $query = Tag::withCount('posts');

        if ($search !== '') {
            $query->where(function ($innerQuery) use ($search) {
                $innerQuery->where('name', 'like', '%' . $search . '%')
                    ->orWhere('slug', 'like', '%' . $search . '%');
            });
        }

        return $query;
    }
}