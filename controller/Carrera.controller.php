<?php
require_once 'model/Carrera.php';

class CarreraController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Carrera();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/Carrera/Carrera.php';
       
    }
    
    public function Crud(){
        $Carrera = new Carrera();
        //cambiar el parentesis por corchetes
			if(isset($_REQUEST ['idCarrera'])){
            $Carrera = $this->model->Obtener($_REQUEST ['idCarrera']);  
        }
        
        
        require_once 'view/header.php';
        require_once 'view/Carrera/Carrera-editar.php';
        
    }
	
	public function CrudAdd(){
        $Carrera = new Carrera();
        //cambiar el parentesis por corchetes
			if(isset($_REQUEST ['idCarrera'])){
            $Carrera = $this->model->Obtener($_REQUEST ['idCarrera']);
        }
        
        
        require_once 'view/header.php';
        require_once 'view/Carrera/Carrera-add.php';
        
    }
    
    public function Guardar(){
        $Carrera = new Carrera();
        //cambiar el parentesis por corchetes
			$Carrera->idCarrera= $_REQUEST['idCarrera'];
				
			$Carrera->nombre= $_REQUEST['nombre'];
				
			$Carrera->idFacultad= $_REQUEST['idFacultad'];
				
        $this->model->Registrar($Carrera);
        
        header('Location: indexCarrera.php');
    }

	public function Modificar(){
        $Carrera = new Carrera();
        //cambiar el parentesis por corchetes
			$Carrera->idCarrera= $_REQUEST['idCarrera'];
			$Carrera->nombre= $_REQUEST['nombre'];
			$Carrera->idFacultad= $_REQUEST['idFacultad'];
        
		$this->model->Actualizar($Carrera);
        
        header('Location: indexCarrera.php');
    }
    
    public function Eliminar(){
			$this->model->Eliminar($_REQUEST['idCarrera']);
        
        header('Location: indexCarrera.php');
    }
}
