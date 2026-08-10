<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Support\AdminNotifier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));

        $roles = Role::query()
            ->withCount('permissions')
            ->when($search !== '', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('display_name', 'like', '%' . $search . '%');
            })
            ->orderBy('display_name')
            ->paginate(10)
            ->appends($request->query());

        return view('adminDashboard.pages.users.roles.index', compact('roles', 'search'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'display_name' => 'required|string|max:100|unique:roles,display_name',
            'name' => 'nullable|string|max:100|unique:roles,name',
            'description' => 'nullable|string|max:500',
        ]);

        $roleName = $validated['name'] ?? Str::slug($validated['display_name'], '_');

        $role = Role::create([
            'name' => $roleName,
            'display_name' => $validated['display_name'],
            'description' => $validated['description'] ?? null,
        ]);

        AdminNotifier::notify(
            'Role Created',
            'A new role "' . $role->display_name . '" was created.',
            route('admin.roles.index'),
            'role_created',
            ['role_id' => $role->id]
        );

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role created successfully');
    }

    public function edit(Role $role)
    {
        return view('adminDashboard.pages.users.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        if ($role->name === 'admin') {
            $request->validate([
                'display_name' => 'required|string|max:100',
                'description' => 'nullable|string|max:500',
            ]);

            $role->update([
                'display_name' => $request->display_name,
                'description' => $request->description,
            ]);

            AdminNotifier::notify(
                'Role Updated',
                'Admin role details were updated.',
                route('admin.roles.index'),
                'role_updated',
                ['role_id' => $role->id]
            );

            return redirect()->route('admin.roles.index')
                ->with('success', 'Admin role updated successfully');
        }

        $validated = $request->validate([
            'display_name' => 'required|string|max:100|unique:roles,display_name,' . $role->id,
            'name' => 'required|string|max:100|unique:roles,name,' . $role->id,
            'description' => 'nullable|string|max:500',
        ]);

        $role->update($validated);

        AdminNotifier::notify(
            'Role Updated',
            'Role "' . $role->display_name . '" was updated.',
            route('admin.roles.index'),
            'role_updated',
            ['role_id' => $role->id]
        );

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully');
    }
}
