<?php
class imgcode {
	private $string;
	
	function getAuthImage( $string , $im_x = 120 , $im_y = 60) {
		ob_start();
		$im_x = 120;
		$im_y = 60;
		$im = imagecreatetruecolor ($im_x, $im_y);
		imagefill($im, 0, 0, imagecolorallocate($im,255,255,255) );
		//注意以下字体文件需要有
		$stringColor = imagecolorallocate($im, 17, 158, 20);
		imagettftext ($im, 40, rand(-6 , 6), $im_x*0.1, $im_y*0.7, $stringColor, ROOT.'/public/other/rs.ttf', $string);
	
	//扭曲，变形
	
		$distortion_im = imagecreatetruecolor ($im_x*1.5 , $im_y);
		imagefill($distortion_im, 0, 0, imagecolorallocate($distortion_im,255,255,255) );
		for ( $i=0; $i<$im_x; $i++) {
			for ( $j=0; $j<$im_y; $j++) {
				$rgb = imagecolorat($im, $i , $j);
			if( (int)($i+20+sin($j/$im_y*2*M_PI)*10) <= imagesx($distortion_im) && (int)($i+20+sin($j/$im_y*2*M_PI)*10) >=0 ) {
			imagesetpixel ($distortion_im, (int)($i+20+sin($j/$im_y*2*M_PI-M_PI*0.4)*8) , $j , $rgb);
	}
	}
	}
	
	//pixel
	
	for($i=0; $i <= 64; $i++) {
	$pointcolor = imagecolorallocate($distortion_im, 17, 158, 20);
	imagesetpixel($distortion_im, rand(0, imagesx($distortion_im)), rand(0, imagesy($distortion_im)), $pointcolor);
	}
	
	ob_clean();
	header('Content-type: image/jpeg');
	imagejpeg ($distortion_im);
	imagedestroy($im);
	imagedestroy($distortion_im);
	}
}
?>