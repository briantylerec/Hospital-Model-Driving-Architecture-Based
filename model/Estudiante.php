<?php
class Estudiante
{
	private $pdo;

			public $idEstudiante;				
			public $nombre;				
			public $apellido;				
			public $email;				
			public $idCarrera;				
			public $esBecado;				
			public $edad;				
			public $fechanacimiento;				


	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM Estudiante");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ListarCarrera()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM Carrera");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


				
	public function Obtener($idEstudiante)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Estudiante WHERE idEstudiante= ?");
			          

			$stm->execute(array($idEstudiante));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Eliminar($idEstudiante)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM Estudiante WHERE idEstudiante= ?");			          

			$stm->execute(array($idEstudiante));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE Estudiante SET 
						
						idEstudiante=?

,						
						nombre=?

,						
						apellido=?

,						
						email=?

,						
						idCarrera=?

,						
						esBecado=?

,						
						edad=?

,						
						fechanacimiento=?

							WHERE idEstudiante = ?";
				    

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
							$data->idEstudiante
,							$data->nombre
,							$data->apellido
,							$data->email
,							$data->idCarrera
,							$data->esBecado
,							$data->edad
,							$data->fechanacimiento
						
							,$data->idEstudiante
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Registrar(Estudiante $data)
	{
		try 
		{
		$sql = "INSERT INTO Estudiante (										idEstudiante
,										nombre
,										apellido
,										email
,										idCarrera
,										esBecado
,										edad
,										fechanacimiento
)

		        VALUES (?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
						
							$data->idEstudiante

,						
							$data->nombre

,						
							$data->apellido

,						
							$data->email

,						
							$data->idCarrera

,						
							$data->esBecado

,						
							$data->edad

,						
							$data->fechanacimiento

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
