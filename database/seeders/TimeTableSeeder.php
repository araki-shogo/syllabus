<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = app_path('Http/Python/time_data.json');
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $records = json_decode($json, true);

        $time1 = [
            "Mon_1", "Mon_2", "Mon_3", "Mon_4", "Mon_5", "Mon_6",
            "Tue_1", "Tue_2", "Tue_3", "Tue_4", "Tue_5", "Tue_6",
            "Wed_1", "Wed_2", "Wed_3", "Wed_4", "Wed_5", "Wed_6",
            "Thu_1", "Thu_2", "Thu_3", "Thu_4", "Thu_5", "Thu_6",
            "Fri_1", "Fri_2", "Fri_3", "Fri_4", "Fri_5", "Fri_6",
        ];
        $time2 = [
            "月曜1限", "月曜2限", "月曜3限", "月曜4限", "月曜5限", "月曜6限",
            "火曜1限", "火曜2限", "火曜3限", "火曜4限", "火曜5限", "火曜6限",
            "水曜1限", "水曜2限", "水曜3限", "水曜4限", "水曜5限", "水曜6限",
            "木曜1限", "木曜2限", "木曜3限", "木曜4限", "木曜5限", "木曜6限",
            "金曜1限", "金曜2限", "金曜3限", "金曜4限", "金曜5限", "金曜6限",
        ];

        try {
            for($i=0; $i<=30; $i++) {
                foreach($records[$time1[$i]] as $record) {
                    $param = [
                        'time' => $time2[$i],
                        'subject' => $record[0],
                        'teacher' => $record[1],
                        'class' => $record[4],
                        'semester' => $record[3],
                        'grade' => $record[2],
                    ];
                    DB::table('time')->insert($param);
                }
            }
            } catch (Exception $e) {
                echo 'データはありません\n';
        }
    }
}
