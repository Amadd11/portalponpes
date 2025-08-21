<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        $admin = User::updateOrCreate(
            ['email' => 'admin@mail.com'],
            [
                'name' => 'Admin Pondok',
                'password' => bcrypt('m4qro4h1m4msy4t1b1'),
            ]
        );

        $admin->assignRole('admin');
    }
}
