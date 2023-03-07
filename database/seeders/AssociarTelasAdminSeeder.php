<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tela;
use App\Models\PerfilTela;

class AssociarTelasAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Associa todas as telas ao perfil super admin
        foreach(Tela::all() as $tela) {
            PerfilTela::create([
                "tela_id" => $tela->id,
                "perfil_id" => 1,
                "created_at" => new \DateTime("now")
            ]);
        }
    }
}
