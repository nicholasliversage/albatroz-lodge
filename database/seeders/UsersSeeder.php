<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    //
        $root = new User();
        $root->name = 'Nick';
        $root->phone = '871218243';
        $root->user_type = 'Administrator';
        $root->email = 'nicolasliversage@gmail.com';
        $root->password = 'liversage123';
        $root->save();
    }
}
