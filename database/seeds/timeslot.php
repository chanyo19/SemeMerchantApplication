<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class timeslot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->addslotinfo();

    }

    public function addslotinfo(){
        DB::table('timeslots')->insert([
            'slot_info' => '8-9',

        ]);
        DB::table('timeslots')->insert([
            'slot_info' => '9-10',

        ]);
        DB::table('timeslots')->insert([
            'slot_info' => '10-11',

        ]);
        DB::table('timeslots')->insert([
            'slot_info' => '11-12',

        ]);
        DB::table('timeslots')->insert([
            'slot_info' => '12-13',

        ]);
        DB::table('timeslots')->insert([
            'slot_info' => '13-14',

        ]);
        DB::table('timeslots')->insert([
            'slot_info' => '14-15',

        ]);
        DB::table('timeslots')->insert([
            'slot_info' => '15-16',

        ]);
        DB::table('timeslots')->insert([
            'slot_info' => '16-17',

        ]);
        DB::table('timeslots')->insert([
            'slot_info' => '17-18',

        ]);
    }
}
