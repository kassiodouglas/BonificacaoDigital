<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TiposMovimentacao;

class TiposMovimentacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['tipo'=>'Saida', 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['tipo'=>'Entrada', 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
        ];

        TiposMovimentacao::insert($data);
    }
}
