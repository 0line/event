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
			//$imagen=($_FILES['img']);
			if ($_FILES['img']['error'] > 0) {
				$ArrayResponse[] = array("Message" => "error imagen");	
				echo json_encode($ArrayResponse);
			} else {
				$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
				$limite_kb = 2048;
				if(in_array($_FILES['img']['type'], $permitidos) && $_FILES['img']['size'] <= $limite_kb * 1024 ){
					$ruta = "imagenes/".$_FILES['img']['name'];
					if(!file_exists($ruta)){
						$resultado =move_uploaded_file($_FILES['img']['tmp_name'], $ruta);
						if($resultado){
							$nombre = $_FILES['img']['name'];
							$ArrayResponse[] = array("ruta" => $ruta);
							echo json_encode($ArrayResponse);
						}else{$ArrayResponse[] = array("Message" => "error al mover el archivo");	
				echo json_encode($ArrayResponse);}
					}else{$ArrayResponse[] = array("Message" => "ya existe imagen");	
				echo json_encode($ArrayResponse);}
				}else{$ArrayResponse[] = array("Message" => "archivo no permitido");	
				echo json_encode($ArrayResponse);}
			}			
			break;
		}
			
	}
?>