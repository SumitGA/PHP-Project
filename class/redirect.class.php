<?php 

class Redirect{

public function __construct($url){
	echo '<script type ="text/javascript" language="javascript">
	
	window.location  = "'.$url.'";


	</script> ';
  }
}//class ends
?>