<?php 
	header('Content-Type:application/json');
	require('DAO/DaoLogin.php');

	$LoginDAO=new DaoLogin();
	
	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

    
    
 	//header("Access-Control-Allow-Origin: *");
    

	switch ($_SERVER['REQUEST_METHOD']) {
		/*case 'GET':{
			echo $LoginDAO->Login($user='jesus',$password='12345');
			break;
		}*/

		case 'POST':{
			$user=$_POST['user'];
			$password=$_POST['password'];
			if ($LoginDAO->Login($user,$password)==true) {
				$ArrayResponse[] = array("Message" => true);	
				echo json_encode($ArrayResponse);	
			} else {
				$ArrayResponse[] = array("Message" => false);	
				echo json_encode($ArrayResponse);
			}
			break;
		}
			
	}



?>