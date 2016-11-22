jQuery(function() {
    /**Función para enviar los datos de logueo**/
    $('#loginbtn').click(function() {
        var user='';
        var psw='';
        user= $('input[name=txtuser]').val();
        psw=$('input[name=txtpassword]').val();
        if (!$.isEmptyObject(user)) {
            if (!$.isEmptyObject(psw)) {
                if (!$.isEmptyObject(user) && !$.isEmptyObject(psw)) {
                    var SendInfo= {user : user, password : psw};
                    $.ajax({
                      method: "POST",
                      url: "../Service/LoginService.php",
                      data: SendInfo
                    })
                    .done(function( msg ) {
                        var key='';
                        $.each(msg,function(i)
                        { key=msg[i].Message}); 
                        if (key==true) {
                            $.mobile.navigate( "app.html" );
                        }
                        else{
                            $('#resultado').empty();
                            $('#resultado').append('<h6 class="nd2-title clr-red align-center">Usuario o contraseña incorrectos</h6>');
                        }                        
                    })
                    .fail(function(msg) {
                        console.log(msg);
                        $('#resultado').append('<h6 class="nd2-title clr-red align-center">Ocurrio un error,trabajamos para resolverlo.</h6>');
                    });
                }
                else{
                    $('#resultado').empty();
                    $('#resultado').append('<h6 class="nd2-title clr-red align-center">Es necesario completar todos los datos</h6>');
                }
            }
            else{
                $('#resultado').empty();
               $('#resultado').append('<h6 class="nd2-title clr-red align-center">Error contraseña vacía</h6>'); 
            }
        }
        else{
            $('#resultado').empty();
            $('#resultado').append('<h6 class="nd2-title clr-red align-center">Falta el usuario</h6>');
        }
    });
    /**Función para navegar a la vista de registro de usuario**/
    $("#registrarme").on('click', function(event) {
        event.preventDefault();
        $.mobile.navigate( "#newuser" );
    });
    /**Función para buscar ciudad con google maps**/
        var autocomplete = new google.maps.places.Autocomplete($("#txtdir")[0], {});
         google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place.address_components);
            });
     /**Función para enviar los datos delregistro de usuario**/
    $("#usuarionuevo").click(function(){          
        var nombre= $('input[name=txtname]').val();
        var app=$('input[name=txtap]').val();
        var apm=$('input[name=txtam]').val();
        var fechnac=$('input[name=txtfn]').val();
        var tel=$('input[name=txttel]').val();
        var email=$('input[name=txtemail]').val();
        var img=new FormData();
        img.append('img',$("#txtimg").get(0).files[0]);
        var usuario=$('input[name=txtusuario]').val();
        var direccion=$('input[name=txtdir]').val();
        var contrasena=$('input[name=txtpwd]').val();
        var contrasena2=$('input[name=txtpwd2]').val();
        if($.isEmptyObject(nombre)||$.isEmptyObject(app)||$.isEmptyObject(apm)
            ||$.isEmptyObject(fechnac)||$.isEmptyObject(tel)||$.isEmptyObject(email)
            ||$.isEmptyObject(img) || $.isEmptyObject(usuario)||$.isEmptyObject(direccion)
            ||$.isEmptyObject(contrasena)||$.isEmptyObject(contrasena2)){
               alert('Faltan datos en el formulario');
        }
        else{
            console.log('aqui');
            var SendInfo= {nombre:nombre,app:app,apm:apm,fechanac:fechnac,
            tel:tel,direccion:direccion,email:email,img:img,usuario:usuario,contrasena:contrasena};
         
        }
        /*var SendInfo= {nombre:nombre,app:app,apm:apm,fechanac:fechnac,
            tel:tel,direccion:direccion,email:email,img:img,usuario:usuario,contrasena:contrasena};*/
        /*
        $.ajax({
            url: '../Service/UsuariosService.php',
            type: 'post',
            data: SendInfo,
        })
        .done(function(data) {
            console.log(data);
            alert('¡Su registro fue exitoso!');
            $.mobile.navigate( "#login" );
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function() {
            console.log("complete");
        });*/
        
        /*var request = $.post( "../Service/UsuariosService.php",function(SendInfo) {
          console.log( "success" );
        })
        .done(function(data) {
        console.log(data);
        })
        .fail(function(data) {
        console.log(data);
        });*/
    });
    /**Función para activar la busqueda* */
    
    $( "#btnbuscar" ).toggle(function() {
         $('#busevent').show();
    }, function() {
        $('#busevent').hide();
    });
});