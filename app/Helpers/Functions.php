<?php
echo asset("/");
// var_dump(asset("/"));
// Đây là file custome function của anh, đã config cho chạy file này rồi
// function getThumb($urlThumb='', $class='', $alt=''){
// 	$urlThumb = str_replace(' ', '%20', $urlThumb);
//     if($urlThumb !=''){
//         return "<img src=".$urlThumb." class='".$class."' alt='".$alt."'>";
//     }
//     else{
//         return "<img src='".$ROOTHOST."/assets/images/noimage.gif' class='".$class."'>";
//     }
// }

// function randomPassword() {
// 	$alphabet = "abcdefghijklmnopqrstuwxyz012345678901234567890123456789ABCDEFGHIJKLMNOPQRSTUWXYZ012345678901234567890123456789";
// 	$pass = array(); //remember to declare $pass as an array
// 	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
// 	for ($i = 0; $i < 8; $i++) {
// 		$n = rand(0, $alphaLength);
// 		$pass[] = $alphabet[$n];
// 	}
// 	return implode($pass); //turn the array into a string
// }

// function randomNumber() {
// 	$alphabet = "012345678901234567890123456789";
// 	$pass = array(); //remember to declare $pass as an array
// 	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
// 	for ($i = 0; $i < 8; $i++) {
// 		$n = rand(0, $alphaLength);
// 		$pass[] = $alphabet[$n];
// 	}
// 	return implode($pass); //turn the array into a string
// }

// function isMobile(){
// 	if(preg_match("/(iPad)/i", $_SERVER["HTTP_USER_AGENT"])) return false;
// 	elseif(preg_match("/(iPhone|iPod|android|blackberry|Mobile|Lumia)/i", $_SERVER["HTTP_USER_AGENT"])) return true;
// 	else return false;
// }