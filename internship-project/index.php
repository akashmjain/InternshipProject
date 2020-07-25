<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
	<body>
		<form action="" method="get"> 
			<input type="text" name="search" placeholder="Search Product" /> 
			

			<input type="submit" name="submit" /> 
		</form> 
		<?php 
			if ( isset( $_GET['submit'] ) ) { 
				// retrieve the form data by using the element's name attributes value as key 
				$search_product = $_GET['search']; 
				// API Key dZBL0jdoxGMgGcOxH7Os6SKMgoa9WqUACR3
				$API_KEY = "dZBL0jdoxGMgGcOxH7Os6SKMgoa9WqUACR3";
				// display the results
				echo '<h3>Form GET Method</h3>'; 
				echo 'Your name is ' . $search_product;
				
				// API documentation 
								
				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://price-api.datayuge.com/api/v1/compare/search?api_key=".$API_KEY."&product=".$search_product."&page=1",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_HTTPHEADER => array(
				    "content-type: application/json"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  echo $response;
				}
				exit;
			}
		?>
	</body>
</html>