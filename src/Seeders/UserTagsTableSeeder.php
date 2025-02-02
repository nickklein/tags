<?php

namespace NickKlein\Tags\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 15; $i++) {
            $insert[] = array(
                'tag_id' => $i,
                'user_id' => 1
            );
        }
        DB::table('user_tags')->insert($insert);
    }
}
