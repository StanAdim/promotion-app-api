<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Admin',
            'email'=> 'ictsupport@ictc.go.tz',
            'password'=> bcrypt("123456")
        ]);
        User::create([
            'name'=> 'Admin',
            'email'=> 'jonathan.mbailuka@sido.go.tz',
            'password'=> bcrypt("jonathan.mb")
        ]);
        User::create([
            'name'=> 'Admin',
            'email'=> 'antonia.masoy@sido.go.tz',
            'password'=> bcrypt("antonia.ma")
        ]);
    }
}
