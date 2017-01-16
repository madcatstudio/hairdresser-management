<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\User::create(array(
    		'name' => 'Administrator',
            'number' => '4881',
            'phone' => '3491066562',
            'email' => 'thebas81@gmail.com',
            'birthdate' => '1981-08-04',
            'note' => 'Amministratore del sito',
           	'avatar' => 'avatar04.png',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
    	));

    	App\Role::create(array(
        	'name' => 'admin',
        	'label' => 'Admin',
        ));

        DB::table('role_user')->insert([
        	'role_id' => '1',
        	'user_id' => '1',
        ]);
        factory(App\User::class, 50)->create();

        App\Company::create(array('name' => 'Davines'));
        App\Company::create(array('name' => 'Nika'));

        App\Service::create(array('name' => 'Taglio'));
        App\Service::create(array('name' => 'Colore'));
        App\Service::create(array('name' => 'Piega'));

        // $this->call(UsersTableSeeder::class);
    }
}
