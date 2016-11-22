<?php 
	header('Content-Type:application/json');
	require('DAO/DaoPersona.php');

	$PersonaDao=new DAOPersona();
	
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

	switch ($_SERVER['REQUEST_METHOD']) {
		/*case 'GET':{
			echo $LoginDAO->Login($user=$_POST['user'],$password=$_POST['password']);
			break;
		}*/

		case 'POST':{
			/*$postdata = file_get_contents("php://input");
			if (isset($postdata)) {
				$request = json_decode($postdata);
				$nombre=$request->nombre;
				$app=$request->app;
				$apm=$request->apm;
				$fnac=$request->fechanac;
				$tel=$request->tel;
				$dir=$request->direccion;
				$email=$request->email;
				$img=$request->img;
				$user=$request->usuario;
				$password=$request->contrasena;
				if($PersonaDao->insertP($nombre,$app,$apm,$fnac,
					$tel,$dir,$email,$img,$user,$password))
				{
					$ArrayResponse[] = array("Message" => "true");	
					echo json_encode($ArrayResponse);
				}
				else{
					$ArrayResponse[] = array("Message" => "false");	
					echo json_encode($ArrayResponse);
				}
			}*/
			echo $PersonaDao->insertP(
			$nombre=$_POST['nombre'],
			$app=$_POST['app'],
			$apm=$_POST['apm'],
			$fnac=$_POST['fechanac'],
			$tel=$_POST['tel'],
			$dir=$_POST['direccion'],
			$email=$_POST['email'],
			$img=$_POST['img'],
			$user=$_POST['usuario'],
			$password=$_POST['contrasena']);	
			break;
		}
			
	}
?>