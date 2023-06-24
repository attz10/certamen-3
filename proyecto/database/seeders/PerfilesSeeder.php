<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perfiles')->insert([
            ['id'=>'1','nombre'=>'artista','created_at'=>Carbon::now()],
            ['id'=>'2','nombre'=>'administrador','created_at'=>Carbon::now()]
        ]);
    }
}
