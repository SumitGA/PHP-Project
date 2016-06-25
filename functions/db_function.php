<?php 
function connect($host = 'localhost',$user = 'root',$pwd = '',$db = 'orchid'){
	
	//statements
	//connect to the database
	$conxn = mysqli_connect($host,$user,$pwd,$db) or die(mysqli_error($conxn));
	//echo "The databse has been connected " ;/*.$conxn -> thread_id;*/
	//this return a value
	
	return $conxn; //object
	
}///function ends

///////////////////////////////////////////
/// to close the database
/////////////////////////////////////////
function close($link){
	//echo "<br/> The database has been closed" ;/*.$link->thread_id*/
	mysqli_close($link);
}

//function to redirect
function redirect($url){
echo '<script type="text/javascript" language="javascript">
window.location = "'.$url.'";
</script>';	

}
?>