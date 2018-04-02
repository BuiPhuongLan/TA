<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            //usersSeeder::class,
            titlesSeeder::class,
            //groupsSeeder::class,
            questionsSeeder::class,
            anwersSeeder::class,
        ]);
    }
}

class usersSeeder extends Seeder
{
    public function run(){
        DB::table('users')->insert([
            ['id'=>1, 'MSSV'=>1511684, 'name'=>'Phuong Lan','email'=>'builan@gmail.com', 'password'=>bcrypt('123456'), 'user_id'=> 1, 'group_id'=>1],
            ['id'=>2, 'MSSV'=>1510625, 'name'=>'MAi Dao','email'=>'maidao@gmail.com', 'password'=>bcrypt('123456'), 'user_id'=> 1, 'group_id'=>1],
            ['id'=>3, 'MSSV'=>1510535, 'name'=>'My Duyen','email'=>'myduyen@gmail.com', 'password'=>bcrypt('123456'), 'user_id'=> 1, 'group_id'=>2],

        ]);
    }
}

class titlesSeeder extends Seeder
{
    public function run(){
        DB::table('quiz_titles')->insert([
            ['id'=>1,'name'=> 'Mon hoc', 'user_id'=> 1, 'group_id'=> 1],
            ['id'=>2,'name'=> 'TA', 'user_id'=> 1, 'group_id'=> 1]

        ]);
    }
}
class groupsSeeder extends Seeder
{
    public function run(){
        DB::table('groups')->insert([
            ['id'=>1,'name'=> 'Nhom1', 'admin_id'=> 1],
            ['id'=>2,'name'=> 'Nhom2', 'admin_id'=> 1]

        ]);
    }
}
class questionsSeeder extends Seeder
{
    public function run(){
        DB::table('questions')->insert([
            ['id'=>1,'type_quiz'=>'radio', 'question'=>'Ban co thay mon hoc huu ich ko?', 'quiz_titles_id'=> 1],
            ['id'=>2,'type_quiz'=>'radio', 'question'=>'Ban co thich mon hoc nay ko?', 'quiz_titles_id'=> 1],
            ['id'=>3,'type_quiz'=>'text', 'question'=>'Ban hay danh gia diem cho cac thanh vien trong nhom?', 'quiz_titles_id'=> 1],
            ['id'=>4,'type_quiz'=>'radio', 'question'=>'TA cua ban co tan tinh giup do ko?', 'quiz_titles_id'=> 2],
            

        ]);
    }
}
class anwersSeeder extends Seeder
{
    public function run(){
        DB::table('answers')->insert([
            ['id'=>1,'answer'=> 'rat huu ich', 'score'=>10, 'question_id'=>1],
            ['id'=>2,'answer'=> 'co mot chut', 'score'=>5, 'question_id'=>1],
            ['id'=>3,'answer'=> 'khong', 'score'=>0, 'question_id'=>1],
            ['id'=>4,'answer'=> 'rat thich', 'score'=>10, 'question_id'=>2],
            ['id'=>5,'answer'=> 'mot chut', 'score'=>5, 'question_id'=>2],
            ['id'=>6,'answer'=> 'khong thich', 'score'=>0, 'question_id'=>2],
            ['id'=>7,'answer'=> 'rat tan tinh', 'score'=>10, 'question_id'=>4],
            ['id'=>8,'answer'=> 'binh thuong', 'score'=>5, 'question_id'=>4],
            ['id'=>9,'answer'=> 'khong', 'score'=>0, 'question_id'=>4],
                 

        ]);
    }
}
