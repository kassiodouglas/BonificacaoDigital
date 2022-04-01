<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        $this->call([
            TiposMovimentacaoSeeder::class,
            PerfisSeeder::class,
        ]);

        $this->createAdminUser();
    }

    private function createAdminUser()
    {
        $data = [
            [
            'name'=>'Administrador',
            'login'=>'admin',
            'password'=> Hash::make('admin'),
            'email'=>'admin@bonificacaodigital.com',
            'id_admin'=>1,
            'id_perfil'=>1,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
            ],
        ];
        User::insert($data);
    }

}
