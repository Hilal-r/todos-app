<?php

use Carbon\Carbon;

class TodosTableSeeder extends Seeder
{
    public function run()
    {

        $todos = array(
            array('title' => 'משימה A', 'completed' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('title' => 'משימה B', 'completed' => false, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('title' => 'משימה C', 'completed' => false, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('title' => 'משימה D', 'completed' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('title' => 'משימה E', 'completed' => false, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('title' => 'משימה F', 'completed' => false, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('title' => 'משימה G', 'completed' => false, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')),
        );

        DB::table('todos')->delete();

        DB::table('todos')->insert($todos);

    }
}