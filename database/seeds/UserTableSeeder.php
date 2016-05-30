<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = new User();
        $user->age = 24;
        $user->avatar = "";
        $user->email = 'asdjklnsad@gmail.com';
        $user->gender  = 'male';
        $user->is_admin = 0;
        $user->name = str_random(10);
        $user->password = "7c4a8d09ca3762af61e59520943dc26494f8941b";

        $user->timestamps = true;

        $user->save();
    }
}
