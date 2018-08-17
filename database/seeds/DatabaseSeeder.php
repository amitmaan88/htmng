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
        $this->call(UsersTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        $this->call(RoomTypeTableSeeder::class);
        $this->call(RoomTableSeeder::class);        
        $this->call(NoticeTableSeeder::class);        
        $this->call(FoodTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(ComplaintTableSeeder::class);
    }
}
