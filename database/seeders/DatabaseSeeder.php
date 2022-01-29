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
        $this->call(UserSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(MonedaSeeder::class);
        $this->call(ComprobanteTipoSeeder::class);
        $this->call(EspecificaSeeder::class);
        $this->call(ConfiguracionDeParametrosDelSistemaSeeder::class);

        $this->call(GrupoUsuarioSeeder::class);
        $this->call(FormularioSeeder::class);
        $this->call(AsignarFormularioSeeder::class);
        
        
    }
}
