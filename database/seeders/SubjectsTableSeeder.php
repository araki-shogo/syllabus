<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = app_path('Http/Python/datalist.json');
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $records = json_decode($json, true);

        foreach ($records as $record) {
            $param = [
                'subject' => $record[0],
                'url' => $record[1],
                'teacher' => $record[2],
                'semester' => $record[3],
                'credit' => $record[4],
            ];
            DB::table('subjects')->insert($param);
        }
        

    }
}
