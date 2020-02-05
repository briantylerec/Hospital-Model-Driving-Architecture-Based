<?php
require_once 'model/Facultad.php';

class FacultadController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Facultad();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/Facultad/Facultad.php';
       
    }
    
    public function Crud(){
        $Facultad = new Facultad();
        //cambiar el parentesis por corchetes
			if(isset($_REQUEST ['idFacultad'])){
            $Facultad = $this->model->Obtener($_REQUEST ['idFacultad']);  
        }

        
        
        require_once 'view/header.php';
        require_once 'view/Facultad/Facultad-editar.php';
        
    }
	
	public function CrudAdd(){
        $Facultad = new Facultad();
        //cambiar el parentesis por corchetes
			if(isset($_REQUEST ['idFacultad'])){
            $Facultad = $this->model->Obtener($_REQUEST ['idFacultad']);
        }
        
        
        require_once 'view/header.php';
        require_once 'view/Facultad/Facultad-add.php';
        
    }
    
    public function Guardar(){
        $Facultad = new Facultad();
        //cambiar el parentesis por corchetes
			$Facultad->idFacultad= $_REQUEST['idFacultad'];
				
			$Facultad->nombre= $_REQUEST['nombre'];
				
        $this->model->Registrar($Facultad);
        
        header('Location: indexFacultad.php');
    }

	public function Modificar(){
        $Facultad = new Facultad();
        //cambiar el parentesis por corchetes
			$Facultad->idFacultad= $_REQUEST['idFacultad'];
			$Facultad->nombre= $_REQUEST['nombre'];
        
		$this->model->Actualizar($Facultad);
        
        header('Location: indexFacultad.php');
    }
    
    public function Eliminar(){
			$this->model->Eliminar($_REQUEST['idFacultad']);
        
        header('Location: indexFacultad.php');
    }
}
