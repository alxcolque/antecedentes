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
            'name'=>'Joselito',
            'lastname'=>'Corre Ysalta',
            'username'=>'Admin',
            'email'=>'admin@mail.com',
            'password'=>Hash::make('admin123'),
            'rol'=>1,
            'foto'=>'user.png',
        ]);
        $usuario1=User::create([
            'name'=>'Usuario1',
            'lastname'=>'X Y',
            'username'=>'usuario1',
            'email'=>'usuario1@mail.com',
            'password'=>Hash::make('usuario1123'),
            'rol'=>2,
            'foto'=>'user.png',
        ]);
        $usuario2=User::create([
            'name'=>'Constantino',
            'lastname'=>'Del Castillo',
            'username'=>'consultor',
            'email'=>'consultor@mail.com',
            'password'=>Hash::make('consultor123'),
            'rol'=>3,
            'foto'=>'user.png',
        ]);
    }
}
