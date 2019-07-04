

<?php
/**
* 产生随机字符串
*
* 产生一个指定长度的随机字符串,并返回给用户
*
* @access public
* @param int $len 产生字符串的位数
**/

       class public_common {

		function randstr($len=6) {
			$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
// characters to build the password from
		mt_srand((double)microtime()*1000000*getmypid());
// seed the random number generater (must be done)
		$password='';
		while(strlen($password)<$len)
		$password.=substr($chars,(mt_rand()%strlen($chars)),1);
		return $password;
		}
	}


?>
