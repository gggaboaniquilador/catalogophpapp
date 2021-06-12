<?php
function ObtenerChequeados($arreglo)
{
	$chequeados="";
	if (array_key_exists('panes',$arreglo))
	{
		$chequeados=$arreglo['panes'][0].",".$arreglo['descrip'.$arreglo['panes'][0]].",".$arreglo['precio'.$arreglo['panes'][0]];
		for ($i=1;$i<count($arreglo['panes']);$i++)			
			$chequeados=$chequeados.";".$arreglo['panes'][$i].",".$arreglo['descrip'.$arreglo['panes'][$i]].",".$arreglo['precio'.$arreglo['panes'][$i]];
	}
	return $chequeados;
}
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Verificación de Pedido</title>
	<link rel="stylesheet" href="estilos.css">
	<link rel="icon" type="image/png" href="images/biscuit.ico">
	</head>

	<body>
		<h2 align='center' class='Estilo1'>Datos del Pedido</h2>
		<hr>
		<?php 
			$cadenapedido=ObtenerChequeados($_GET);
			$pedido=explode(";",$cadenapedido);
		?>
		<table width="50%" align="center" class="tabla">
			<tr>
				<th colspan=3>Productos</th>				
			</tr>
			<?php
			foreach ($pedido as $key => $value)
			{			
				echo "<tr>";
				echo "<td colspan=3>".$value."</td>";			
				echo "</tr>";
			}
		?>
		</table>
	</body>
</html>