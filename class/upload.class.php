<?php

class upload{
	public $finalFileName;
	 
	public $fileType; 
	 
	public $kaboom ; 
	public $fileExt ;
	public function __construct($elementname){
		//filename
		$filename = $_FILES[$elementname]['name'];//case 
        $tmp_name = $_FILES[$elementname]['tmp_name'];
		$error = $_FILES[$elementname]['error'];
		$size = $_FILES[$elementname]['size'];

		$type = $_FILES[$elementname]['type'];
		
		$kaboom = explode(".", $fileName); // Split file name into an array using the dot
		$fileExt = end($kaboom);
		
		// new file name
		$newfilename = date('y_m_d_h_i_s').$filename;
		$destination = "../../uploads/sliders_images/".$newfilename;
		
		
		// ---------- Include Universal Image Resizing Function --------
		include_once("../admin/process/image_resize_library.php"); 
		$target_file = "uploads/$filename";
		 $resized_file = $destination; 
		 $wmax = 200; 
		 $hmax = 150; 
		 ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt); 
		// ----------- End Universal Image Resizing Function -----------



		/////////////////////////////
		
		if(move_uploaded_file($tmp_name,$destination)){

			$this->finalFileName = $newfilename;
		}else{
			return FALSE;
		}

	}//method ends
}//class ends