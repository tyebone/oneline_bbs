<?php
$player1 = ['背番号' => 1, 'name' => 'アキラ100%' ,'露出度' => 99 ];
$player2 = ['背番号' => 2, 'name' => 'HG' ,'露出度' => 78 ];
$player3 = ['背番号' => 3, 'name' => 'スギちゃん' , '露出度' => 15];
$player4 = ['背番号' => 4, 'name' => 'とにかく明るい安村' , '露出度' => 87];
$player5 = ['背番号' => 5, 'name' => 'エガちゃん' , '露出度' => 56];
$player6 = ['背番号' => 6, 'name' => 'ハリウッドザコシショウ' , '露出度'=> 8];
$player7 = ['背番号' => 7, 'name' => '小島よしお' , '露出度' => 91];
$player8 = ['背番号' => 8, 'name' => '出川哲朗' , '露出度' => 100];
$player9 = ['背番号' => 9, 'name' => '上島竜平' , '露出度' => 100];

$player_male = [$player1, $player2, $player3, $player4, $player5, $player6, $player7, $player8, $player9];
$player_female =[];

$player_otoko = ['男' => $player_male];
$player_onna = ['女' => $player_female];

$japan = ['日本代表' => [$player_otoko, $player_onna]];

echo $japan['日本代表'][0]['男'][2]['露出度'];
echo '<hr><br>';

foreach ($japan ['name'] as $player_otoko) {
// 	echo $player_otoko['name'];
// 	echo '<br>';
// }
// //全く同じ文
// echo '<hr><br>';

// foreach ($japan['日本代表'] as $player_otoko) {
// 	foreach ($ as $key => $value) {
// 		# code...
// 	}
	
//}




?>