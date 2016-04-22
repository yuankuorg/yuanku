<?php
	//1.创建头部信息
	header("Content-type: image/png");

	//2.内存中创建图片
	$im = imagecreatetruecolor(85, 35);

	//3.填充颜色 
	//bool imagefill ( resource image, int x, int y, int color )
	$bgcolor = imagecolorallocate($im, 255, 255, 255);
	imagefill($im, 83, 33, $bgcolor);

	//4.画边框：矩形
	$bordercolor = imagecolorallocate($im, 255, 0, 0);
	imagerectangle($im, 0, 0, 83, 33, $bordercolor);


	//5.画线
	//6.画点
	//7.画随机数
	$col = imagecolorallocate($im, 0, 0, 0);
	$vcode = rand(1000, 9999);	
	imagestring($im, 5, rand(0,30), rand(0,10), $vcode, $col);
	session_start();
	$_SESSION["vcode"] = $vcode;
	
	
	for ($i=0; $i < 8; $i++) { 
		imageline($im, rand(1, 83), rand(1, 33),rand(1, 83), rand(1, 33), $col);
	}
	for ($i=0; $i < 100; $i++) { 
		imagesetpixel($im, rand(1, 83), rand(1, 33), $col);
	}	

	//8.转换pgp格式，输出到浏览器
	imagepng($im);

	//9.销毁图片 
	imagedestroy($im);
?>