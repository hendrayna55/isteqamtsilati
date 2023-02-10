<?php


use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        User::create([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt('admin'),
            'level' => "admin"
        ]);
    }
}
