<?php
   $servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventbd";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname); 
$query="SELECT * FROM publicaciones";
$publicaciones=$conn->query($query);
?>


<!DOCTYPE html>
<html>
<head>
<title>Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    <script src="js/jquery.mobile-1.4.5.min.js"></script>
    
</head>
<body>
   
<div id="Principal" data-role="page" data-theme="d">
    <div data-role="header">
        <h1>Eventos</h1>
    </div>
    <div data-role="content">
 
     <?php
        while ($mostrar = $publicaciones->fetch_array(MYSQLI_ASSOC)) 
        {
         
              echo "<h2>Titulo</h2>".$mostrar['titulo']."<br>";
              echo "Descripcion".$mostrar['descripcion']."<br>";
            }
        ?>

</div>
    <div data-role="footer" data-position="fixed">
        <a href="#Nuevoevento" data-role="button" data-icon="plus" >Nuevo</a>
    </div>
</div>  



<div id="Nuevoevento" data-role="page" data-theme="a">
    <div data-role="header">
        <h1>Registrar Nuevo Evento</h1>
    </div>
    <div data-role="content">
        <div id="register_form">
        <script>
        $("#formulario").submit(function () {  
    if($("#nombre").val().length < 1) {  
        alert("El nombre es obligatorio");  
        return false;  
    }  
    return false;  
});  
</script>
    <form name="register" method="post" action="http://localhost/Event-app/www/Service/insertar-publicacion.php" onsubmit="return formulario(this)">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" />
        <!-- <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" /> -->
        <?php
        if ($publicaciones->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $publicaciones->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobit .=" <option value='".$row['idcategoria']."'></option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}
?>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" />
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" />
        <label for="horario">Horario:</label>
        <input type="text" id="horario" name="horario" />
        <label for="informes">Informes:</label>
        <input type="text" id="informes" name="informes" />
        <label for="costo">Costo del Evento:</label>
        <input type="text" id="costo" name="costo" />
        <label for="imagen">Imagen:</label>
        <input type="text" id="imagen" name="imagen" />
        <input name="submit" type="submit" value="Registrar Evento" id="enviar-btn" />
    </form>
</div>
    </div>
    <div data-role="footer" data-position="fixed">
       <a href="#Principal" data-role="button" data-icon="back">Regresar</a>  
    </div>
</div>


</body>
</html>