<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'admin' => 'Administrator',
            'manager' => 'Manager',
            'content_writer' => 'Content Writer',
        ];

        foreach ($roles as $name => $displayName) {
            Role::updateOrCreate(
                ['name' => $name],
                ['display_name' => $displayName, 'description' => $displayName . ' role']
            );
        }

        $permissions = [
            ['name' => 'dashboard.view', 'label' => 'View Dashboard', 'group' => 'Dashboard'],
            ['name' => 'sitedetails.manage', 'label' => 'Manage Site Details', 'group' => 'Settings'],
            ['name' => 'contacts.manage', 'label' => 'Manage Enquiries', 'group' => 'Contacts'],
            ['name' => 'about.manage', 'label' => 'Manage About Page', 'group' => 'About'],

            ['name' => 'posts.view', 'label' => 'View Posts', 'group' => 'Posts'],
            ['name' => 'posts.create', 'label' => 'Create Posts', 'group' => 'Posts'],
            ['name' => 'posts.update', 'label' => 'Update Posts', 'group' => 'Posts'],
            ['name' => 'posts.delete', 'label' => 'Delete Posts', 'group' => 'Posts'],

            ['name' => 'categories.view', 'label' => 'View Categories', 'group' => 'Categories'],
            ['name' => 'categories.create', 'label' => 'Create Categories', 'group' => 'Categories'],
            ['name' => 'categories.update', 'label' => 'Update Categories', 'group' => 'Categories'],
            ['name' => 'categories.delete', 'label' => 'Delete Categories', 'group' => 'Categories'],

            ['name' => 'tags.view', 'label' => 'View Tags', 'group' => 'Tags'],
            ['name' => 'tags.create', 'label' => 'Create Tags', 'group' => 'Tags'],
            ['name' => 'tags.update', 'label' => 'Update Tags', 'group' => 'Tags'],
            ['name' => 'tags.delete', 'label' => 'Delete Tags', 'group' => 'Tags'],

            ['name' => 'partners.view', 'label' => 'View Partners', 'group' => 'Partners'],
            ['name' => 'partners.create', 'label' => 'Create Partners', 'group' => 'Partners'],
            ['name' => 'partners.update', 'label' => 'Update Partners', 'group' => 'Partners'],
            ['name' => 'partners.delete', 'label' => 'Delete Partners', 'group' => 'Partners'],

            ['name' => 'casestudies.view', 'label' => 'View Case Studies', 'group' => 'Case Studies'],
            ['name' => 'casestudies.create', 'label' => 'Create Case Studies', 'group' => 'Case Studies'],
            ['name' => 'casestudies.update', 'label' => 'Update Case Studies', 'group' => 'Case Studies'],
            ['name' => 'casestudies.delete', 'label' => 'Delete Case Studies', 'group' => 'Case Studies'],

            ['name' => 'jobs.view', 'label' => 'View Job Openings', 'group' => 'Jobs'],
            ['name' => 'jobs.create', 'label' => 'Create Job Openings', 'group' => 'Jobs'],
            ['name' => 'jobs.update', 'label' => 'Update Job Openings', 'group' => 'Jobs'],
            ['name' => 'jobs.delete', 'label' => 'Delete Job Openings', 'group' => 'Jobs'],

            ['name' => 'jobapplications.view', 'label' => 'View Job Applications', 'group' => 'Jobs'],
            ['name' => 'jobapplications.update', 'label' => 'Update Job Applications', 'group' => 'Jobs'],
            ['name' => 'jobapplications.delete', 'label' => 'Delete Job Applications', 'group' => 'Jobs'],

            ['name' => 'pricing.view', 'label' => 'View Pricing Plans', 'group' => 'Pricing'],
            ['name' => 'pricing.create', 'label' => 'Create Pricing Plans', 'group' => 'Pricing'],
            ['name' => 'pricing.update', 'label' => 'Update Pricing Plans', 'group' => 'Pricing'],
            ['name' => 'pricing.delete', 'label' => 'Delete Pricing Plans', 'group' => 'Pricing'],

            ['name' => 'quotes.view', 'label' => 'View Quote Requests', 'group' => 'Quotes'],
            ['name' => 'quotes.manage', 'label' => 'Manage Quote Requests/Options', 'group' => 'Quotes'],

            ['name' => 'clientprojects.view', 'label' => 'View Client Projects', 'group' => 'Client Projects'],
            ['name' => 'clientprojects.create', 'label' => 'Create Client Projects', 'group' => 'Client Projects'],
            ['name' => 'clientprojects.update', 'label' => 'Update Client Projects', 'group' => 'Client Projects'],
            ['name' => 'clientprojects.delete', 'label' => 'Delete Client Projects', 'group' => 'Client Projects'],

            ['name' => 'comments.view', 'label' => 'View Comments', 'group' => 'Comments'],
            ['name' => 'comments.reply', 'label' => 'Reply Comments', 'group' => 'Comments'],
            ['name' => 'comments.delete', 'label' => 'Delete Comments', 'group' => 'Comments'],

            ['name' => 'servicequeries.view', 'label' => 'View Service Queries', 'group' => 'Service Queries'],
            ['name' => 'servicequeries.update', 'label' => 'Update Service Queries', 'group' => 'Service Queries'],
            ['name' => 'servicequeries.delete', 'label' => 'Delete Service Queries', 'group' => 'Service Queries'],
            ['name' => 'servicequeries.resolve', 'label' => 'Resolve Service Queries', 'group' => 'Service Queries'],

            ['name' => 'roles.manage', 'label' => 'Manage Roles', 'group' => 'Users'],
            ['name' => 'permissions.manage', 'label' => 'Manage Permissions', 'group' => 'Users'],
            ['name' => 'users.view', 'label' => 'View Users', 'group' => 'Users'],
            ['name' => 'users.create', 'label' => 'Create Users', 'group' => 'Users'],
            ['name' => 'users.update', 'label' => 'Update Users', 'group' => 'Users'],
            ['name' => 'users.delete', 'label' => 'Delete Users', 'group' => 'Users'],
            ['name' => 'users.reset_password', 'label' => 'Reset User Password', 'group' => 'Users'],
        ];

        foreach ($permissions as $permissionData) {
            Permission::updateOrCreate(
                ['name' => $permissionData['name']],
                $permissionData
            );
        }

        $admin = Role::where('name', 'admin')->first();
        $manager = Role::where('name', 'manager')->first();
        $writer = Role::where('name', 'content_writer')->first();

        if ($admin) {
            $admin->permissions()->sync(Permission::pluck('id')->all());
        }

        if ($manager) {
            $managerPermissionNames = [
                'dashboard.view',
                'contacts.manage',
                'about.manage',
                'posts.view',
                'posts.create',
                'posts.update',
                'categories.view',
                'categories.create',
                'categories.update',
                'tags.view',
                'tags.create',
                'tags.update',
                'partners.view',
                'partners.create',
                'partners.update',
                'casestudies.view',
                'casestudies.create',
                'casestudies.update',
                'jobs.view',
                'jobs.create',
                'jobs.update',
                'jobapplications.view',
                'jobapplications.update',
                'pricing.view',
                'pricing.create',
                'pricing.update',
                'quotes.view',
                'quotes.manage',
                'clientprojects.view',
                'clientprojects.create',
                'clientprojects.update',
                'comments.view',
                'comments.reply',
                'servicequeries.view',
                'servicequeries.update',
                'servicequeries.resolve',
                'users.view',
            ];

            $manager->permissions()->sync(
                Permission::whereIn('name', $managerPermissionNames)->pluck('id')->all()
            );
        }

        if ($writer) {
            $writerPermissionNames = [
                'dashboard.view',
                'posts.view',
                'posts.create',
                'posts.update',
                'categories.view',
                'tags.view',
                'jobs.view',
                'jobapplications.view',
                'quotes.view',
                'comments.view',
                'comments.reply',
            ];

            $writer->permissions()->sync(
                Permission::whereIn('name', $writerPermissionNames)->pluck('id')->all()
            );
        }
    }
}
