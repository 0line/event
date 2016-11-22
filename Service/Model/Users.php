<?php 
	/**
	* Clase Usuarios
	*/
	class Users
	{
		private $idusuario;
		private $idpersona;
		private $username;
		private $contrasena;
		private $estatus;
        private $token;
		
		function __construct(){}
		
	
    /**
     * Gets the value of idusuario.
     *
     * @return mixed
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     *Sets the value of idusuario.
     *
     * @param mixed $idusuario the idusuario
     *
     * @return self
     */
    private function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Gets the value of idpersona.
     *
     * @return mixed
     */
    public function getIdpersona()
    {
        return $this->idpersona;
    }

    /**
     *Sets the value of idpersona.
     *
     * @param mixed $idpersona the idpersona
     *
     * @return self
     */
    private function setIdpersona($idpersona)
    {
        $this->idpersona = $idpersona;

        return $this;
    }

    /**
     * Gets the value of username.
     *
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     *Sets the value of username.
     *
     * @param mixed $username the username
     *
     * @return self
     */
    private function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Gets the value of contrasena.
     *
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     *Sets the value of contrasena.
     *
     * @param mixed $contrasena the contrasena
     *
     * @return self
     */
    private function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * Gets the value of estatus.
     *
     * @return mixed
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     *Sets the value of estatus.
     *
     * @param mixed $estatus the estatus
     *
     * @return self
     */
    private function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Gets the value of token.
     *
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Sets the value of token.
     *
     * @param mixed $token the token
     *
     * @return self
     */
    private function setToken($token)
    {
        $this->token = $token;

        return $this;
    }
}
?>