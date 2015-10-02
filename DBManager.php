<?php
include "phpass/PasswordHash.php";
class DB_mysqli extends PasswordHash{

		/* Variables de conexión */
		private $db;
		private $server;
		private $user;
		private $pass;
		private $conx;
		private $t_hasher;

		/* Método Constructor: La primera función que se ejecuta */
		function __construct()
		{
			$this->server = "localhost";
			$this->user = "root";
			$this->pass = "Desarrollo1";
			$this->db = "pqrsdf";
			$this->t_hasher = new PasswordHash(8, FALSE);
			$this->connect();
		}

		/*Metodo de conexion con la base de datos*/
		function connect()
		{
			$this->conx = new mysqli ($this->server,$this->user,$this->pass);
			if($this->conx->connect_error)
				die("Conexion fallida");
			else
				$this->bd = mysqli_select_db($this->conx,"pqrsdf");
		}

		/*Metodo de insercion de datos en la DB*/
		function insert($table,$values)
		{
			$sql = "INSERT INTO {$table} VALUES ({$values})";
			$query = mysqli_query($this->conx, $sql);
			return $query;

		}

		/*Metodo para conocer el ultimo id*/
		function lastid($table)
		{
			$sql = "SELECT id FROM pqrsdf.{$table} ORDER BY id DESC LIMIT 1";
			$query = mysqli_query($this->conx,$sql);
			$row = mysqli_fetch_array($query);
			$id = $row[0];
			return $id;
		}

		/*Metodo para relacionar las tablas y mostrar los datos dependiendo de la id*/
		function linkupMensaje($conditions = null)
		{
			$sql = "SELECT p.nombre, p.apellido,  m.asunto, pq.descripcion, m.fecha_mensaje,
								p.correo,p.telefono, t.user, p.identificacion,  m.id, e.estado, dt.dependencia
									FROM mensaje m INNER JOIN persona p ON p.id = m.persona_id
										INNER JOIN pqrsdf pq ON pq.id = m.pqrsdf_id
											INNER JOIN tipouser t ON t.id = m.tipouser_id
												INNER JOIN estado e ON e.id = m.estado_id
													INNER JOIN destinatario dt ON dt.id = m.destinatario_id ";
			if (!is_null($conditions)):
				$sql .= " WHERE m.id = {$conditions}";

			endif;
			$sql .= " ORDER BY fecha_mensaje DESC";
			$query = mysqli_query($this->conx,$sql);
			return $query;
		}



		/*Metodo para realizar consultas a la base de datos*/
		function query($table, $cols, $conditions = null)
		{
			$sql = "SELECT {$cols} FROM {$table}";
			if (!is_null($conditions)) $sql .= " WHERE $conditions";

			$query = mysqli_query($this->conx, $sql);
			return $query;
		}

		/*Metodo de restriccion url*/
		function restriction ()
		{
		}

		/*Metodo para actualizar datos de la tabla seleccionada*/
		function updateState ($table, $cols, $conditions = null)
		{
			$sql = "UPDATE {$table} SET {$cols} ";
			if (!is_null($conditions)) $sql .= " WHERE $conditions";

			$query = mysqli_query($this->conx, $sql);
			echo $sql;
			return $query;

		}

		/*Metodo para verificar si el correo existe en la base de datos y tomar su id*/
		function verificationEmail($email)
		{
			$query = $this->query('persona','correo, id');
			while ($data = mysqli_fetch_object($query) ):
				if ($data->correo == $email):
					$id = $data->id;
					return $id;
				endif;
			endwhile;
		}

		/*Metodo para decrypt herencia de PasswordHash*/
		function verificationPassword($table,$cols,$crypt)
		{
			$query = $this->query($table,$cols);
			while ($result = mysqli_fetch_object($query) ):
				$lel = $result->{$cols};
				$check = $this->t_hasher->CheckPassword($lel,$crypt);
				if ($check == 1):
					$id = $result->{$cols};
					return $id;
				endif;
			endwhile;
		}

		/*Metodo destructor*/
		function __destruct()
		{
			mysqli_close($this->conx);
		}

}

$miConexion = new DB_mysqli();
