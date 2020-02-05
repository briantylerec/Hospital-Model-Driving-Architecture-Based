<?php
require_once 'model/Estudiante.php';

class EstudianteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Estudiante();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/Estudiante/Estudiante.php';
       
    }
    
    public function Crud(){
        $Estudiante = new Estudiante();
        //cambiar el parentesis por corchetes
			if(isset($_REQUEST ['idEstudiante'])){
            $Estudiante = $this->model->Obtener($_REQUEST ['idEstudiante']);  
        }
        
        
        require_once 'view/header.php';
        require_once 'view/Estudiante/Estudiante-editar.php';
        
    }
	
	public function CrudAdd(){
        $Estudiante = new Estudiante();
        //cambiar el parentesis por corchetes
			if(isset($_REQUEST ['idEstudiante'])){
            $Estudiante = $this->model->Obtener($_REQUEST ['idEstudiante']);
        }
        
        
        require_once 'view/header.php';
        require_once 'view/Estudiante/Estudiante-add.php';
        
    }
    
    public function Guardar(){
        $Estudiante = new Estudiante();
        //cambiar el parentesis por corchetes
			$Estudiante->idEstudiante= $_REQUEST['idEstudiante'];
				
			$Estudiante->nombre= $_REQUEST['nombre'];
				
			$Estudiante->apellido= $_REQUEST['apellido'];
				
			$Estudiante->email= $_REQUEST['email'];
				
			$Estudiante->idCarrera= $_REQUEST['idCarrera'];
				
			$Estudiante->esBecado= $_REQUEST['esBecado'];
				
			$Estudiante->edad= $_REQUEST['edad'];
				
			$Estudiante->fechanacimiento= $_REQUEST['fechanacimiento'];
				
        $this->model->Registrar($Estudiante);
        
        header('Location: indexEstudiante.php');
    }

	public function Modificar(){
        $Estudiante = new Estudiante();
        //cambiar el parentesis por corchetes
			$Estudiante->idEstudiante= $_REQUEST['idEstudiante'];
			$Estudiante->nombre= $_REQUEST['nombre'];
			$Estudiante->apellido= $_REQUEST['apellido'];
			$Estudiante->email= $_REQUEST['email'];
			$Estudiante->idCarrera= $_REQUEST['idCarrera'];
			$Estudiante->esBecado= $_REQUEST['esBecado'];
			$Estudiante->edad= $_REQUEST['edad'];
			$Estudiante->fechanacimiento= $_REQUEST['fechanacimiento'];
        
		$this->model->Actualizar($Estudiante);
        
        header('Location: indexEstudiante.php');
    }
    
    public function Eliminar(){
			$this->model->Eliminar($_REQUEST['idEstudiante']);
        
        header('Location: indexEstudiante.php');
    }
}
