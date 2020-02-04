<?php
class Facultad
{
	private $pdo;

			public $idFacultad;				
			public $nombre;				


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

			$stm = $this->pdo->prepare("SELECT * FROM Facultad");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}



				
	public function Obtener($idFacultad)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Facultad WHERE idFacultad= ?");
			          

			$stm->execute(array($idFacultad));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Eliminar($idFacultad)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM Facultad WHERE idFacultad= ?");			          

			$stm->execute(array($idFacultad));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE Facultad SET 
						
						idFacultad=?

,						
						nombre=?

							WHERE idFacultad = ?";
				    

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
							$data->idFacultad
,							$data->nombre
						
							,$data->idFacultad
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Registrar(Facultad $data)
	{
		try 
		{
		$sql = "INSERT INTO Facultad (										idFacultad
,										nombre
)

		        VALUES (?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
						
							$data->idFacultad

,						
							$data->nombre

                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
