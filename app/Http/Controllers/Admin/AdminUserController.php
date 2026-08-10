<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Support\AdminNotifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $role = trim((string) $request->input('role', 'all'));

        $users = User::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($innerQuery) use ($search) {
                    $innerQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                });
            })
            ->when($role !== '' && $role !== 'all', function ($query) use ($role) {
                $query->where('role', $role);
            })
            ->latest()
            ->paginate(10)
            ->appends($request->query());

        $roles = Role::orderBy('display_name')->get();

        return view('adminDashboard.pages.users.users.index', compact('users', 'roles', 'search', 'role'));
    }

    public function create()
    {
        $roles = Role::orderBy('display_name')->get();

        return view('adminDashboard.pages.users.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|exists:roles,name',
        ]);

        $newUser = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        AdminNotifier::notify(
            'New User Created',
            'A new user "' . $newUser->name . '" was created with role "' . $newUser->role . '".',
            route('admin.users.index'),
            'user_created',
            ['user_id' => $newUser->id]
        );

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('display_name')->get();

        return view('adminDashboard.pages.users.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|exists:roles,name',
        ]);

        $isLastAdmin = $user->role === 'admin' && User::where('role', 'admin')->count() <= 1;

        if ($isLastAdmin && $validated['role'] !== 'admin') {
            return back()->withInput()->with('error', 'Cannot change role of the last admin user.');
        }

        $user->update($validated);

        AdminNotifier::notify(
            'User Updated',
            'User "' . $user->name . '" was updated.',
            route('admin.users.index'),
            'user_updated',
            ['user_id' => $user->id]
        );

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully');
    }

    public function resetPassword(User $user)
    {
        $user->update([
            'password' => Hash::make('password'),
        ]);

        AdminNotifier::notify(
            'User Password Reset',
            'Password was reset for user "' . $user->name . '".',
            route('admin.users.index'),
            'user_password_reset',
            ['user_id' => $user->id]
        );

        return redirect()->route('admin.users.index')
            ->with('success', 'Password reset to default: password');
    }

    public function destroy(User $user)
    {
        if ((int) auth()->id() === (int) $user->id) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        if ($user->role === 'admin' && User::where('role', 'admin')->count() <= 1) {
            return back()->with('error', 'Cannot delete last admin user.');
        }

        $deletedUserName = $user->name;
        $deletedUserId = $user->id;
        $user->delete();

        AdminNotifier::notify(
            'User Deleted',
            'User "' . $deletedUserName . '" was deleted.',
            route('admin.users.index'),
            'user_deleted',
            ['user_id' => $deletedUserId]
        );

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully');
    }
}
