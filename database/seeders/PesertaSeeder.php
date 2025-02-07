<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunkSize = 1000;
        $totalRecords = 10000;

        for ($i = 0; $i < $totalRecords; $i += $chunkSize) {
            $data = [];
            $records = min($chunkSize, $totalRecords - $i);
            
            for ($j = 0; $j < $records; $j++) {
                $data[] = [
                    'nama' => fake()->name(),
                    'emel' => fake()->unique()->safeEmail(),
                    'jantina' => fake()->randomElement(['Lelaki', 'Perempuan']),
                    'no_telefon' => fake()->numerify('01########'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            
            DB::table('pesertas')->insert($data);
        }
    }
}
