<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'name' => "Hobbit",
            'year' => "2001",
            'publication_place' => "Warszawa",
            'pages' => "310",
            'price' => "29.99",
        ]);
        DB::table('books')->insert([
            'name' => "Kolor magii",
            'year' => "2005",
            'publication_place' => "Katowice",
            'pages' => "205",
            'price' => "24.99",
 ]);
 DB::table('books')->insert([
  'name' => "Władca Pierścieni",
  'year' => "2000",
  'publication_place' => "Kraków",
  'pages' => "645",
  'price' => "59.99",
 ]);
 }
 }
