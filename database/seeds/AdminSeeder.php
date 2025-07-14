<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $usersData = [
            [
                'name' => "Ananda Gharyn",
                'username' => "haijan",
                'email' => "gharyn@gmail.com",
                'phone_number' => "08112051201",
                'password' => 'admin123',
                'gender' => "laki-laki",
                'level' => "admin",
            ],
            [
                'name' => "Alia Nadia",
                'username' => "nadia",
                'email' => "nadia@gmail.com",
                'phone_number' => "08598345931",
                'password' => 'aliadinda',
                'gender' => "perempuan",
                'level' => "pic",
                'departement' => "Hospital Kitchen",
            ],
            [
                'name' => "Yanto Hamna",
                'username' => "yanto",
                'email' => "hamna.id@gmail.com",
                'phone_number' => "08256389945",
                'password' => 'aliadinda',
                'gender' => "laki-laki",
                'level' => "teknisi",
                'role' => "kap_teknisi",
            ],
            [
                'name' => "Arman Hiddan",
                'username' => "arman",
                'email' => "armand@gmail.com",
                'phone_number' => "08258163895",
                'password' => 'arman123',
                'gender' => "laki-laki",
                'level' => "teknisi",
            ],
        ];
        
        foreach ($usersData as $userData) {
            $user = new \App\User;
            $user->fill($userData);
            $user->slug = Str::slug($userData['username']);
            $user->password = \Hash::make($userData['password']);
            $user->pass_view = $userData['password'];
            $user->save();
        }
    
    }
}