<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Hana',
               'email'=>'admin@gmail.com',
               'phone' =>'013265478',
               'ic' =>'9632215478',
               'address' =>'Selangor',
               'is_admin'=>'1',
               'password'=> bcrypt('password'),
            ],
            [
                'name'=>'Nurul',
                'email'=>'nurul.work90@gmail.com',
                'phone' =>'011147585',
                'ic' =>'87447474747',
                'address' =>'Puncak Alam',
                'is_admin'=>'0',
                'password'=> bcrypt('password'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
