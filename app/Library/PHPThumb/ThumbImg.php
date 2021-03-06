<?php
/*
* @Created by: HSS
* @Author	 : nguyenduypt86@gmail.com
* @Date 	 : 06/2016
* @Version	 : 1.0
*/
namespace App\Library\PHPThumb;

use Illuminate\Support\Facades\Config;

require_once __DIR__.'/PHPThumb.php';
require_once __DIR__.'/GD.php';

if(!class_exists('ThumbImg') ){

	class ThumbImg{
		private $__name = 'Thumbs img';

		public static function makeDir($folder = '', $path = ''){
			$folders = explode('/', ($path));
			$tmppath =  Config::get('config.DIR_ROOT').'/uploads/thumbs/'.$folder.'/';

			if(!file_exists($tmppath)){
				mkdir($tmppath, 0777, true);
			};

			for($i = 0; $i < count($folders) - 1; $i++) {
				if(!file_exists($tmppath . $folders[$i]) && ! mkdir($tmppath . $folders [$i], 0777)){
					return false;
				}
				$tmppath = $tmppath . $folders [$i] . '/';
			}
			return true;
		}
		public static function thumbBaseNormal($folder='', $file_name='', $width=100, $height=100, $alt='', $isThumb=true, $returnPath=false){
			if(!preg_match("/.jpg|.jpeg|.JPEG|.JPG|.png|.gif/",strtolower($file_name))) return ' ';
			$domain = Config::get('config.WEB_ROOT');
			$url_img = '';
			if($isThumb){
				$imagSource = Config::get('config.DIR_ROOT').'/uploads/' .$folder. '/' .$file_name;
				$paths =  $width."x".$height.'/'.$file_name;
				$thumbPath = Config::get('config.DIR_ROOT').'/uploads/thumbs/'.$folder.'/'. $paths;
				$url_img = $domain.'uploads/thumbs/'.$folder.'/'. $paths;

				if(!file_exists($thumbPath)){
					if(file_exists($imagSource)){
						$objThumb = new \PHPThumb\GD($imagSource);
						$objThumb->resize($width, $height);
						if(!file_exists($thumbPath)){
							if(!self::makeDir($folder, $paths)){
								return '';
							}
							self::saveCustom($imagSource);
						}
						$objThumb->show(true, $thumbPath);
					}else{
						$url_img = '';
					}
				}
			}

			if($returnPath){
				return $url_img;
			}else{
				return '<img src="'.$url_img.'" alt="'.$alt.'"/>';
			}
		}
		public static function saveCustom($fileName){
			@chmod($fileName, 0777);
			return true;
		}
	}
}