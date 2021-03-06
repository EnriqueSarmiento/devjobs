<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(CategoriaSeed::class);
        $this->call(UsuariosSeed::class);
        $this->call(ExperienciasSeed::class);
        $this->call(UbicacionSeed::class);
        $this->call(SalariosSeed::class);
    }
}
