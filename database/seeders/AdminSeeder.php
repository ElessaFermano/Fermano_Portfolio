<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert ([
            [ 
        'role' => 'admin',
        'name' => 'Elessa',
        'email' => 'elessafermano@gmail.com',
        'password' => Hash::make('12345678'),
            ]
            ]);


            DB::table('about')->insert ([
                [ 
            'name'=> 'Elessa Mae Fermano',      
            'date_of_birth' => '2002-09-02',
            'brgy' => 'Sto. Nino',
            'municipality' => 'Hilongos',
            'province' => 'Leyte',
            'zipcode' => '6524',
            'email' => 'em.fermano@mlgcl.edu.ph',
            'age' => '21',
            
            
             ]
             ]);

             DB::table('contact')->insert ([
                [
                    'phone' => '09973208548',
                    'facebook' => 'https://www.facebook.com/elessa.fermano',
                    'email' => 'em.fermano@mlgcl.edu.ph',
                    'linkedin' => 'https://www.linkedin.com/in/elessa-mae-fermano-371b81258/',
                ]
                ]);
    }


}
