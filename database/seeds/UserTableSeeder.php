<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_author = Role::where('name', 'Author')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->first_name = 'Rana';
        $user->last_name = 'Ali';
        $user->address = 'Street 123';
        $user->city = 'Cairo';
        $user->email = 'rana@email.com';
        $user->password = bcrypt('visitor');
        $user->save();
        $user->roles()->attach($role_user);
                
        $admin = new User();
        $admin->first_name = 'Ahmed';
        $admin->last_name = 'Essam';
        $admin->address = 'Street 123';
        $admin->city = 'Cairo';
        $admin->email = 'admin@email.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $author = new User();
        $author->first_name = 'Ali';
        $author->last_name = 'Koko';
        $author->address = 'Street 123';
        $author->city = 'Cairo';
        $author->email = 'koko@email.com';
        $author->password = bcrypt('author');
        $author->save();
        $author->roles()->attach($role_author);
    }
}
