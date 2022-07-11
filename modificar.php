<?php 
 include('conexion.php');
 ?>

<!DOCTYPE HTML>

<?php
$ide=$_GET['id'];
		$query= "SELECT A.ALUMNOS_ID, A.ALUMNOS_NOMBRE, B.SEXO_ID FROM ALUMNOS A INNER JOIN SEXO B ON A.ALUMNOS_SEXO_ID=B.SEXO_ID WHERE ALUMNOS_ID=$id";
		$res=ibase_query($con, $query);
		if(!res)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		$row=ibase_fetch_object($res);


if (isset($_POST["btn1"]))
{
    $btn=$_POST["btn1"];
    if($btn == "Confirmar Modificación")
    {
		$nombre=$_POST['nombre'];
		$sexo=$_POST['sexo'];
		
		
		if($sexo==1)
		{
		$sex=1;
		}else{
		$sex=2;
		}
		
		
		
		$quer= "UPDATE ALUMNOS SET ALUMNOS_NOMBRE = '$nombre',ALUMNOS_SEXO_ID = '$sex' WHERE  ALUMNOS_ID = '$ide'";
		$re=ibase_query($con, $quer);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('Un Alumno ha sido Actualizado');</script>";
		?>
		<script type="text/javascript">
		window.location.href="index.php";
		</script>
		<?
		
    }

}
?>


<html>

<style>
	
	body{
		font-family:"Segoe UI";
		font-size:32px;
	}
	
	#tabla
	{
		font-size: 20px;
	}
	
	#modificar{
		background-color:#2CB1C3;
		border:0em;
		border-radius:0.7em;
		color:#FFF;
		cursor:pointer;
		font-family: "Arial";
		font-weight: bold;
		padding:0.5em;
		width:15em;
		
	}
</style>

<head>

<title>Actualizar datos del alumno</title>

</head>
	
<body>
<center>	

	<p>Modificar información del alumno</p>
	<hr width=50%>
	
	<form name="fe" action="" method="POST">
                <table id='tabla' cellpadding=7px>
                <tr>
                    <td align=center><b>Nombre:  </b></td>
					<td><label><input name="nombre" type="text" value="<?echo $row->ALUMNOS_NOMBRE?>" size=35 style="font-size:18px" autofocus/></label></td>
                </tr>
                <tr>
				
				<?
				if($row->SEXO_ID == 1)
				{
				?>
                    <td align=center><b>Sexo:  </b></td><td><label>Masculino<input type="radio" name="sexo" value="1" checked="checked" ></label>
					<label>Femenino<input type="radio" name="sexo" value="2" ></label></td>
				<?}else{?>
					
					<td align=center><b>Sexo:  </b>
					</td><td><label>Masculino<input type="radio" name="sexo" value="1" ></label>
					<label>Femenino<input type="radio" name="sexo" value="2" checked="checked" ></label></td>
					<?}?>
                </tr>
                
               
                </table>

  
	<input id='modificar' type="submit" name="btn1" value="Confirmar Modificación"/>
  

</form>

</center>	
</body>

</html>

