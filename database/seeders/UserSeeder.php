<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mytime = new Carbon("America/La_Paz");
        User::create([
            'name' => 'user',
            'login' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            "x_fecha" => $mytime->toDateString(),
            "x_hora"  => $mytime->toTimeString(),
        ]);
        User::create([
            'name' => 'user',
            'email' => 'leonel@gmail.com',
            'login' => 'leonel',
            'password' => Hash::make('12345678'),
            "x_fecha" => $mytime->toDateString(),
            "x_hora"  => $mytime->toTimeString(),
        ]);
    }
}
