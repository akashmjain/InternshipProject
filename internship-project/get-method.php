<?php 
	if ( isset( $_GET['submit'] ) )
	{ 
	// retrieve the form data by using the element's name attributes value as key 
	$firstname = $_GET['firstname']; $lastname = $_GET['lastname']; 
	// display the results
	echo '<h3>Form GET Method</h3>'; 
	echo 'Your name is ' . $lastname . ' ' . $firstname; exit;
}

 ?> 
 