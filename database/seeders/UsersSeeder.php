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
        $root->nationality = 'Mozambican';
        $root->city = 'Inhambane';
        $root->BI = 'MI98765433456';
        $root->birth ='08/04/1999';
        $root->passport ='NH098765';
        $root->password = 'liversage123';
        $root->save();

        $root = new User();
        $root->name = 'Elisa';
        $root->phone = '871218243';
        $root->user_type = 'Administrator';
        $root->email = 'elisaliversage@gmail.com';
        $root->nationality = 'Mozambican';
        $root->city = 'Inhambane';
        $root->BI = 'MI98765433456';
        $root->birth ='08/04/1999';
        $root->passport ='NH098765';
        $root->password = 'elisamario123';
        $root->save();

        $root = new User();
        $root->name = 'Chris';
        $root->phone = '871218243';
        $root->user_type = 'Administrator';
        $root->email = 'christopherliversage@gmail.com';
        $root->nationality = 'Mozambican';
        $root->city = 'Inhambane';
        $root->BI = 'MI98765433456';
        $root->birth ='08/04/1999';
        $root->passport ='NH098765';
        $root->password = 'chris1234';
        $root->save();

        $root = new User();
        $root->name = 'Paulo';
        $root->phone = '871218243';
        $root->user_type = 'Manager';
        $root->email = 'pauloliversage@gmail.com';
        $root->nationality = 'Mozambican';
        $root->city = 'Inhambane';
        $root->BI = 'MI98765433456';
        $root->birth ='08/04/1999';
        $root->passport ='NH098765';
        $root->password = 'paulo123';
        $root->save();
    }
}
