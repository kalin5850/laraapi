<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('students')->insert([
//            'name' => Str::random(10),
//            'course' => Str::random(10),
//            'created_at' => time(),
//            'updated_at' => time()
//        ]);
        factory(App\Student::class,100)->create();
    }
}
