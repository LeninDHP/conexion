<?php
$conn = new mysqli ( $server , $username , $password , $db) ;


if($conn->connect_error)
	die ($conn->connect_error);
?>

<html>
<head>
	<title>Libros</title>
	<style type="text/css">
    </style>
    <link href="Css/Css.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="validacion.js"></script>
<body>


<form action = "insertar.php" method="post" onsubmit = "return validar(this)" style="background-color: #00FFCC">

<div id ="text" style="background-color: #FFEDED; color: ED7476"></div>
</br>

<div class="style2">INGRESAR EMPLEADO</div>
</br>
</br>
<div>
<div>
	<span class="style1">
	<label  for="nombre">Nombre: </label>
	</span>
	<input type="text" name="nombre" value="" id="nombre" class="style1">
    <br class="style1" />
    </br>
</div>
<div>
	<span class="style1">
	<label for="apellido">Apellido: </label>
	</span>
	<input type="text" name="apellido" value="" id="apellido" class="style1">
    <br class="style1" />
    </br>
</div>
<div>
	<span class="style1">
	<label for="fechadenacimiento">Fecha de Nacimiento:</label></span>
	<input type="text" name="fechadenacimiento" value="" id="fechadenacimiento" 
        class="style1">
    <br class="style1" />
    </br>
</div>
<div>
	<span class="style1">
	<label for="direccion">Direcci&oacute;n: </label>
	</span>
	<input type="text" name="direccion" value="" id="direccion" class="style1">
    <br class="style1" />
    </br>
</div>
<div>
	<span class="style1">
	<label for="telefono">Tel&eacute;fono: </label>
	</span>
	<input type="text" name="telefono" value="" id="telefono" class="style1">
    <br class="style1" />
    </br>
</div>
<div>
	<span class="style1">
	<label for="estado_civil">Estado Civil: </label>
	</span>
	<input type="text" name="estado_civil" value="" id="estado_civil" 
        class="style1">
    <br class="style1" />
    </br>
</div>
<div>
	<span class="style1">
	<label for="departamento">Departamento: </label>
	</span>
	<input type="text" name="departamento" value="" id="departamento" 
        class="style1">
        </br>
</div>
</br>
<div>
	<input type="submit" value="Ingresar" name="ingresar" 
        style="font-family: 'Arial Black'">
</div>
</br>


</form>


<?php
$query = 'SELECT * FROM empleado';

$result = $conn->query($query);
if(!$result)die($conn->error);

$num_rows = $result->num_rows;

?>

<?php
echo '<table>';
	echo '<tr>';
		echo '<th>Nombre</th>';
		echo '<th>Apellido</th>';
		echo '<th>Fecha de Nacimiento</th>';
		echo '<th>Direcci&oacute;n</th>';
		echo '<th>Tel&eacute;fono</th>';
		echo '<th>Estado Civil</th>';
		echo '<th>Departamento</th>';
		echo '</tr>';

		for ($i=0; $i <$num_rows ; ++$i) { 
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
		
	echo '<tr>';
	echo '<td>'.$row['nombre'].'</td>';
	echo '<td>'.$row['apellido'].'</td>';
	echo '<td>'.$row['fechadenacimiento'].'</td>';
	echo '<td>'.$row['direccion'].'</td>';
	echo '<td>'.$row['telefono'].'</td>';
	echo '<td>'.$row['estado_civil'].'</td>';
	echo '<td>'.$row['departamento'].'</td>';
	echo '<td> 
	  <form action ="borrar.php" method="post" >
	  <input type="submit" value="Eliminar" name="eliminar">
	  <input type="hidden" value="' . $row['id'] . '"  name="id">
	  </form></td>
	  <td>

	  <form action ="consulta.php" method="post" >
	  <input type="submit" value="Seleccionar" name="seleccionar">
	  <input type="hidden" value="' . $row['id'] . '"  name="id">
	  </form></td>';

	echo '</tr>';
}
	
echo '</table>';
$result->close();
$conn->close();
?>
</body>
</html>


