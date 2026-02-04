<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('todos')->insert([
            'user_id'=>1,
            'title'=>'初めてのToDo',
            'is_completed'=>false,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
