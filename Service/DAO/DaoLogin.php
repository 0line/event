<?php 
    /**Copyright : 0Line* */
    /**Código dl DAO para el login del usuario dentro de Event App
    Se requiere la conexión a la base de datos y el modelo del usuario de la DB
    **/
    require 'connection.php';
    require 'Model/Users.php';
    class DaoLogin
    {
        private $con;
        private $user;
        function __construct()
        {
            $this->con= new Connection();
            $this->user=new Users();
        }

        public function Login($user,$password){
            try {
                $flag=false;
                $user=$user;
                $password=$password;
                $this->con->OpenConnection();
                $SqlCoon=$this->con->getConnection();
                $ArrayList = array();
                $sql="select * from usuarios where username='$user' AND contrasena='$password'";
                $result=$SqlCoon->query($sql);
                $numrow=$result->rowCount();
                if ($numrow==1) {
                    $flag=true;
                    /*include 'tokengenerate.php'; 
                    $token = generateRandomString();
                    $update = "update usuarios set token='$token' WHERE username='$user' AND contrasena='$password'";
                    $qr=$SqlCoon->query($update);
                    if($qr){
                        $st="SELECT username, token FROM usuarios WHERE username='$user' AND contrasena='$password'";
                    }
                    foreach ($SqlCoon->query($st) as $row) {
                        $ArrayList[]= array(
                            'username' => utf8_encode($row['username']),
                            'token'=>$row['token']
                        );
                    return $ArrayList;*/                   
                }
            } catch (Exception $e) {
                $flag=false;
            }
            return $flag;
        }
}

   /* $obj= new DaoLogin();
    $obj->Login('jesus','12345');*/
?>