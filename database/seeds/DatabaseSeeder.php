<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
/*     User::create(
      [
          'name' => 'Superadmin',
          'email' => 'superadmin@admin.com',
          'password' => bcrypt('123123')
      ]
		);

		User::create(
			[
					'name' => 'Agatha',
					'email' => 'agatha@tmp.com',
					'password' => bcrypt('123123')
			]
		); */
		// Deshabilitar la revisión de las llaves foráneas
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		$this->call(UsersTableSeeder::class);
		$this->call(PostsTableSeeder::class);

		// Habilitar la revisiÔøΩn de las llaves forÔøΩneas
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
  }
}