<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\lecture;
use App\Models\student;

class LocalDevelopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 空ユーザーx1の確保(ID:1~5)
        for ($index = 1; $index <= 5; $index++) {
            User::factory()->count(1)->create([
                'login_id' => ('empty' . (string)$index),
            ]);
        }

        // 管理者用ユーザーx2の確保(ID:6~10)
        for ($index = 1; $index <= 5; $index++) {
            User::factory()->count(1)->create([
                'login_id' => ('admin' . (string)$index),
            ]);
        }

        // 生徒役ユーザーx5を追加(ID:11~15)
        for ($index = 1; $index <= 5; $index++) {
            User::factory()->count(1)->create([
                'login_id' => ('student' . (string)$index),
            ]);
        }

        // 講師役ユーザーx5を追加(ID:16~20)
        for ($index = 1; $index <= 5; $index++) {
            User::factory()->count(1)->create([
                'login_id' => ('teacher' . (string)$index),
            ]);
        }

        // teacher1で講義1を作る
        $Teacher1_ID = 16;
        \App\Models\lecture::factory()->count(1)->create([
            'user_id' => $Teacher1_ID,
            'title' => 'T1の講義1',
            'explanation' => 'T1の講義1の説明'
        ])->each(function (lecture $lecture) {
            // 募集生徒ｘ４
            \App\Models\student::factory()->count(1)->create([
                'user_id' => 1, // $EmptyUserId
                'lecture_id' => $lecture->id,
                'position' => 1,
                'status' => 1,
                'pay_amount' => 10000,
                'goal' => 'リーダーのゴール',
                'requirement' => '5人以上チームのリーダー経験があること',
                'dev_env' => 'Mac M1ではないMac',
            ])->each(function (student $student) {
                \App\Models\application_of_lecture::factory()->count(1)->create([
                    'user_id' => 11,
                    'student_id' => $student->id,
                    'status' => 1,
                    'motivation' => 'よろしくおねがいします。',
                    'fb_comment' => '',
                ]);
                \App\Models\application_of_lecture::factory()->count(1)->create([
                    'user_id' => 12,
                    'student_id' => $student->id,
                    'status' => 1,
                    'motivation' => 'よろしくおねがいします。',
                    'fb_comment' => '',
                ]);
            });
            \App\Models\student::factory()->count(1)->create([
                'user_id' => 1, // $EmptyUserId
                'lecture_id' => $lecture->id,
                'position' => 2,
                'status' => 1,
                'pay_amount' => 29000,
                'goal' => 'フロントエンドのゴール',
                'requirement' => 'React Hooksを理解していること',
                'dev_env' => 'Mac M1ではないMac',
            ])->each(function (student $student) {
                \App\Models\application_of_lecture::factory()->count(1)->create([
                    'user_id' => 11,
                    'student_id' => $student->id,
                    'status' => 1,
                    'motivation' => 'よろしくおねがいします。',
                    'fb_comment' => '',
                ]);
                \App\Models\application_of_lecture::factory()->count(1)->create([
                    'user_id' => 13,
                    'student_id' => $student->id,
                    'status' => 1,
                    'motivation' => 'よろしくおねがいします。',
                    'fb_comment' => '',
                ]);
            });
            \App\Models\student::factory()->count(1)->create([
                'user_id' => 1, // $EmptyUserId
                'lecture_id' => $lecture->id,
                'position' => 3,
                'status' => 1,
                'pay_amount' => 19000,
                'goal' => 'バックエンドのゴール',
                'requirement' => 'PHPを用いた開発経験を有していること',
                'dev_env' => 'Mac M1ではないMac',
            ])->each(function (student $student) {
                \App\Models\application_of_lecture::factory()->count(1)->create([
                    'user_id' => 11,
                    'student_id' => $student->id,
                    'status' => 1,
                    'motivation' => 'よろしくおねがいします。',
                    'fb_comment' => '',
                ]);
                \App\Models\application_of_lecture::factory()->count(1)->create([
                    'user_id' => 13,
                    'student_id' => $student->id,
                    'status' => 1,
                    'motivation' => 'よろしくおねがいします。',
                    'fb_comment' => '',
                ]);
            });
            \App\Models\student::factory()->count(1)->create([
                'user_id' => 1, // $EmptyUserId
                'lecture_id' => $lecture->id,
                'position' => 4,
                'status' => 1,
                'pay_amount' => 5000,
                'goal' => 'デザインのゴール',
                'requirement' => '特になし',
                'dev_env' => 'Mac M1ではないMac',
            ])->each(function (student $student) {
                \App\Models\application_of_lecture::factory()->count(1)->create([
                    'user_id' => 11,
                    'student_id' => $student->id,
                    'status' => 1,
                    'motivation' => 'よろしくおねがいします。',
                    'fb_comment' => '',
                ]);
                \App\Models\application_of_lecture::factory()->count(1)->create([
                    'user_id' => 14,
                    'student_id' => $student->id,
                    'status' => 1,
                    'motivation' => 'よろしくおねがいします。',
                    'fb_comment' => '',
                ]);
            });

            // 講師x4
            \App\Models\teacher::factory()->count(1)->create([
                'user_id' => 16, // teacher1
                'lecture_id' => $lecture->id,
                'type' => 1,
                'pay_amount' => 10000,
            ]);
            \App\Models\teacher::factory()->count(1)->create([
                'user_id' => 17, // teacher2
                'lecture_id' => $lecture->id,
                'type' => 2,
                'pay_amount' => 19000,
            ]);
            \App\Models\teacher::factory()->count(1)->create([
                'user_id' => 18, // teacher3
                'lecture_id' => $lecture->id,
                'type' => 3,
                'pay_amount' => 19000,
            ]);
            \App\Models\teacher::factory()->count(1)->create([
                'user_id' => 19, // teacher4
                'lecture_id' => $lecture->id,
                'type' => 4,
                'pay_amount' => 5000,
            ]);
            // 講義スケジュールx4
            \App\Models\lecture_schedule::factory()->count(1)->create([
                'lecture_id' => $lecture->id,
                'start_time' => '2022-12-04 21:00:00',
                'end_time' => '2022-12-04 23:00:00',
                'url' => 'https://us05web.zoom.us/j/85098903387?pwd=NFZ3cVgyMHpMd1c1QlZRMTZPdUVTdz09',
                'meeting_id' => '850 9890 3387',
                'passcord' => 'naFWW7'
            ]);
            \App\Models\lecture_schedule::factory()->count(1)->create([
                'lecture_id' => $lecture->id,
                'start_time' => '2022-12-11 21:00:00',
                'end_time' => '2022-12-11 23:00:00',
                'url' => 'https://us05web.zoom.us/j/85098903387?pwd=NFZ3cVgyMHpMd1c1QlZRMTZPdUVTdz09',
                'meeting_id' => '850 9890 3387',
                'passcord' => 'naFWW7'
            ]);
            \App\Models\lecture_schedule::factory()->count(1)->create([
                'lecture_id' => $lecture->id,
                'start_time' => '2022-12-18 21:00:00',
                'end_time' => '2022-12-18 23:00:00',
                'url' => 'https://us05web.zoom.us/j/85098903387?pwd=NFZ3cVgyMHpMd1c1QlZRMTZPdUVTdz09',
                'meeting_id' => '850 9890 3387',
                'passcord' => 'naFWW7'
            ]);
            \App\Models\lecture_schedule::factory()->count(1)->create([
                'lecture_id' => $lecture->id,
                'start_time' => '2022-12-25 21:00:00',
                'end_time' => '2022-12-25 23:00:00',
                'url' => 'https://us05web.zoom.us/j/85098903387?pwd=NFZ3cVgyMHpMd1c1QlZRMTZPdUVTdz09',
                'meeting_id' => '850 9890 3387',
                'passcord' => 'naFWW7'
            ]);
            // 教材2件
            \App\Models\teaching_material::factory()->count(1)->create([
                'user_id' => $lecture->user_id,
                'lecture_id' => $lecture->id,
                'title' => '教材1',
                'explanation' => '教材1の説明',
                'path' => 'https://drive.google.com/file/d/1ONKb2nUf5HQytZqN7OxUdY0-gABh5dJK/view?usp=sharing',
            ]);
            \App\Models\teaching_material::factory()->count(1)->create([
                'user_id' => $lecture->user_id,
                'lecture_id' => $lecture->id,
                'title' => '教材2',
                'explanation' => '教材2の説明',
                'path' => 'https://drive.google.com/file/d/1ONKb2nUf5HQytZqN7OxUdY0-gABh5dJK/view?usp=sharing',
            ]);
        });

        // teacher1で講義2を作る
        \App\Models\lecture::factory()->count(1)->create([
            'user_id' => $Teacher1_ID,
            'title' => 'T1の講義2',
            'explanation' => 'T1の講義2の説明'
        ])->each(function (lecture $lecture) {
            // 募集生徒ｘ2
            \App\Models\student::factory()->count(1)->create([
                'user_id' => 1, // $EmptyUserId
                'lecture_id' => $lecture->id,
                'position' => 3,
                'status' => 1,
                'pay_amount' => 30000,
                'goal' => 'バックエンドのゴール',
                'requirement' => '特になし',
                'dev_env' => 'Windows 10以上 x64',
            ]);
            \App\Models\student::factory()->count(1)->create([
                'user_id' => 1, // $EmptyUserId
                'lecture_id' => $lecture->id,
                'position' => 2,
                'status' => 1,
                'pay_amount' => 25000,
                'goal' => 'フロントエンドのゴール',
                'requirement' => 'React Hooksを理解していること',
                'dev_env' => 'Windows 10以上 x64',
            ]);

            // 講師x4
            \App\Models\teacher::factory()->count(1)->create([
                'user_id' => $lecture->user_id, // teacher1
                'lecture_id' => $lecture->id,
                'type' => 2,
                'pay_amount' => 25000,
            ]);
            \App\Models\teacher::factory()->count(1)->create([
                'user_id' => $lecture->user_id, // teacher1
                'lecture_id' => $lecture->id,
                'type' => 3,
                'pay_amount' => 30000,
            ]);
            // 講義スケジュールx2
            \App\Models\lecture_schedule::factory()->count(1)->create([
                'lecture_id' => $lecture->id,
                'start_time' => '2022-12-04 21:00:00',
                'end_time' => '2022-12-04 23:00:00',
                'url' => 'https://us05web.zoom.us/j/85098903387?pwd=NFZ3cVgyMHpMd1c1QlZRMTZPdUVTdz09',
                'meeting_id' => '850 9890 3387',
                'passcord' => 'naFWW7'
            ]);
            \App\Models\lecture_schedule::factory()->count(1)->create([
                'lecture_id' => $lecture->id,
                'start_time' => '2022-12-18 21:00:00',
                'end_time' => '2022-12-18 23:00:00',
                'url' => 'https://us05web.zoom.us/j/85098903387?pwd=NFZ3cVgyMHpMd1c1QlZRMTZPdUVTdz09',
                'meeting_id' => '850 9890 3387',
                'passcord' => 'naFWW7'
            ]);
            // 教材1件
            \App\Models\teaching_material::factory()->count(1)->create([
                'user_id' => $lecture->user_id,
                'lecture_id' => $lecture->id,
                'title' => '教材1',
                'explanation' => '教材1の説明',
                'path' => 'https://drive.google.com/file/d/1ONKb2nUf5HQytZqN7OxUdY0-gABh5dJK/view?usp=sharing',
            ]);
        });

        User::all()
            ->each(function (User $user) {
                \App\Models\user_notice::factory()->count(1)->create([
                    'user_id' => $user->id,
                    'type' => 2,
                    'title' => "初回ログインのお礼",
                    'sub_title' => "初めてログインしていただきありがとうございます。",
                ]);
                \App\Models\user_notice::factory()->count(1)->create([
                    'user_id' => $user->id,
                    'type' => 1,
                    'title' => "プロフィール入力をしましょう",
                    'sub_title' => "プロフィールを入力すると他ユーザーとのコミュニケーションを助けます。まず始めにプロフィール入力するのをオススメします。",
                ]);
                \App\Models\user_notice::factory()->count(1)->create([
                    'user_id' => $user->id,
                    'type' => 2,
                    'title' => "使い方で何かわからないことがありますか？",
                    'sub_title' => "使い方についてまとめた資料があります。ぜひご活用ください。",
                ]);
            });
    }
}
