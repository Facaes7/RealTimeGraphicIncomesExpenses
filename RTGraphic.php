<!DOCTIPE html>

<html>



<head><meta charset="windows-1252">



<title>Tablas</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	

<script type="text/javascript" src="buscar.js"></script>
<script src="js/chart.js"></script>

<script src="js/setup.js"></script>
<script src="js/config.js"></script>

<style>

ul {

  list-style-type: none;

  margin: 0;

  padding: 0;

  overflow: hidden;

  background-color: #333;

}



li {

  float: left;

}



li a {

  display: block;

  color: white;

  text-align: center;

  padding: 14px 16px;

  text-decoration: none;

}



li a:hover:not(.active) {

  background-color: #111;

}



.active {

  background-color: #4CAF50;

}

</style>

</head>



<body>

	<h1></h1>

	<br>

	<ul>

		<li><a class="active" href="index.html">Inicio</a></li>

		<li><a href="egresosm.html">Egresos</a></li>

		<li><a href="ingresosm.html">Ingresos</a></li>

		<li><a href="inventario.php">Inventario</a></li>

	</ul>

	<br>
	<br>
	<label>Total Egresos : <p id="pvalort" > .... </p> 
	<input id="ivalort" value="valor!" readonly> </label>
	<label>   Total jornales:<input id="ivalort2" value="valor!" readonly>  </label>
	<label>   Total Insumos:<input id="ivalort3" value="valor!" readonly>  </label>
	<label>   Total Maquinaria:<input id="ivalort4" value="valor!" readonly>  </label>
	<label>   Total Transporte:<input id="ivalort5" value="valor!" readonly>  </label>
	<label>   Total Operacion:<input id="ivalort6" value="valor!" readonly>  </label>
	<label>      Total Ingresos:<input id="ivalort7" value="valor!" readonly>  </label>
	<br>
	<canvas id="myCanvas" width="800" height="180" style="border:1px solid #000000;">
	</canvas>
	
	<br>

	
<?php



$host="......";

$usuario="......";

$password="..........";

$db="...............";

$port="....................";

$casob=$_POST['casob'];





$enlace = mysqli_connect($host,$usuario,$password,$db,$port);



if (!mysqli_set_charset($enlace, "utf8")) {

		printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($enlace));

		exit();

		}



$buscar = "SELECT valortotal FROM egresos";
$buscar2 = "SELECT valortotal FROM egresos WHERE caso='2'";
$buscar3 = "SELECT valortotal FROM egresos WHERE caso='3'"; 
$buscar4 = "SELECT valortotal FROM egresos WHERE caso='4'";
$buscar5 = "SELECT valortotal FROM egresos WHERE caso='5'";
$buscar6 = "SELECT valortotal FROM egresos WHERE caso='6'";
$buscar7 = "SELECT valortotal FROM ingresos ";

if (mysqli_connect_errno()) {

    printf("Falló la conexión: %s\n", mysqli_connect_error());

    exit();

}



$busqueda=mysqli_query ($enlace, $buscar , MYSQLI_USE_RESULT);
$valortotalfecha=0;

while ($array = mysqli_fetch_array($busqueda , MYSQLI_NUM))
{
	$valortotalfecha=$array[0]+$valortotalfecha;
}



$busqueda=mysqli_query ($enlace, $buscar2 , MYSQLI_USE_RESULT);
$valortotalfecha2=0;

while ($array = mysqli_fetch_array($busqueda , MYSQLI_NUM))
{
	$valortotalfecha2=$array[0]+$valortotalfecha2;
}


$busqueda=mysqli_query ($enlace, $buscar3 , MYSQLI_USE_RESULT);

$valortotalfecha3=0;

while ($array = mysqli_fetch_array($busqueda , MYSQLI_NUM))

{

	$valortotalfecha3=$array[0]+$valortotalfecha3;

}

$busqueda=mysqli_query ($enlace, $buscar4 , MYSQLI_USE_RESULT);

$valortotalfecha4=0;

while ($array = mysqli_fetch_array($busqueda , MYSQLI_NUM))

{

	$valortotalfecha4=$array[0]+$valortotalfecha4;

}

$busqueda=mysqli_query ($enlace, $buscar5 , MYSQLI_USE_RESULT);

$valortotalfecha5=0;

while ($array = mysqli_fetch_array($busqueda , MYSQLI_NUM))
{
	$valortotalfecha5=$array[0]+$valortotalfecha5;
}


$busqueda=mysqli_query ($enlace, $buscar6 , MYSQLI_USE_RESULT);
$valortotalfecha6=0;
while ($array = mysqli_fetch_array($busqueda , MYSQLI_NUM))
{
	$valortotalfecha6=$array[0]+$valortotalfecha6;
}


$busqueda=mysqli_query ($enlace, $buscar7 , MYSQLI_USE_RESULT);
$valortotalfecha7=0;
while ($array = mysqli_fetch_array($busqueda , MYSQLI_NUM))
{
	$valortotalfecha7=$array[0]+$valortotalfecha7;
}


print("Valor Total Egresos : ");

print_r($valortotalfecha);

mysqli_close($enlace);
?>
<br>
<br>
<label><h3>Utilidad Bruta (Ingresos - Egresos) : </h3><p id="pUtBru" value="valor!" readonly style="font-size:250%"> </p>  </label>

<script type="text/javascript" >
	/*Este código permite ver en un gráfico, los gastos de una empresa agrícola y sus ingresos, permitiendo que en tiempo real se vayan analizando los datos para ver qué tanto se ha gastado, con qué se cuenta y lo que se ha gastado*/
	var pvalort=document.getElementById("pvalort"); 
	var pUtBru=document.getElementById("pUtBru"); 
	var ivalort=document.getElementById("ivalort");
	ivalort.value="<?php echo $valortotalfecha; ?>";
	var ivalort2=document.getElementById("ivalort2");
	ivalort2.value="<?php echo $valortotalfecha2; ?>";
	var ivalort3=document.getElementById("ivalort3");
	ivalort3.value="<?php echo $valortotalfecha3; ?>";
	var ivalort4=document.getElementById("ivalort4");
	ivalort4.value="<?php echo $valortotalfecha4; ?>";
	var ivalort5=document.getElementById("ivalort5");
	ivalort5.value="<?php echo $valortotalfecha5; ?>";
	var ivalort6=document.getElementById("ivalort6");
	ivalort6.value="<?php echo $valortotalfecha6; ?>";
	var ivalort7=document.getElementById("ivalort7");
	ivalort7.value="<?php echo $valortotalfecha7; ?>";
	
	var totalegresos=parseFloat(ivalort2.value)+parseFloat(ivalort3.value)+parseFloat(ivalort4.value)+parseFloat(ivalort5.value)+parseFloat(ivalort6.value);
	pvalort.innerHTML=totalegresos;
  
	var por2=parseInt(ivalort2.value)*100/totalegresos;
	var por3=parseInt(ivalort3.value)*100/totalegresos;
	var por4=parseInt(ivalort4.value)*100/totalegresos;
	var por5=parseInt(ivalort5.value)*100/totalegresos;
	var por6=parseInt(ivalort6.value)*100/totalegresos;
	var por7=parseInt(ivalort7.value)*100/totalegresos;
	var utBruta=((parseFloat(ivalort7.value))-totalegresos);
	pUtBru.style.color="green";
	if(utBruta<0){
		pUtBru.style.color="red";
	}
	pUtBru.innerHTML=utBruta;
	/*El radio de la circunferencia aumenta cuando aumenta el porcentaje pero teniendo encuenta el tamaño de los egresos totales, para que el gráfico no siga creciendo de forma incontrolable.*/
	/*The radius of the circumference increases when the percentage increases but taking into account the size of the total expenses, so that the graph does not continue to grow uncontrollably.*/
  var c = document.getElementById("myCanvas");
	var ctx = c.getContext("2d");
	ctx.beginPath();
	ctx.arc(50, 80, Math.sqrt((6362*por2/100)/Math.PI), 0, 2 * Math.PI);
	ctx.stroke();
	ctx.font = "14px Comic Sans MS";
	ctx.fillStyle = "red";
	ctx.textAlign = "center";
	ctx.fillText("Jornales", 50, 175);
	ctx.beginPath();
	ctx.arc(150, 80, Math.sqrt((6362*por3/100)/Math.PI), 0, 2 * Math.PI);
	ctx.stroke();
	ctx.fillText("Insumos", 150, 175);
	ctx.beginPath();
	ctx.arc(250, 80, Math.sqrt((6362*por4/100)/Math.PI), 0, 2 * Math.PI);
	ctx.stroke();
	ctx.fillText("Maquinaria", 250, 175);
	ctx.beginPath();
	ctx.arc(350, 80, Math.sqrt((6362*por5/100)/Math.PI), 0, 2 * Math.PI);
	ctx.stroke();
	ctx.fillText("Transporte", 350, 175);
	ctx.beginPath();
	ctx.arc(450, 80, Math.sqrt((6362*por6/100)/Math.PI), 0, 2 * Math.PI);
	ctx.stroke();
	ctx.fillText("Operacion", 450, 175);
	ctx.beginPath();
	ctx.arc(550, 80, 45, 0, 2 * Math.PI);
	ctx.stroke();
	ctx.font = "20px Comic Sans MS";
	ctx.fillText("Egresos T", 550, 175);
	ctx.beginPath();
	ctx.arc(700, 80, Math.sqrt((6362*por7/100)/Math.PI), 0, 2 * Math.PI);
	ctx.stroke();
	ctx.fillStyle = "green";
	ctx.fillText("Ingresos", 700, 175);
	
</script>	

	<br>

	<br>
	
	<div>
		<button class="btn" type="button" onclick="graficos()">Ver gráfico</button>
		<canvas id="grafica2"></canvas>
		
	</div>
	
	
	
	<br>

	<br>

	<a href="index.html" >Inicio</a>
<br>

	<br>
	
<footer>
  <p>Finca la Maria<br>
  <a href="mailto:fabiancamilo7@outlook.es">fabiancamilo7@outlook.es</a></p>
</footer>	
	

</body>

</html>
