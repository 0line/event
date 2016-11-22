<?php
	 /*La siguiente clase realiza el CRUD para las personas y usuarios*/
	 require 'connection.php';
	 require 'Model/Persona.php';
	 require 'Model/Users.php';
	  class DAOPersona
	  {
	  	private $con;
	  	private $persona;
	  	private $user;
	  	/*Constructor de la clase
	  	Inicialización de las variables con,persona y user*/
	  	function __construct()
	  	{
	  		$this->con= new Connection();
            $this->persona=new Persona();
            $this->user=new Users();
	  	}
	  	/*Función para la inserción de un nueva persona y usuario*/
	  	public function insertP($nombre,$app,$apm,$fnac,$tel,$direccion,$email,$img,$usuario,$pwd){
	  		$flag = false;
	  		try{
	  			$this->con->OpenConnection();
	  			$SqlCoon=$this->con->getConnection();
	  			$ArrayList = array();
	  			$validadcorreo="SELECT idpersona,correo from personas where correo='$email'";
	  			$result=$SqlCoon->query($validadcorreo);
	  			$numrow=$result->fetchColumn();
	  			$validadusuario="SELECT username from usuarios where username='$usuario'";
	  			$result=$SqlCoon->query($validadusuario);
	  			$numrow2=$result->fetchColumn();
	  			if($numrow>0 || $numrow2>0){
	  				$flag = false;
	  			}
	  			else{
	  				$flag=true;
	  				$query="INSERT into personas(idpersona,nombre, apellidop, apellidom, fechanac,telefono, direccion, correo, imagen,estatus)
	  				VALUES(default,:nombre,:apellidop,
	  				:apellidom,:fechanac,:telefono,:direccion,:correo,:imagen,1)";
	  				$sql=$SqlCoon->prepare($query);
	  				$sql->bindParam(':nombre',utf8_encode($nombre));
	  				$sql->bindParam(':apellidop',utf8_encode($app));
	  				$sql->bindParam(':apellidom',utf8_encode($apm));
	  				$sql->bindParam(':fechanac',$fnac);
	  				$sql->bindParam(':telefono',$tel);
	  				$sql->bindParam(':direccion',utf8_encode($direccion));
	  				$sql->bindParam(':correo',$email);
	  				$sql->bindParam(':imagen',$img);
	  				if($sql->execute()){
	  					$select="SELECT idpersona,correo from personas where correo='$email'";
	  					if($result=$SqlCoon->query($select)){
	  						foreach($result as $row){
	  							$this->persona->_setIdpersona($row['idpersona']);
	  							$this->persona->_setCorreo($row['correo']);
	  						}

	  						$insert="INSERT INTO usuarios (idpersona, username, contrasena,estatus) VALUES(:idpersona,:username,:contrasena,1)";
	  						$insert_user=$SqlCoon->prepare($insert);
	  						$insert_user->bindParam(':idpersona',$this->persona->getIdpersona());
	  						$insert_user->bindParam(':username',$usuario);
	  						$insert_user->bindParam(':contrasena',$pwd);
	  						$insert_user->execute(); 
	  						$flag=true;
	  					}
	  				}
	  			}
	  		}
	  		catch (exception $e){
	  			$flag=false;
	  			echo $e;
	  		}
	  		return $flag;
	  	}
	}
	/*$obj= new DAOPersona();
    var_dump($obj->insertP('Jesus Alberto','Lozano','Ventura','17/07/1996','Córdoba',
    	'2711277722','91a@utcv.edu.mx','url','jesus','12345'));*/
    /*$obj= new DAOPersona();
    var_dump($obj->insertP('Karen Itzel','Lozano','Ventura','23/04/2000','Córdoba',
    	'231','123@mail.com','url','karen','12345'));*/
?>