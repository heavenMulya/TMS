<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('expenses_list')->insert([
            ['name' => 'Elictricity'],
            ['name' => "Water Bill\r\n"],
        ]);
    }
}
