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

        $root = new User();
        $root->name = 'Elisa';
        $root->phone = '871218243';
        $root->user_type = 'Administrator';
        $root->email = 'elisaliversage@gmail.com';
        $root->password = 'elisamario123';
        $root->save();

        $root = new User();
        $root->name = 'Chris';
        $root->phone = '871218243';
        $root->user_type = 'Administrator';
        $root->email = 'christopherliversage@gmail.com';
        $root->password = 'chris1234';
        $root->save();

        $root = new User();
        $root->name = 'Paulo';
        $root->phone = '871218243';
        $root->user_type = 'Manager';
        $root->email = 'pauloliversage@gmail.com';
        $root->password = 'paulo123';
        $root->save();
    }
}
