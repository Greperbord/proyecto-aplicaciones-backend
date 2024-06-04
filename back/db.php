<?php

function Conectardb()
{
    // Datos de conexión a la base de datos
    $servername = "localhost:8889"; // Cambia esto si tu base de datos está en un servidor diferente
    $username = "root";
    $password = "root";
    $dbname = "renta_carros";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Comprobar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    return $conn;
}

function Closedb()
{
    $conn = Conectardb();
    if ($conn->connect_error) {
        die("Error al cerrar la conexión: " . mysqli_error($conn));
    } else {
        mysqli_close($conn);
    }
}

// $idcliente = $_SESSION["idcliente"];

if(isset($_POST['id'])) {
 $id = $_POST['id'];
 $id_cliente = $_POST['id_cliente'];
 $id_auto = $_POST['id_auto'];
 $fecha_inicio = $_POST['fecha_inicio'];
 $fecha_fin = $_POST['fecha_fin'];
 $recoleccion = $_POST['recoleccion'];
 $devolucion = $_POST['devolucion'];

}
 $conn = Conectardb();
 
  switch ($_POST['Modulo']) {
   case "Guardar":
		$query = "SELECT * FROM reservas WHERE id = " . $id;
		$result = mysqli_query($conn, $query);
		$num_rows = $result->num_rows;

		if ($num_rows == 0) {
		    // Consulta para insertar un nuevo instructor
		    $sql = "INSERT INTO reservas (id, id_cliente, id_auto, fecha_inicio, fecha_fin, recoleccion, devolucion) VALUES (?, ?, ?, ?, ?, ?, ?)";
		    $stmt = $conn->prepare($sql);
		    $stmt->bind_param("iiissss", $id, $id_cliente, $id_auto, $fecha_inicio, $fecha_fin, $recoleccion, $devolucion);

  		// Ejecutar la consulta preparada
		if ($stmt->execute()) {
		    echo json_encode( "Instructor agregado correctamente");
		} else{
			 echo json_encode( "error al agregar el instructor". mysqli_error($conn));
		}


		// Cerrar la consulta preparada
		$stmt->close();
		} else{
			  echo json_encode( "El id del instructor ya existe en la base de datos por lo tanto no se agrego");
		}

		
   break;
  case "Editar":
		$query = "SELECT * FROM reservas WHERE id = " . $id;
		$result = mysqli_query($conn, $query);
		$num_rows = $result->num_rows;

		if ($num_rows >= 1) {
		    // Consulta para actualizar un instructor existente
		    $sql = "UPDATE clientes SET id = ?, id_cliente = ?, id_auto = ?, fecha_inicio = ?, fecha_fin = ?, recoleccion = ?, devolucion = ? WHERE id = ?";
		    $stmt = $conn->prepare($sql);
		    $stmt->bind_param("iiissss", $id, $id_cliente, $id_auto, $fecha_inicio, $fecha_fin, $recoleccion, $devolucion);

         // Ejecutar la consulta preparada
		  if ($stmt->execute()) {
		   echo json_encode( "Instructor actualizado correctamente");
		  } else{
		  	echo json_encode( "error al actulizar el instructor". mysqli_error($conn));
		  }

	    // Cerrar la consulta preparada
		  $stmt->close();
		}


   break;   
   case "Consultar":
		// Consulta SQL para seleccionar todos los instructores
		$query = "SELECT * FROM reservas";
		$result = mysqli_query($conn, $query);

		// Verificar si la consulta fue exitosa
		if ($result) {
		    // Inicializar un array para almacenar los resultados
		    $reservas = array();

		    // Recorrer los resultados y almacenarlos en el array
		    while ($row = mysqli_fetch_assoc($result)) {
		        $reservas[] = $row;
		    }

		    // Liberar el resultado
		    mysqli_free_result($result);
		    // Devolver los resultados como JSON
		    echo json_encode($reservas);
		} else {
		    // Si la consulta falla, mostrar un mensaje de error
		    echo json_encode('Error al ejecutar la consulta: ' . mysqli_error($conn));
		}
   break;
   case "autos":
    // Consulta SQL para seleccionar todos los instructores
    $query = "SELECT * FROM autos";
    $result = mysqli_query($conn, $query);

    // Verificar si la consulta fue exitosa
    if ($result) {
        // Inicializar un array para almacenar los resultados
        $autos = array();

        // Recorrer los resultados y almacenarlos en el array
        while ($row = mysqli_fetch_assoc($result)) {
            $autos[] = $row;
        }

        // Liberar el resultado
        mysqli_free_result($result);
        // Devolver los resultados como JSON
        echo json_encode($autos);
    } else {
        // Si la consulta falla, mostrar un mensaje de error
        echo json_encode('Error al ejecutar la consulta: ' . mysqli_error($conn));
    }
break;
   case "Eliminar":
		// Consulta SQL para eliminar el registro
      $query = "DELETE FROM reservas WHERE id = " . $id;

      // Ejecutar la consulta
       $result = mysqli_query($conn, $query);

      // Verificar si la consulta fue exitosa
      if ($result) {
        // Si la consulta fue exitosa, devolver un mensaje de éxito
        echo json_encode( 'El registro se eliminó satisfactoriamente.');
      } else {
        // Si la consulta falla, devolver un mensaje de error
        echo json_encode( 'Error al eliminar el registro: ' . mysqli_error($conn));
      }
   break;   
 }
// Cerrar la conexión a la base de datos
Closedb();

 
?>