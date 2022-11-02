<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        // $length = DB::table('posts')->count('id');
        for ($i=1; $i <= 5; $i++) { 
            $data = [
                'title' => 'Seeder ' . $i,
                'description' => 'Seeder '. $i . ' description',
                'created_at' => date("Y-m-d H:i:s")
            ];
            DB::table('posts')->insert($data);
        }
    }
}
