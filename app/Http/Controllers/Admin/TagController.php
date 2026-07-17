<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('posts')->paginate(15);
        return view('adminDashboard.pages.tags.index', compact('tags'));
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
        return view('admin.tags.edit', compact('tag'));
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
}