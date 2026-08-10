<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::orderBy('display_name')->get();

        $selectedRoleId = (int) $request->input('role_id', (int) optional($roles->first())->id);
        $selectedRole = $roles->firstWhere('id', $selectedRoleId);

        if (!$selectedRole && $roles->isNotEmpty()) {
            $selectedRole = $roles->first();
            $selectedRoleId = (int) $selectedRole->id;
        }

        $permissions = Permission::orderBy('group')
            ->orderBy('label')
            ->get()
            ->groupBy('group');

        $assignedPermissionIds = $selectedRole
            ? $selectedRole->permissions()->pluck('permissions.id')->toArray()
            : [];

        return view('adminDashboard.pages.users.permissions.index', compact(
            'roles',
            'selectedRole',
            'selectedRoleId',
            'permissions',
            'assignedPermissionIds'
        ));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $permissionIds = $validated['permissions'] ?? [];

        if ($role->name === 'admin') {
            $permissionIds = Permission::pluck('id')->all();
        }

        $role->permissions()->sync($permissionIds);

        return redirect()->route('admin.permissions.index', ['role_id' => $role->id])
            ->with('success', $role->name === 'admin'
                ? 'Admin role always retains all permissions. Update applied with full access.'
                : 'Permissions updated successfully');
    }
}
