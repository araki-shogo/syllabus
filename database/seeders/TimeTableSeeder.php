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


        try {
            foreach ($records['Mon_1'] as $record) {
                $param = [
                    'time' => '月曜1限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Mon_2'] as $record) {
                $param = [
                    'time' => '月曜2限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Mon_3'] as $record) {
                $param = [
                    'time' => '月曜3限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Mon_4'] as $record) {
                $param = [
                    'time' => '月曜4限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Mon_5'] as $record) {
                $param = [
                    'time' => '月曜5限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Mon_6'] as $record) {
                $param = [
                    'time' => '月曜6限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Tue_1'] as $record) {
                $param = [
                    'time' => '火曜1限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Tue_2'] as $record) {
                $param = [
                    'time' => '火曜2限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Tue_3'] as $record) {
                $param = [
                    'time' => '火曜3限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Tue_4'] as $record) {
                $param = [
                    'time' => '火曜4限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Tue_5'] as $record) {
                $param = [
                    'time' => '火曜5限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Tue_6'] as $record) {
                $param = [
                    'time' => '火曜6限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Wed_1'] as $record) {
                $param = [
                    'time' => '水曜1限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Wed_2'] as $record) {
                $param = [
                    'time' => '水曜2限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Wed_3'] as $record) {
                $param = [
                    'time' => '水曜3限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Wed_4'] as $record) {
                $param = [
                    'time' => '水曜4限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Wed_5'] as $record) {
                $param = [
                    'time' => '水曜5限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Wed_6'] as $record) {
                $param = [
                    'time' => '水曜6限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Thu_1'] as $record) {
                $param = [
                    'time' => '木曜1限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Thu_2'] as $record) {
                $param = [
                    'time' => '木曜2限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Thu_3'] as $record) {
                $param = [
                    'time' => '木曜3限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Thu_4'] as $record) {
                $param = [
                    'time' => '木曜4限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Thu_5'] as $record) {
                $param = [
                    'time' => '木曜5限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Thu_6'] as $record) {
                $param = [
                    'time' => '木曜6限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Fri_1'] as $record) {
                $param = [
                    'time' => '金曜1限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Fri_2'] as $record) {
                $param = [
                    'time' => '金曜2限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Fri_3'] as $record) {
                $param = [
                    'time' => '金曜3限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Fri_4'] as $record) {
                $param = [
                    'time' => '金曜4限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Fri_5'] as $record) {
                $param = [
                    'time' => '金曜5限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
        try {
            foreach ($records['Fri_6'] as $record) {
                $param = [
                    'time' => '金曜6限',
                    'subject' => $record[0],
                    'teacher' => $record[1],
                    'class' => $record[4],
                    'semester' => $record[3],
                    'grade' => $record[2],
                ];
                DB::table('time')->insert($param);
            }
            } catch (Exception $e) {
                echo 'data is nothing';
        }
    }
}
