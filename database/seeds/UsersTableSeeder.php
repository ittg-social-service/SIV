<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          array('name' => str_random(10),
                'lastname' => str_random(10),
                'email' => 'admin@admin.com',
                'password' => bcrypt('prevecaradmin'),
                'role' => 'admin'
                )
/*          array('name' => str_random(10),
                'email' => 'eliver@eliver.com',
                'password' => bcrypt('usuarioeliver'),
                ),*/
            
        ]);
    }
}
