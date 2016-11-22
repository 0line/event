<?php 
	Class Persona{
	private $idpersona;
	private $nombre;
	private $apellidop;
	private $apellidom;
	private $fechanac;
	private $telefono;
	private $direccion;
	private $correo;
	private $imagen;
	private $estatus;
	function __construct()
		{}
	
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
     * Sets the value of idpersona.
     *
     * @param mixed $idpersona the idpersona
     *
     * @return self
     */
    public function _setIdpersona($idpersona)
    {
        $this->idpersona = $idpersona;

        return $this;
    }

    /**
     * Gets the value of nombre.
     *
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Sets the value of nombre.
     *
     * @param mixed $nombre the nombre
     *
     * @return self
     */
    public function _setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Gets the value of apellidop.
     *
     * @return mixed
     */
    public function getApellidop()
    {
        return $this->apellidop;
    }

    /**
     * Sets the value of apellidop.
     *
     * @param mixed $apellidop the apellidop
     *
     * @return self
     */
    public function _setApellidop($apellidop)
    {
        $this->apellidop = $apellidop;

        return $this;
    }

    /**
     * Gets the value of apellidom.
     *
     * @return mixed
     */
    public function getApellidom()
    {
        return $this->apellidom;
    }

    /**
     * Sets the value of apellidom.
     *
     * @param mixed $apellidom the apellidom
     *
     * @return self
     */
    public function _setApellidom($apellidom)
    {
        $this->apellidom = $apellidom;

        return $this;
    }

    /**
     * Gets the value of fechanac.
     *
     * @return mixed
     */
    public function getFechanac()
    {
        return $this->fechanac;
    }

    /**
     * Sets the value of fechanac.
     *
     * @param mixed $fechanac the fechanac
     *
     * @return self
     */
    public function _setFechanac($fechanac)
    {
        $this->fechanac = $fechanac;

        return $this;
    }

    /**
     * Gets the value of telefono.
     *
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Sets the value of telefono.
     *
     * @param mixed $telefono the telefono
     *
     * @return self
     */
    public function _setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Gets the value of direccion.
     *
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Sets the value of direccion.
     *
     * @param mixed $direccion the direccion
     *
     * @return self
     */
    public function _setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Gets the value of correo.
     *
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Sets the value of correo.
     *
     * @param mixed $correo the correo
     *
     * @return self
     */
    public function _setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Gets the value of imagen.
     *
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Sets the value of imagen.
     *
     * @param mixed $imagen the imagen
     *
     * @return self
     */
    public function _setImagen($imagen)
    {
        $this->imagen = $imagen;

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
     * Sets the value of estatus.
     *
     * @param mixed $estatus the estatus
     *
     * @return self
     */
    public function _setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }
}
	
?>