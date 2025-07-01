<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a superadmin user
        $superadmin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin12345')
        ]);
        $roleSuperAdmin = Role::firstOrCreate(['name' => 'superadmin']);
        $superadmin->assignRole($roleSuperAdmin);

        // Create a regular user
        $user = User::create([
            'name' => '06.2024.1.07763 - CHRISTIAN CHANDRA',
            'email' => '07763@user.com',
            'password' => bcrypt('062024107763')
        ]);
        $roleUser = Role::firstOrCreate(['name' => 'user']);
        $user->assignRole($roleUser);
        
        // Create a regular user
        $user = User::create([
            'name' => '06.2024.1.07770 - SATRIO ATHALLAH KRESNO PRAMUDYA',
            'email' => '07770@user.com',
            'password' => bcrypt('062024107770')
        ]);
        $roleUser = Role::firstOrCreate(['name' => 'user']);
        $user->assignRole($roleUser);
        
        // Create a regular user
        $user = User::create([
            'name' => '06.2024.1.07774 - MAHESA DHARMA GALIH',
            'email' => '07774@user.com',
            'password' => bcrypt('062024107774')
        ]);
        $roleUser = Role::firstOrCreate(['name' => 'user']);
        $user->assignRole($roleUser);

        // Create a regular user
        $user = User::create([
            'name' => '06.2024.1.07816 - NUR ALFIYATUR ROSYIDAH',
            'email' => '07816@user.com',
            'password' => bcrypt('062024107816')
        ]);
        $roleUser = Role::firstOrCreate(['name' => 'user']);
        $user->assignRole($roleUser);
        
        // Create a regular user
        $user = User::create([
            'name' => '06.2024.1.07753 - RIZAL ENDRA PROAYOGA',
            'email' => '07753@user.com',
            'password' => bcrypt('062024107753')
        ]);
        $roleUser = Role::firstOrCreate(['name' => 'user']);
        $user->assignRole($roleUser);
    }
}
