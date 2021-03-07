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
            'rol'=>1,
        ]);
        $usuario1=User::create([
            'nombres'=>'Moises',
            'apellidos'=>'Colque Sd',
            'nombreusuario'=>'moises',
            'email'=>'moises@mail.com',
            'password'=>Hash::make('moises123'),
            'rol'=>2,
        ]);
        $usuario2=User::create([
            'nombres'=>'Alicia',
            'apellidos'=>'Colque Sd',
            'nombreusuario'=>'alicia',
            'email'=>'alicia@mail.com',
            'password'=>Hash::make('alicia123'),
            'rol'=>3,
        ]);
    }
}
