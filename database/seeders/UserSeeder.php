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
        $this->createUser('member', 'Marwin', 'marwin@mailnesia.com', '6287786552759', 'Palembang, Indonesia', 'li01laravel');
        $this->createUser('member', 'Marcelino', 'marcelino@yopmail.com', '6289578836009', 'Bandung, Indonesia', 'li01laravel');
        $this->createUser('member', 'Gabriel', 'gabriel@gmail.com', '6287968900435', 'Surabaya, Indonesia', 'li01laravel');

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
