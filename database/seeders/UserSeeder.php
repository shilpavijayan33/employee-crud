<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= new User();
        $user->name='admin';
        $user->password=bcrypt('123456');
        $user->email='admin@test.com';
        $user->designation_id=1;
        $user->save();
    }
}
