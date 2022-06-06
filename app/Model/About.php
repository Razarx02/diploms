<?php 


class About extends AppModel {
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите название'
		),
		'img' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки картинки',
				'allowEmpty' => true
			),
			// 'mimeType' => array(
			// 	'rule' => array('mimeType', array('image/jpg', 'image/jpeg', 'image/png', 'image/gif')),
			// 	'message' => 'Ошибка загрузки картинки'
			// ),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '1MB'),
				'message' => 'Максимальный размер картинки 1MB'
			),
			'customUploadImg' => array(
				'rule' => 'customUploadImg',
				'message' => 'Ошибка обработки обработки картинки'
			)
		),
		// 'doc' => array(
		// 	'uploadError' => array(
		// 		'rule' => 'uploadError',
		// 		'message' => 'Ошибка загрузки файла',
		// 		'allowEmpty' => true
		// 	),
			
		// 	'fileSize' => array(
		// 		'rule' => array('fileSize', '<=', '4MB'),
		// 		'message' => 'Максимальный размер документа 4MB'
		// 	),
		// 	'customUploadDocRu' => array(
		// 		'rule' => 'customUploadDocRu',
		// 		'message' => 'Ошибка обработки обработки документа'
		// 	)
		// )
	);

	public function customUploadDocRu($file = array()){
		if(!is_uploaded_file($file['doc']['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['doc']['name']));
		$fileName = $this->genNameFileDoc($ext);
		$path = WWW_ROOT . 'files/npadocs/' . $fileName;
		if(!move_uploaded_file($file['doc']['tmp_name'], $path)){
			return false;
		}

		$this->data[$this->alias]['doc'] = $fileName;
		return true;
	}
	
	public function genNameFileDoc($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'files/npadocs/' . $name)){
			$name = $this->genNameFileDoc($ext);
		}
		return $name;
	}

	public function customUploadImg($file = array()){
		if(!is_uploaded_file($file['img']['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['img']['name']));
		$fileName = $this->genNameFile($ext);
		$path = WWW_ROOT . 'img/abouts/' . $fileName;
	
		$path_th = WWW_ROOT . 'img/abouts/thumbs/' . $fileName;
		if(!move_uploaded_file($file['img']['tmp_name'], $path)){
			return false;
		}
		$this->resizeImg($path, $path_th, 650, 647, $ext);
		$this->data[$this->alias]['img'] = $fileName;
		return true;
	}

	public function genNameFile($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'img/abouts/' . $name)){
			$name = $this->genNameFile($ext);
		}
		return $name;
	}

	public function resizeImg($target, $dest, $wmax = 950, $hmax = 650, $ext){
		/*
		$target - путь к оригинальному файлу
		$dest - путь сохранения обработанного файла
		$wmax - максимальная ширина
		$hmax - максимальная высота
		$ext - расширение файла
		*/
		list($w_orig, $h_orig) = getimagesize($target);
		$ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

		if(($wmax / $hmax) > $ratio){
			$wmax = $hmax * $ratio;
		}else{
			$hmax = $wmax / $ratio;
		}
		
		$img = "";
		// imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
		switch($ext){
			case("gif"):
				$img = imagecreatefromgif($target);
				break;
			case("png"):
				$img = imagecreatefrompng($target);
				break;
			default:
				$img = imagecreatefromjpeg($target);    
		}
		$newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки
		
		if($ext == "png"){
			imagesavealpha($newImg, true); // сохранение альфа канала
			$transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
			imagefill($newImg, 0, 0, $transPng); // заливка  
		}
		
		imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
		switch($ext){
			case("gif"):
				imagegif($newImg, $dest);
				break;
			case("png"):
				imagepng($newImg, $dest);
				break;
			default:
				imagejpeg($newImg, $dest);    
		}
		imagedestroy($newImg);
	}
}
?>