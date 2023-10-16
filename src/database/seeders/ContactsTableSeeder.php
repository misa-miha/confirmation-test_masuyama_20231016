<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param =[
            'last_name' => '鈴木',
            'first_name' => '二郎',
            'gender' => 1,
            'email' => 'suzuki@example.com',
            'zip11' => '310-0836',
            'addr11' => '茨城県水戸市元吉田町',
            'address2' => '元吉田マンション',
            'content' => 'いつもお世話になります。先日貴社製品を購入させて頂きましたが操作がわからなくなってしまいました。電源の切り方を教えて下さい。'
        ];
        DB::table('contacts')->insert($param);

        $param =[
            'last_name' => '佐藤',
            'first_name' => '由紀',
            'gender' => 2,
            'email' => 'satou@example.com',
            'zip11' => '150-0013',
            'addr11' => '東京都渋谷区恵比寿',
            'address2' => '恵比寿マンション',
            'content' => 'お世話になっております。先日お問い合わせさせて頂いた件でご連絡いたしました。宜しくお願い致します。'
        ];
        DB::table('contacts')->insert($param);

        $param =[
            'last_name' => '佐々木',
            'first_name' => '絵里',
            'gender' => 2,
            'email' => 'sasaki@example.com',
            'zip11' => '252-0206',
            'addr11' => '神奈川県相模原市中央区淵野辺',
            'address2' => '淵野辺マンション',
            'content' => 'いつも大変お世話になります。来週のアポイントメントの件についてご相談させて頂きたく存じます。'
        ];
        DB::table('contacts')->insert($param);
    }
}
