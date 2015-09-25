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
         
         $usuario_encontrado = mysql_fetch_object($rs);
         $ssql = "update Users set cookie=null where idUser=" . $usuario_encontrado->idUser;
         @mysql_query($ssql);        
        
      }
     unset($_COOKIE['id_usuario_dw']);
     unset($_COOKIE['marca_aleatoria_usuario_dw']);
     setcookie("id_usuario_dw", "", time()-3600);
     setcookie("marca_aleatoria_usuario_dw", "", time()-3600);
      header('Location: index.php');
   }
   else
   {
           unset($_COOKIE['id_usuario_dw']);
           unset($_COOKIE['marca_aleatoria_usuario_dw']);
           setcookie("id_usuario_dw", "", time()-3600);
           setcookie("marca_aleatoria_usuario_dw", "", time()-3600);
           header('Location: index.php');      
      }
}

?>
</head>
<body>
	
</body>
</html>
