<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Web Dev</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="styles/main.css">
		<link href='https://fonts.googleapis.com/css?family=Abhaya Libre' rel='stylesheet'>
	</head>

	<body>
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-end">
						<nav class="main_nav_contaner ml-auto">
							<ul class="main_nav">
							  <li><a href="admin.html">Admin</a></li>
							  <li class ="active"><a href="user.html">User</a></li>
							  <li><a href="register.html">Register</a></li>
							</ul>
						</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div >
		<div class="header_search">
			<div class="container">
				<div class="row">
					<div class="col">
					<div class="text_logo pl-5">Example</div>
						<form class="form-inline">
							<input class="form-control my-xs-2 col-sm-6" name="search" type="search" placeholder="Search" aria-label="Search">
							<input class="btn ml-2" type="submit" name="submit"></input>
						</form>
						<?php 
							if ( isset( $_GET['submit'] ) ) { 
								// retrieve the form data by using the element's name attributes value as key 
								$search_product = $_GET['search']; 
								// API Key dZBL0jdoxGMgGcOxH7Os6SKMgoa9WqUACR3
								$API_KEY = "dZBL0jdoxGMgGcOxH7Os6SKMgoa9WqUACR3";

												
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

								$json_response = curl_exec($curl);
								$php_response = json_decode(curl_exec($curl));
								$err = curl_error($curl);

								curl_close($curl);

								if ($err) {
								  echo "cURL Error #:" . $err;
								} else { 
								  // echo json_encode($php_response->data[0]);
									$all_entrys = $php_response->data;

									// echo json_encode($single_entry);
									// echo count($all_entrys);
									foreach ($all_entrys as $single_entry) { ?>

										<div class="card" style="width: 18rem;">
										<img src="" class="card-img-top" alt="...">
										<div class="card-body">
										<h5 class="card-title">Card title</h5>
										<p class="card-text"><?php echo json_encode($single_entry->product_title); ?></p>
										<a href="#" class="btn btn-primary">Go somewhere</a>
										</div>
										</div>

								<?php	
									}
								}
									exit;
							} 
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</body>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
</html>
