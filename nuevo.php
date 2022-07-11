<!DOCTYPE>

<?
include('conexion.php');

if (isset($_POST["btn1"]))
{
    $btn=$_POST["btn1"];
    if($btn == "Confirmar nuevo registro")
    {
		$nombre=$_POST['nombre'];
		$sexo=$_POST['sexo'];
	
		
		if($sexo==1)
		{
		$sex=1;
		}else{
		$sex=2;
		}
		
		
		
		$quer= "INSERT INTO ALUMNOS(ALUMNOS_NOMBRE,ALUMNOS_SEXO_ID) VALUES('$nombre','$sex')";
		$re=ibase_query($con, $quer);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('Un Alumno ha sido Almacenado en la Base de Datos');</script>";
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
	
	#crear{
		background-color:#2CB1C3;
		border:0em;
		border-radius:0.7em;
		color:#FFF;
		cursor:pointer;
		font-family: "Arial";
		font-weight: bold;
		padding:0.5em;
		width:20em;
		
	}
</style>

<head>
	<title>Nuevo alumno</title>
</head>

<body>
<center>
	<p>Registrar nuevo alumno</p>
	<hr width=50%>
	
	<form name="fe" action="" method="POST">
                <table id='tabla' cellpadding=7>
                <tr>
                    <td align="center"><b>Nombre:  </b></td><td><label><input name="nombre" type="text" size=35 style="font-size:18px" required autofocus/></label></td>
                </tr>
                <tr>
				
                <td align="center"><b>Sexo: </b></td><td><label>Masculino<input type="radio" name="sexo" value="1"></label>
				<label>Femenino<input type="radio" name="sexo" value="2" ></label></td>
				</tr>
                
               
                </table>

    <input id='crear' type="submit" name="btn1" value="Confirmar nuevo registro"/>
  

</form>

</center>
</body>

</html>

