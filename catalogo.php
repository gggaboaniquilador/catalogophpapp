<!DOCTYPE html>
<html>
<head>
	<title>Catálogo de Productos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="estilos.css">
	<link rel="icon" type="image/png" href="images/biscuit.ico">
</head>
<body>
	<h2 align='center' class='Estilo1'>Catálogo de Productos</h2>
	<hr>
	<table class="tabla">  
 		<tr>
 			<th>Código</th>
 			<th>Descripción</th>
 			<th>Precio</th>
 			<th>Imagen Referencial</th> 			
 			<th>Escoger</th> 			
 		</tr>
 		<?php
 		$productos=array();
 		$punteroarchivo=fopen("productos.txt","r"); //Abre el archivo sólo lectura
 		while (!feof($punteroarchivo))
 		{
 			$cadena=fgets($punteroarchivo);
 			if(strlen($cadena)>1)
 				$productos[]=explode(",",$cadena); //Añade una fila al array
 		}
		fclose($punteroarchivo);
		print_r($productos); //Observar el array en consola, opción Red/Respuesta
		?>
		<form action="pedido.php" method="get" onsubmit="">
		<?php
		foreach ($productos as $clave => $valor) 
		{
			echo "<tr>";
			echo "<td>".$valor[0]."</td>";
			echo "<td><input type='text' name='descrip".$valor[0]."' id='descrip".$valor[0]."' size='30' readonly='true' value='".$valor[1]."'></td>";
			echo "<td><input type='text' name='precio".$valor[0]."' id='precio".$valor[0]."' size='5' readonly='true' value='".$valor[2]."'></td>";
			echo "<td><img src='images/".$valor[3]."' width=200 height=100 alt='".$valor[1]."'  title='".$valor[1]."'></td>";
			echo "<td><input type='checkbox' name='panes[]' value='".$valor[0]."'></td>";
			echo "</tr>";
		}
 		?>
			<tr>
				<td colspan="5" align="center">
					<p>
					<input type='submit' name='enviar' value='Enviar'>
					<input type='reset' name='limpiar' value='Limpiar'>
				</td>
			</tr>
 		</form>
 	</table>
</body>
</html>