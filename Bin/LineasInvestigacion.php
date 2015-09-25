<?php

class Linea
{
    protected $Institucion;
    protected $ProgramaEducativo;
    protected $Nombrelinea;
    
    function setInstitucion($institucion)
    {
        $this->Institucion = $institucion;
    }
    function getInstitucion()
    {
        return $this->Institucion;
    }
}
?>