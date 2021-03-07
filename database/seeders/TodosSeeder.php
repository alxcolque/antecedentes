<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarioadmin=User::create([
            'nombres'=>'admin alex',
            'apellidos'=>'Colque Sd',
            'nombreusuario'=>'admin',
            'email'=>'admin@mail.com',
            'password'=>Hash::make('admin123'),
            'fullacceso'=>'yes',
        ]);
        $usuario1=User::create([
            'nombres'=>'usuario moises',
            'apellidos'=>'Colque Sd',
            'nombreusuario'=>'moises',
            'email'=>'moises@mail.com',
            'password'=>Hash::make('moises123'),
            'fullacceso'=>'no',
        ]);
    }
}
