<?php
/*
 * Prepared by Sumit Gautam
 */
class Image extends Users{
	//load the attributes
	 public $image_id;
	 public $image_link;
	 public $user_id;
	
	 
	 
	 
	 
	 /////////////////////////////////////////////////////////////////////////////
	 ////////////////////////Load the constructor of the parent  class./////////////
	 //////////////////////////////////////////////////////////////////////////////
	 public function Image(){
	 	//call the constructor of the parent class
	 	parent::__construct();
	 }
	
	 
	 ///////////////////////////////////////////////
	 ///////getter and setters/////////////////////
	 /////////////////////////////////////////////

	/**
	 * @return the $image_id
	 */
	public function getImage_id() {
		return $this->image_id;
	}

	/**
	 * @return the $image_link
	 */
	public function getImage_link() {
		return $this->image_link;
	}


	/**
	*@return the $user_id
	*/
	public function getUser_id(){
		return $this->user_id;
	}


	/**
	 * @param field_type $image_id
	 */
	public function setImage_id($image_id) {
		$this->image_id = $image_id;
	}

	/**
	 * @param field_type $image_link
	 */
	public function setImage_link($image_link) {
		$this->image_link = $image_link;
	}
	
	/**
	*@param field_type $user_id
	*/
	public function setUser_id($user_id){
		$this->user_id = $user_id;
	}
	////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////// uploading the image///////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////
	public function add_image($elementname){
		
		$objFeaturedimage = new upload($elementname);
		if(strlen($objFeaturedimage->finalFileName)>0){
			//file uploaded on the server
			$this->setImage_link($objFeaturedimage->finalFileName);
			$this->sql = "INSERT INTO images
			(image_id,image_link,user_id)
			VALUES('$this->image_id','$this->image_link','$this->user_id')";
	
				
			//execute the sql
			$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error($this->error=mysqli_error($this->conxn));
			
	
	
			//decisive paramater
			$this->affRows = mysqli_affected_rows($this->conxn);
			if($this->affRows > 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}else {
			//the file is not uploaded
			return FALSE;
		}
		 
	}//method ends
	
	 
	 
	
}//class ends