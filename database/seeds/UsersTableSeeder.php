<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $adminRole = Role::where('name','admin')->first();
        $userRole = Role::where('name','user')->first();
        $admin = User::create([
            'name'=>'Hariharan S',
            'email'=>'hari@example.com',
            'password'=>bcrypt('hari osr')
        ]);
        $user = User::create([
            'name'=>'vishnu',
            'email'=>'vishnu@example.com',
            'password'=>bcrypt('hari osr')
        ]);
        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
        factory(App\User::class,23)->create();

        
    }
}
