<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CandidatoSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(ProfissionalSeeder::class);
        $this->call(RolesPermissionsSeeder::class);
        $this->call(EscolaridadeSeeder::class);
        $this->call(CursosSeeder::class);
        $this->call(FormacaoSeeder::class);
        $this->call(UsuarioAdminSeeder::class);
        $this->call(CidadeSeeder::class);
        $this->call(BairrosSeeder::class);
    }
}
