<?php
class Carrera
{
	private $pdo;

			public $idCarrera;				
			public $nombre;				
			public $idFacultad;				


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

			$stm = $this->pdo->prepare("SELECT * FROM Carrera");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ListarFacultad()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM Facultad");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


				
	public function Obtener($idCarrera)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Carrera WHERE idCarrera= ?");
			          

			$stm->execute(array($idCarrera));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Eliminar($idCarrera)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM Carrera WHERE idCarrera= ?");			          

			$stm->execute(array($idCarrera));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE Carrera SET 
						
						idCarrera=?

,						
						nombre=?

,						
						idFacultad=?

							WHERE idCarrera = ?";
				    

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
							$data->idCarrera
,							$data->nombre
,							$data->idFacultad
						
							,$data->idCarrera
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Registrar(Carrera $data)
	{
		try 
		{
		$sql = "INSERT INTO Carrera (										idCarrera
,										nombre
,										idFacultad
)

		        VALUES (?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
						
							$data->idCarrera

,						
							$data->nombre

,						
							$data->idFacultad

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
