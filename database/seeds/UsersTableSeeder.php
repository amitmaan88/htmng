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
        factory(\App\User::class, 25)->create();
        /*$data = [
            [
                'email' => 'amit@htmng.com',
                'name' => 'Amit K',
            ],
            [
                'email' => 'arush@htmng.com',
                'name' => 'Arush K',
            ]
        ];
        foreach($data as $user){
            factory(\App\User::class)->create($user);
        }*/
    }
}
