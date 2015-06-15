<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //$this->call('UserTableSeeder');
        //$this->call('AllSeeder');

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder
{
    public function run()
    {
        factory('App\User', 1)->create();
    }
}
class AllSeeder extends Seeder
{
    public function run()
    {
        factory('App\Post', 50)->create();
    }
}
