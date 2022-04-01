<?php

namespace Database\Seeders;

use App\Models\Perfis;
use Illuminate\Database\Seeder;

class PerfisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['perfil'=>'Adminstrador', 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['perfil'=>'Usuário', 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
        ];

        Perfis::insert($data);
    }
}
