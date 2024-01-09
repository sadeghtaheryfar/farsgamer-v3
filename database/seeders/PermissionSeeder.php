<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'show_categories']);
        Permission::create(['name' => 'create_categories']);
        Permission::create(['name' => 'edit_categories']);
        Permission::create(['name' => 'delete_categories']);

        Permission::create(['name' => 'show_currencies']);
        Permission::create(['name' => 'create_currencies']);
        Permission::create(['name' => 'edit_currencies']);
        Permission::create(['name' => 'delete_currencies']);

        Permission::create(['name' => 'show_products']);
        Permission::create(['name' => 'create_products']);
        Permission::create(['name' => 'edit_products']);
        Permission::create(['name' => 'delete_products']);

        Permission::create(['name' => 'show_orders']);
        Permission::create(['name' => 'edit_orders']);
        Permission::create(['name' => 'delete_orders']);

        Permission::create(['name' => 'show_comments']);
        Permission::create(['name' => 'edit_comments']);
        Permission::create(['name' => 'delete_comments']);

        Permission::create(['name' => 'show_questions']);
        Permission::create(['name' => 'edit_questions']);
        Permission::create(['name' => 'delete_questions']);

        Permission::create(['name' => 'show_articles']);
        Permission::create(['name' => 'create_articles']);
        Permission::create(['name' => 'edit_articles']);
        Permission::create(['name' => 'delete_articles']);

        Permission::create(['name' => 'show_users']);
        Permission::create(['name' => 'edit_users']);

        Permission::create(['name' => 'show_roles']);
        Permission::create(['name' => 'create_roles']);
        Permission::create(['name' => 'edit_roles']);
        Permission::create(['name' => 'delete_roles']);

        Permission::create(['name' => 'show_logs']);

        Permission::create(['name' => 'show_settings']);
        Permission::create(['name' => 'create_settings']);
        Permission::create(['name' => 'edit_settings']);
        Permission::create(['name' => 'delete_settings']);
    }
}
