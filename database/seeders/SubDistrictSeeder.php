<?php

namespace Database\Seeders;

use App\Models\SubDistrict;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            'Cakung',
            'Cipayung',
            'Ciracas',
            'Duren Sawit',
            'Jatinegara',
            'Kramat Jati',
            'Makasar',
            'Matraman',
            'Pasar Rebo',
            'Pulo Gadung',
        ];

        foreach ($datas as $data){
            SubDistrict::create([
                'name' => $data,
                'slug' => Str::slug($data)
            ]);
        }
    }
}
