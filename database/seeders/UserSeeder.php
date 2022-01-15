<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->createUser('admin', 'Fajar', 'fajar.hamdani@binus.ac.id', '6287786552759', 'Jakarta, Indonesia', 'li01laravel');
        $this->createUser('member', 'Member 1', 'member1@yopmail.com', '6287786552759', 'Palembang, Indonesia', 'li01laravel');
    }

    private function createUser($role, $name, $email, $phone, $address, $password)
    {
        $user = new User();
        $user->role = $role;
        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->address = $address;
        $user->password = Hash::make($password);
        $user->save();
    }
}
