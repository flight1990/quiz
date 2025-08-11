<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'quiz.create', 'quiz.edit', 'quiz.delete', 'quiz.view', 'quiz.view_all',
            'role.create', 'role.edit', 'role.delete', 'role.view',
            'user.create', 'user.edit', 'user.delete', 'user.view',
            'question.create', 'question.edit', 'question.delete', 'question.view',
            'option.create', 'option.edit', 'option.delete', 'option.view',
            'answer.create', 'answer.edit', 'answer.delete', 'answer.view',
            'guest-user.view', 'guest-user.delete',
            'quiz-user.view', 'quiz-user.delete',
            'unit.create', 'unit.edit', 'unit.delete', 'unit.view',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'api'
            ]);
        }

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'api'
        ]);

        $role->givePermissionTo(Permission::all());

        $admin = User::firstOrCreate(
            ['name' => 'admin'],
            [
                'email' => 'admin@example.com',
                'password' => bcrypt('password') // можно заменить на свой
            ]
        );

        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
