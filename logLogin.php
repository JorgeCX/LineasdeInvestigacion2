<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <title>login</title>
    <link rel="shortcut icon" href="http://www.itgustavoamadero.edu.mx/tema/itgam/frontend/img/logo_itgam.ico" />    

    <link rel="stylesheet" type="text/css" href="/LineasdeInvestigacion/Content/bootstrap.css" /> 
	<link rel="stylesheet" type="text/css" href="/LineasdeInvestigacion/Content/bootstrap-thema.css	" /> 

	<script type="text/javascript" src="/LineasdeInvestigacion/Scripts/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="/LineasdeInvestigacion/Scripts/bootstrap.js"></script>
	<script type="text/javascript" src="/LineasdeInvestigacion/Scripts/bootbox.min.js"></script>
    <?php
//conecto con la base de datos
$conn = @mysql_connect("localhost","root","");
//selecciono la BBDD
@mysql_select_db("dbLineasInvestigacion",$conn); 

//primero tengo que ver si el usuario está memorizado en una cookie
if (isset($_COOKIE["id_usuario_dw"]) && isset($_COOKIE["marca_aleatoria_usuario_dw"]))
{
   //Tengo cookies memorizadas
   //además voy a comprobar que esas variables no estén vacías
   if ($_COOKIE["id_usuario_dw"]!="" || $_COOKIE["marca_aleatoria_usuario_dw"]!="")
   {
      //Voy a ver si corresponden con algún usuario
      $ssql = "select * from Users where idUser=" . $_COOKIE["id_usuario_dw"] . " and cookie='" . $_COOKIE["marca_aleatoria_usuario_dw"] . "' and cookie<>''";
      $rs = mysql_query($ssql);
      if (mysql_num_rows($rs)==1)
      {
         echo "<b>Tengo un usuario correcto en una cookie</b>";
         $usuario_encontrado = mysql_fetch_object($rs);
         echo "<br>Eres el usuario número " . $usuario_encontrado->idUser . ", de nombre " . $usuario_encontrado->userName;
        
        $SQLROL = @"select NombreRol from UserRol UR inner join Users U
                  on UR.idUser = U.idUser inner join Roles R 
                  on R.idRol = UR.idRol
                  where U.idUser =". $usuario_encontrado->idUser;
        $rolUser = mysql_query($SQLROL);
        
        if(mysql_num_rows($rolUser)>1)
        {
               $UserRool= mysql_fetch_object($rolUser);
               
               switch($UserRool->NombreRol)
               {
                   case "Administrador":
                        header('Location: /Administrador/admin.php');
                   break;                          
                   case "Solicitantes":
                        header('Location: index.php');
                   break;
               }
        }
         //header('Location: index.php');
      }
   }
}

if ($_POST)
{
   //es que estamos recibiendo datos por el formulario de autenticación (recibo de $_POST)

   //debería comprobar si el usuario es correcto
   $ssql = "select * from Users where Username = '" . $_POST["usuario"] . "' and password='" . $_POST["clave"] . "'";
   //echo $ssql;
   $rs = mysql_query($ssql);
   if (@mysql_num_rows($rs)==1)
   {
     
      //TODO CORRECTO!! He detectado un usuario
     $usuario_encontrado = mysql_fetch_object($rs);
      //ahora debo de ver si el usuario quería memorizar su cuenta en este ordenador
      if(@$_POST["RememberMe"] != null)
      {
          if ($_POST["RememberMe"]=="1"){
             //es que pidió memorizar el usuario
             //1) creo una marca aleatoria en el registro de este usuario
             //alimentamos el generador de aleatorios
             mt_srand (time());
             //generamos un número aleatorio
             $numero_aleatorio = mt_rand(1000000,999999999);
             //2) meto la marca aleatoria en la tabla de usuario
             
             $ssql = "update users set cookie=".$numero_aleatorio." where idUser=" . $usuario_encontrado->idUser;
             @mysql_query($ssql);
             //3) ahora meto una cookie en el ordenador del usuario con el identificador del usuario y la cookie aleatoria
             setcookie("id_usuario_dw", $usuario_encontrado->idUser , time()+(60*60*24*365));
             setcookie("marca_aleatoria_usuario_dw", $numero_aleatorio, time()+(60*60*24*365));
          }
          else
          { 
               $ssql = "update users set cookie=".$numero_aleatorio." where idUser=" . $usuario_encontrado->idUser;
               @mysql_query($ssql);
               mt_srand (time());
               $numero_aleatorio2 = mt_rand(1000000,999999999);
               setcookie("id_usuario_dw", $usuario_encontrado->idUser , time()+(60*60*24*365));
               setcookie("marca_aleatoria_usuario_dw", $numero_aleatorio2, time()+(60*60*24*365));
          }
      }
      else
      { 
            mt_srand (time());
           $numero_aleatorio2 = mt_rand(1000000,999999999);
           setcookie("id_usuario_dw", $usuario_encontrado->idUser , time()+(60*60*24*365));
           setcookie("marca_aleatoria_usuario_dw", $numero_aleatorio2, time()+(60*60*24*365));
      }
       $SQLROL = @"select NombreRol from UserRol UR inner join Users U
                  on UR.idUser = U.idUser inner join Roles R 
                  on R.idRol = UR.idRol
                  where U.idUser =". $usuario_encontrado->idUser;
        $rolUser = mysql_query($SQLROL);
        
        if(mysql_num_rows($rolUser)>0)
        {
               $UserRool= mysql_fetch_object($rolUser);               
               switch($UserRool->NombreRol)
               {
                   case "Administrador":
                        header('Location: /LineasdeInvestigacion/Administrador/admin.php');
                   break;                          
                   case "Solicitantes":
                        header('Location: index.php');
                   break;
               }
        }
        else
         header('Location: index.php');   
     
      
   }
   else
   {
      echo "Fallo de autenticación!";
      echo "<p><a href='/LineasdeInvestigacion/login.php'>Volver</a>";
   }
   
}
else
{
}
?>
</head>
<body>
	
</body>
</html>
