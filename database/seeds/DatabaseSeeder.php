<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    User::create(
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
		);

    $this->call(PostsTableSeeder::class);
  }
}