<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TiposMovimentacao;
use App\Models\TypesMovement;

class TypesMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['type'=>'Saida', 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['type'=>'Entrada', 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
        ];

        TypesMovement::insert($data);
    }
}
