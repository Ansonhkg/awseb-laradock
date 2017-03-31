<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tasks')->insert([
            'user_id'=>1,
            'body'=>'Go to the store',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
