<?php

namespace Database\Seeders;

use App\Models\Profile;
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

        $this->call([
            TypesMovementSeeder::class,
            ProfileSeeder::class,
        ]);

        $this->createAdminUser();
        \App\Models\User::factory(50)->create();
        \App\Models\Movement::factory(150)->create();



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
            'id_profile'=>1,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
            ],
        ];
        User::insert($data);
    }

}
