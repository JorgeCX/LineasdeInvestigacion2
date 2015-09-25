<?php
require_once ("../bin/LineasInvestigacion.php");

try{
     $accion = $_GET["accion"];
      
     switch($accion)
     {
            case "getHistorial":
                    getHistorial();           
            break;     
            case "createLine":
            if($_POST)
           {                
                $json = createLines(); //'{"foo-bar": 12345}';  
                $lineas = new Linea;
                $obj = json_decode($json);
                $lineas->setInstitucion($obj->{'foo-bar'});
                print $lineas->getInstitucion(); // 12345
           }
            break;    
     }
       
}
catch(Exception $ex)
{
        
}
function createLines($VaribleName)
{
    return json_decode($_POST[$VaribleName]);
}

function getHistorial()
{
    //conecto con la base de datos
            $conn = @mysql_connect("localhost","root","");
            //selecciono la BBDD
            @mysql_select_db("dbDepMantenimientoCC",$conn); 
    $SGetPendindientes = @"
                     select S.idSolicitud,a.Nombre as dep ,T.Tipo,S.Nombre
                        ,S.FechaElaboracion,s.Descripcion,'Pendiente' as Status 
                        from SolicitudMantenimiento as S inner join areas as a
                        on S.idArea= a.idArea inner join TipoSolicitud T
                        on S.idTipo = T.idTipo;
                     ";                     
                     $ResultPendientes = mysql_query($SGetPendindientes);
                     if(@mysql_num_rows($ResultPendientes)>0)
                     {
                        
                        while ($row = mysql_fetch_array($ResultPendientes)) 
                        {
                              $idSolicitud = $row[0];
                              $dep= $row[1];
                              $Tipo= $row[2];
                              $Nombre= $row[2];
                              $FechaElaboracion= $row[3];
                              $Descripcion= $row[4];
                              
                               $Pendientes[] = array('idSolicitud'=> $idSolicitud, 'dep'=> $dep, 'Tipo'=> $Tipo,'Nombre'=>$Nombre, 'FechaElaboracion'=> $FechaElaboracion,
                                                'Descripcion'=> $Descripcion);
                        }     
                            $json_string = @json_encode($Pendientes);
                            echo $json_string;   
                     } 
}
?>