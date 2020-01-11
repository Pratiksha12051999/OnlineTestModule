<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('admin.admin_name')){
            User::firstOrCreate(
                ['email'=>config('admin.admin_email')],
                ['name'=>config('admin.admin_name'),
                'role'=>config('admin.admin_role'),
                'phone'=>config('admin.admin_phone'),
                'password'=>bcrypt(config('admin.admin_password')),]
            );
        }
    }
}