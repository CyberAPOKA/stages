<?php

use Illuminate\Database\Seeder;

class UsuarioAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Administrador TI',
            'email' => 'prefeiturasaoleopoldo@gmail.com',
            'password' => bcrypt('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('candidatos')->insert([
            'name' => 'Administrador TI',
            'email' => 'prefeiturasaoleopoldo@gmail.com',
            'cpf' => '73730348027',
            'user_id' => '51',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('model_has_roles')->insert([
            'role_id' => '1',
            'model_type' => 'App\User',
            'model_id' => '51',

        ]);
    }
}
