<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <title>Iniciar sesión</title>
    <link rel="shortcut icon" href="http://www.itgustavoamadero.edu.mx/tema/itgam/frontend/img/logo_itgam.ico" />    

    <link rel="stylesheet" type="text/css" href="/LineasdeInvestigacion/Content/bootstrap.css" /> 
	<link rel="stylesheet" type="text/css" href="/LineasdeInvestigacion/Content/bootstrap-thema.css	" />
    <link rel="stylesheet" type="text/css" href="/LineasdeInvestigacion/Content/Site.css" /> 


	<script type="text/javascript" src="Scripts/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="/LineasdeInvestigacion/Scripts/bootstrap.js"></script>
	<script type="text/javascript" src="/LineasdeInvestigacion/Scripts/bootbox.min.js"></script>
</head>
<body>
     <div class="navbar navbar-custom  navbar-fixed-top">

        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/LineasdeInvestigacion/index.php">Inicio</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">                    
                </ul>                
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false">Bienvenido:   <span class="caret"></span></a>                            
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>

	<div class="container" >	
		<h2>Iniciar sesión</h2>
        <h4>Use una cuenta local para iniciar sesión.</h4>
<hr />
            <div class="row">
                <div class="col-md-8">
                    <section id="loginForm">
                        <form action="/LineasdeInvestigacion/logLogin.php" class="form-horizontal" method="post">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Usuario:</label>                                        
                                <div class="col-md-6">
                                    <input class="form-control"  type="text" name="usuario" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Contraseña:</label>                                        
                                <div class="col-md-6">
                                    <input class="form-control"  type="password" name="clave" />
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-md-offset-2 col-md-6">
                                <div class="checkbox">
                                    <input  name="RememberMe" type="checkbox" value="1">
                                    <label for="RememberMe">¿Recordar cuenta?</label>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <input type="submit" value="Iniciar sesión" class="btn btn-default">
                                </div>
                            </div>
                         </form>
                    </section>
                </div>
           </div>
    </div>
	
</body>
</html>
