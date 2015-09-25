<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <title>LineasdeInvestigacion.</title>
    <link rel="shortcut icon" href="http://www.itgustavoamadero.edu.mx/tema/itgam/frontend/img/logo_itgam.ico" />    

    <link rel="stylesheet" type="text/css" href="/LineasdeInvestigacion/Content/bootstrap.css" /> 
	<link rel="stylesheet" type="text/css" href="/LineasdeInvestigacion/Content/bootstrap-thema.css	" /> 
    <link rel="stylesheet" type="text/css" href="/LineasdeInvestigacion/Content/Site.css	" />
    <link rel="stylesheet" type="text/css" href="/LineasdeInvestigacion/Content/bootstrap-table.min.css	" />
        <link rel="stylesheet" type="text/css" href="/LineasdeInvestigacion/Content/simple-sidebar.css" />

	<script type="text/javascript" src="Scripts/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="/LineasdeInvestigacion/Scripts/bootstrap.js"></script>
	<script type="text/javascript" src="/LineasdeInvestigacion/Scripts/bootbox.min.js"></script>
    <script type="text/javascript" src="/LineasdeInvestigacion/Scripts/bootstrap-table.min.js"></script>
   
        <?php
            //conecto con la base de datos
            $conn = @mysql_connect("localhost","root","");
            //selecciono la BBDD
            @mysql_select_db("dbLineasInvestigacion",$conn); 
            $UserName  = "";
            //primero tengo que ver si el usuario está memorizado en una cookie
            if (isset($_COOKIE["id_usuario_dw"]) && isset($_COOKIE["marca_aleatoria_usuario_dw"]))
            {
               //Tengo cookies memorizadas
               //además voy a comprobar que esas variables no estén vacías
               if ($_COOKIE["id_usuario_dw"]!="" || $_COOKIE["marca_aleatoria_usuario_dw"]!="")
               {
                  //Voy a ver si corresponden con algún usuario
                  $ssql = "select * from Users where idUser=" . $_COOKIE["id_usuario_dw"];
                  $rs = @mysql_query($ssql);
                  if (@mysql_num_rows($rs)==1)
                  {
                      $usuario_encontrado = mysql_fetch_object($rs);
                     $UserName = $usuario_encontrado->userName;
                     
                     //header ("Location: contenidos_protegidos_cookie.php");
                  }
               }
            }
            else
{
    header('Location: login.php');   
}

?>
</head>
<body>
    <div id="wrapper">
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
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false">Bienvenido:  <?php echo $UserName ?> <span class="caret"></span></a>                            
                    </li>  
                    <li>
                        <a href="/LineasdeInvestigacion/LogOff.php" >Cerrar Sesión</a>
                    </li>                   
                </ul>
                
            </div>
        </div>
    </div>
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Historial
                </a>
            </li>
            <li>
                <a id="aInformaLinea" href="#">Informacion de la Linea </a>
            </li>
            <li>
                <a id="aProfesoresPar" href="#">Profesores participantes</a>
            </li>
            <li>
                <a id="aOficioSol" href="#">Oficio de solicitud</a>
            </li>
        </ul>
    </div>
	<div class="container" >
        <hr >	
		<h3>Solicitud de Registro de Líneas de Investigación.</h3>
        <hr />
			<div class="panel panel-default">
				<div class="panel-body">
					Altertas 
				</div>
				<div class="panel-footer">
					<td valign="top" colspan="2">
<h2 style="text-align: justify;"><img style="margin-right: 20px; float: left;" src="http://www.tecnm.mx/images/areas/difusion0101/Difusion0101/Sep/10TES/noticias-TESE.jpg" alt="noticias-TESE" width="290" height="195"></h2>
<blockquote>
<h2>25 Aniversario del Tecnológico de Estudios Superiores de Ecatepec</h2>
<p style="text-align: justify;">El maestro Manuel Quintero Quintero, Director General del Tecnológico Nacional de México, felicita a estudiantes, maestros, administrativos y autoridades por el 25 Aniversario del&nbsp;Tecnológico de Estudios Superiores de Ecatepec.</p>
<p style="text-align: justify;">&nbsp;</p>
</blockquote>
</td>
				
				</div>
			</div>
		<div>            
    </div>
</div>


</body>
</html>

    
    <script type="text/javascript">  

		       $("#aProfesoresPar").click(function(){
            bootbox.dialog({
             message:
			'<div class="row">																															        '
			+'	<div class="col-xs-12">                                                                                                                                     '
			+'<div class="form-inline">                                                                                                                          '
			+'	<p style="font-size:20px;">                                                                                                                                                        '
			+'		Antes de proporcionar la información solicitada, lea cuidadosamente cada uno de los rubros que contiene el presente formato.                            '
			+'	</p>                                                                                                                                                       '
			+'	<h5>                                                                                                                                                        '
			+'	Estimado usuario:                                                                                                                                           '
			+'	Es necesario entregar, mediante oficialía de partes, el original del Oficio de Solicitud y del Formato Concentrador con firmas autógrafas a esta Dirección. '
			+'	</h5><hr />                                                                                                                                                       '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creaciondeun select para seleccionar una Institucion-->'
			+'		<label for="inputInstitucion">Grado Académico</label>'
			+'		<select class="form-control" id="selectInsitucion">'
			+'			<option></option>'
			+'			<option value="1">Licenciatura</option>           '
			+'			<option value="2">Maestría</option>               '
			+'			<option value="3">Doctorado</option></select>     '
			+'		</select>'			
			+'	</div>'
			+'	<!--Creacion de una clase "formulario Programa Educativo"-->                                                                                                '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >Nombre</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="Nombre">     '
			+'	</div>                                                                                                                                                      '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >Dedicación</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="Horas totales">     '
			+'	</div>'
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >No. CVU</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="No. CVU">     '
			+'	</div>'            
            			+'<hr>	<div class="form-group">                                                                                                                                    '
			+'		<!--Creaciondeun select para seleccionar una Institucion-->'
			+'		<label for="inputInstitucion">Grado Académico</label>'
			+'		<select class="form-control" id="selectInsitucion">'
			+'			<option></option>'
			+'			<option value="1">Licenciatura</option>           '
			+'			<option value="2">Maestría</option>               '
			+'			<option value="3">Doctorado</option></select>     '
			+'		</select>'			
			+'	</div>'
			+'	<!--Creacion de una clase "formulario Programa Educativo"-->                                                                                                '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >Nombre</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="Nombre">     '
			+'	</div>                                                                                                                                                      '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >Dedicación</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="Horas totales">     '
			+'	</div>'
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >No. CVU</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="No. CVU">     '
			+'	</div>'            
            			+'<hr>	<div class="form-group">                                                                                                                                    '
			+'		<!--Creaciondeun select para seleccionar una Institucion-->'
			+'		<label for="inputInstitucion">Grado Académico</label>'
			+'		<select class="form-control" id="selectInsitucion">'
			+'			<option></option>'
			+'			<option value="1">Licenciatura</option>           '
			+'			<option value="2">Maestría</option>               '
			+'			<option value="3">Doctorado</option></select>     '
			+'		</select>'			
			+'	</div>'
			+'	<!--Creacion de una clase "formulario Programa Educativo"-->                                                                                                '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >Nombre</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="Nombre">     '
			+'	</div>                                                                                                                                                      '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >Dedicación</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="Horas totales">     '
			+'	</div>'
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >No. CVU</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="No. CVU">     '
			+'	</div>'            
            			+'<hr>	<div class="form-group">                                                                                                                                    '
			+'		<!--Creaciondeun select para seleccionar una Institucion-->'
			+'		<label for="inputInstitucion">Grado Académico</label>'
			+'		<select class="form-control" id="selectInsitucion">'
			+'			<option></option>'
			+'			<option value="1">Licenciatura</option>           '
			+'			<option value="2">Maestría</option>               '
			+'			<option value="3">Doctorado</option></select>     '
			+'		</select>'			
			+'	</div>'
			+'	<!--Creacion de una clase "formulario Programa Educativo"-->                                                                                                '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >Nombre</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="Nombre">     '
			+'	</div>                                                                                                                                                      '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >Dedicación</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="Horas totales">     '
			+'	</div>'
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >No. CVU</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="No. CVU">     '
			+'	</div>'            
            			+'<hr><div class="form-group">                                                                                                                                    '
			+'		<!--Creaciondeun select para seleccionar una Institucion-->'
			+'		<label for="inputInstitucion">Grado Académico</label>'
			+'		<select class="form-control" id="selectInsitucion">'
			+'			<option></option>'
			+'			<option value="1">Licenciatura</option>           '
			+'			<option value="2">Maestría</option>               '
			+'			<option value="3">Doctorado</option></select>     '
			+'		</select>'			
			+'	</div>'
			+'	<!--Creacion de una clase "formulario Programa Educativo"-->                                                                                                '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >Nombre</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="Nombre">     '
			+'	</div>                                                                                                                                                      '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >Dedicación</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="Horas totales">     '
			+'	</div>'
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProfesoresPartic" >No. CVU</label>                                                                 '
			+'			<input type="text" class="form-control" id="inputProfesoresPartic" placeholder="No. CVU">     '
			+'	</div>'            
            
			+'	</div>                                                                                                                                                     '
			+'	</div>                                                                                                                                                      '
            +'</div>',
             title: "Profesores participantes",
             className: "my-modal300",
             onEscape: function() {},
             animate: true,
             buttons: {
                   success: {   
                            label: "Guardar",
                            className: "btn btn-primary",
                            callback: function() {
                                bootbox.alert("Se a guardado correctamente su oficio ¡Gracias!")
                            }
                },
                error: {   
                            label: "Cancelar",
                            className: "btn btn-danger",
                            callback: function() {
                                
                            }
                },
             },
             
        });
       });
	
       $("#aInformaLinea").click(function(){
            bootbox.dialog({
             message:
			'             <div class="row">																															        '
			+'	<div class="col-xs-12">                                                                                                                                     '
			+'		<form class="form-horizontal">                                                                                                                          '
			+'	<p style="font-size:20px;">                                                                                                                                                        '
			+'		Antes de proporcionar la información solicitada, lea cuidadosamente cada uno de los rubros que contiene el presente formato.                            '
			+'	</p>                                                                                                                                                       '
			+'	<h5>                                                                                                                                                        '
			+'	Estimado usuario:                                                                                                                                           '
			+'	Es necesario entregar, mediante oficialía de partes, el original del Oficio de Solicitud y del Formato Concentrador con firmas autógrafas a esta Dirección. '
			+'	</h5><hr />                                                                                                                                                       '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creaciondeun select para seleccionar una Institucion-->                                                                                             '
			+'		<label for="inputInstitucion" class="col-sm-3 control-label">Institucion</label>                                                                        '
			+'		<div class="col-sm-9">                                                                                                                                 '
			+'			<select class="form-control" id="selectInsitucion">                                                                                                 '
			+'			<option></option>                                                                                                                                   '
			+'				<option value="seleccione">Seleccione una Opcion</option>                                                                                       '
			+'				<option value="laguna">Instituto Tecnológico de La Laguna</option>                                                                              '
			+'				<option value="tijuana">Instituto Tecnológico de Tijuana</option>                                                                               '
			+'				<option value="tlalnepantla">Instituto Tecnológico de Tlalnepantla</option>                                                                     '
			+'				<option value="ecatepec">Tecnológico de Estudios Superiores de Ecatepec</option>                                                                '
			+'				<option value="irapuato">Instituto Tecnológico Superior de Irapuato</option>                                                                    '
			+'				<option value="cenidet">Centro Nacional de Investigación y Desarrollo Tecnológico</option>			                                            '
			+'		</select>                                                                                                                                               '
			+'		</div>                                                                                                                                                  '
			+'	</div>                                                                                                                                                      '
			+'	<!--Creacion de una clase "formulario Programa Educativo"-->                                                                                                '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Programa Educativo-->                                                                                                 '
			+'		<label for="inputProgramaEdu" class="col-sm-3 control-label">Programa Educativo</label>                                                                 '
			+'		<div class="col-sm-9">                                                                                                                                 '
			+'			<select class="form-control" id="selectProgramaEdu">                                                                                                '
			+'					<option></option>                                                                                                                           '
			+'			</select>                                                                                                                                           '
			+'		</div>                                                                                                                                                  '
			+'	</div>                                                                                                                                                      '
			+'	<!--Creacion de una clase "formulario Nombre de la Linea de Investigacion"-->                                                                               '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para NombreLineaInves-->                                                                                                      '
			+'		<label for="inputNombreLinea" class="col-sm-3 control-label">Nombre de la linea de Investigacion</label>                                                '
			+'		<div class="col-sm-9">                                                                                                                                 '
			+'			<select class="form-control" id="selectNombreLinea">                                                                                                '
			+'				<option></option>                                                                                                                               '
			+'					<option value="seleccione">Seleccione una Opcion</option>                                                                                   '
			+'					<option value="analisis">Analisis de Vibraciones Mecanicas</option>                                                                         '
			+'					<option value="electronica">Electronica de Potencia</option>                                                                                '
			+'					<option value="gestion">Gestion de Pequeñas y Medianas Empresas</option>                                                                    '
			+'					<option value="materiales">Materiales Polimericos</option>                                                                                  '
			+'					<option value="cenidet">Mecatronica</option>	                                                                                            '
			+'					<option value="cenidet">Mecatronica y Control</option>	                                                                                    '
			+'					<option value="cenidet">Quimica Organica</option>	                                                                                        '
			+'					<option value="cenidet">Sistemas Electronicos de Potencia</option>	                                                                        '
			+'			</select>                                                                                                                                           '
			+'		</div>                                                                                                                                                  '
			+'	</div>                                                                                                                                                      '
			+'	                                                                                                                                                            '
			+'	<!--Creacion de una clase "formulario Nivel S.N.I"-->                                                                                                       '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<!--Creacion de un select para un Nivel S.N.I-->                                                                                                        '
			+'		<label for="inputLiderLinea" class="col-sm-3 control-label">Lider de la linea de Investigacion</label>                                                  '
			+'		<div class="col-sm-9">                                                                                                                                 '
			+'			<select class="form-control" id="selectLiderLine">                                                                                                  '
			+'				<option></option>                                                                                                                               '
			+'				<option value="seleccione">Seleccione una Opcion</option>                                                                                       '
			+'				<option value="ninguno">Ninguno</option>                                                                                                        '
			+'				<option value="candidato">Candidato</option>                                                                                                    '
			+'				<option value="nivel1">Nivel 1</option>                                                                                                         '
			+'				<option value="nivel2">Nivel 2</option>                                                                                                         '
			+'				<option value="nivel3">Nivel 3</option>	                                                                                                        '
			+'			</select>                                                                                                                                           '
			+'		</div>                                                                                                                                                  '
			+'	</div>                                                                                                                                                      '
			+'	                                                                                                                                                            '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<label for="inputLiderLinea" class="col-sm-3 control-label">Lider de la Linea de Investigacion</label>                                                  '
			+'		<div class="col-sm-9">                                                                                                                                 '
			+'			<input type="text" class="form-control" id="inputLiderLinea" placeholder="Tal como indica su identificacion oficial">                               '
			+'		</div>                                                                                                                                                  '
			+'	</div>                                                                                                                                                      '
			+'	                                                                                                                                                            '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<label for="inputEmail" class="col-sm-3 control-label">Correo Electronico</label>                                                                       '
			+'		<div class="col-sm-9">                                                                                                                                 '
			+'			<input type="text" class="form-control" id="inputEmail" placeholder="Escriba su correo electronico">                                                '
			+'		</div>                                                                                                                                                  '
			+'	</div>                                                                                                                                                      '
			+'	                                                                                                                                                            '
			+'	<div class="form-group">                                                                                                                                    '
			+'		<label for="inputObjetivo" class="col-sm-3 control-label">Objetivo General de la Línea de Investigación</label>                                         '
			+'		<div class="col-sm-9">                                                                                                                                 '
			+'		<textarea style="height: 170px;" class="form-control" id="inputEmail" placeholder="Maximo 1,000 caracteres" ></textarea>'
			+'		</div>                                                                                                                                                  '
			+'	</div>                                                                                                                                                      '
			+'	</form>                                                                                                                                                     '
			+'	</div>                                                                                                                                                      '
            +'</div>',
             title: "Informacion de la Linea ",
             onEscape: function() {},
             animate: true,
             buttons: {
                   success: {   
                            label: "Guardar",
                            className: "btn btn-primary",
                            callback: function() {
                                bootbox.alert("Se a guardado correctamente su oficio ¡Gracias!")
                            }
                },
                error: {   
                            label: "Cancelar",
                            className: "btn btn-danger",
                            callback: function() {
                                
                            }
                },
             },
             
        });
       });
       
       
       $("#aOficioSol").click (function() {
            bootbox.dialog({
             message:' <div class="row">'
+'            <div class="col-xs-12">'
+'        '
+'        <form class="form-horizontal">'
+'            <h3>'
+'                Antes de proporcionar la información solicitada, lea cuidadosamente cada uno de los rubros que contiene el presente formato.'
+'            </h3>'
+'            <h5>'
+'            Estimado usuario:'
+'            Es necesario entregar, mediante oficialía de partes, el original del Oficio de Solicitud y del Formato Concentrador con firmas autógrafas a esta Dirección.'
+'            </h5>'
+'            <div class="form-group">'
+'                <label for="inputName" class="col-sm-2 control-label">Nombre</label>'
+'                <div class="col-sm-10">'
+'                    <input type="text" class="form-control" id="inputName" placeholder="Nombre">'
+'                </div>'
+'            </div>'
+'             <div class="form-group">'
+'                <label for="inputInstitucion" class="col-sm-2 control-label">Institucion</label>'
+'                <div class="col-sm-10">'
+'                    <input type="text" class="form-control" id="inputInstitucion" placeholder="Institucion">'
+'                </div>'
+'                </div>'
+'                '
+'                <div class="form-group">'
+'                <label for="inputOficio" class="col-sm-2 control-label">No.de Oficio</label>'
+'                <div class="col-sm-10">'
+'                    <input type="text" class="form-control" id="iinputOficio" placeholder="No.de Oficio">'
+'                 </div>'
+'                 </div>'
+'        </form>'
+'        '
+'            </div>'
+'            </div>'
+'    ',
             title: "Oficio de Solicitud",
             onEscape: function() {},
             animate: true,
             buttons: {
                   success: {   
                            label: "Guardar",
                            className: "btn btn-primary",
                            callback: function() {
                                bootbox.alert("Se a guardado correctamente su oficio ¡Gracias!")
                            }
                },
                error: {   
                            label: "Cancelar",
                            className: "btn btn-danger",
                            callback: function() {
                                
                            }
                },
             },
             
        });
    });
 </script>
<style>
   .modal-dialog {
    right: auto;
    left: 50%;
    width: 900px;
    padding-top: 30px;
    padding-bottom: 30px;
}
   .my-modal300 {  
    
        }
        .my-modal300 > .modal-dialog {  
     right: auto;
    left: 50%;
    width: 1200px;
    padding-top: 30px;
    padding-bottom: 30px;
        }
</style>