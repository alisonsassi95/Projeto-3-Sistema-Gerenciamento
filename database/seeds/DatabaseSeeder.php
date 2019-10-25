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
        DB::table('profiles')->insert([
            ['id' => 1, 'name' => 'Administrador', 'description' => 'Administrador do sistema'],
            ['id' => 2, 'name' => 'Funcionário', 'description' => 'Todos os funcionários que utilizarão o sistema.'],
            ['id' => 3, 'name' => 'Cliente', 'description' => 'Cliente.']
        ]);
        DB::table('peoples')->insert([
           // ['id' => 1, 'name' => 'Administrador', 'birthdate' => '2999-01-01', 'genre' => 'M', 'cpf' => '12345677890','rg' => '1234567789', 'address' => 'Rua', 'number' => '12345',  'district' => 'Admin',  'complement' => 'Sem complemento', 'cep' => '987654321', 'state' => 'RS', 'city' => 'Ijuí', 'telephone' => '9978988765', 'email' => 'Admin@Admin.com', 'obs' => 'ele é o adin', 'profile' => '1'],
           ['id' => 1, 'name' => 'Administrador', 'birthdate' => '2999-01-01', 'genre' => 'M', 'cpf' => '12345677890','rg' => '1234567789', 'address' => 'Rua', 'number' => '12345',  'district' => 'Admin',  'complement' => 'Sem complemento', 'cep' => '987654321', 'state' => 'RS', 'city' => 'Ijuí', 'telephone' => '9978988765', 'email' => 'Admin@Admin.com', 'obs' => 'ele é o adin', 'plate'=> 'iox-3919', 'Veic_color'=> 'Preta', 'Veic_model'=> 'BMW', 'Veic_description'=> 'parece uma nave', 'profile' => '1'],
           ]);
        DB::table('users')->insert(
            ['name' => 'admin','user'=> 'admin','email' => 'admin@admin.com','password' => bcrypt('admin'),'profile' => 'Administrador','people_id' => '1',],
        );
        
            }
}
