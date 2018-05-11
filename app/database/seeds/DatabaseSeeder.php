<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('TodosTableSeeder');

        $this->command->info('Todos table seeded!');

		// $this->call('UserTableSeeder');
	}

}
