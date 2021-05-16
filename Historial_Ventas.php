<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Historial de ventas</title>
</head>
<body>

<?php include_once("cabecera_Inicio.html");
include_once("menu.html");

session_start();
include_once("modelo\conexion.php");

$in_date='';
$end_date='';
$wheree="";

if (isset($_REQUEST['in_date']) || isset($_REQUEST['end_date']) ) {

  if ($_REQUEST['in_date'] == '' || $_REQUEST['end_date'] == '' ) {
    header("location: Historial_Ventas.php");
  }
}

if (!empty($_REQUEST['in_date']) && !empty($_REQUEST['in_date'])) {
  $in_date= $_REQUEST['in_date'];
  $end_date= $_REQUEST['end_date'];

  if($in_date> $end_date){
    header("buscar_ventas.php");
  }else if($in_date == $end_date){
    $wheree="fecha LIKE '$in_date'";
    $buscar="in_date=$in_date&end_date=$end_date";
  }else {
    $in_d=$in_date;
    $end_d=$end_date;
    $wheree="fecha BETWEEN '$in_d' AND '$end_d'";
    $buscar="in_date=$in_date&end_date=$end_date";
  }
}
?>

<section class="inicio">
<center><h1> Historial de ventas </h1></center><br><br>

<form action="Historial_Ventas.php" method="get">
<label>De:</label>
<input type="date" name="in_date" id="in_date" value="<?php echo $in_date ?>" required>
<label>A</label>
<input type="date" name="end_date" id="end_date" value="<?php echo $end_date ?>"required>
<input type="submit" value="Buscar"/></td>
</form> <br>

<table border="1" style="width: 100%">
  <tr>
    <td><strong>Numero Mesa</strong></td>
    <td><strong>Numero Pedido</strong></td>
    <td><strong>Costo del pedido</strong></td>
    <td><strong>Forma de pago</strong></td>
    <td><strong>Fecha</strong></td>
  </tr>

<?php
$strsql = "SELECT * from historial WHERE $wheree";

  $rs= mysqli_query($conection,$strsql) or die(mysql_error());
  $row =mysqli_fetch_assoc($rs);
  $total_rows = mysqli_num_rows($rs);
?>

          <?php
            if($total_rows > 0) {
              do{
                 ?>
             <tr>
             <td> <?php printf($row["num_mesa"]); ?> </td>

             <td> <?php printf($row["id_orden"]); ?> </td>
             <td> <?php printf($row["total_orden"]); ?> </td>
             <td> <?php printf($row["forma_pago"]); ?> </td>
            <td> <?php printf($row["fecha"]); ?>   </td>
                 </tr>
          <?php	}while ($row = mysqli_fetch_assoc($rs) );
                 mysqli_free_result($rs);
          }else{
          ?>
           <tr>
             <td colspan="5">No data faund.</td>
           </tr>
         <?php } ?>
		 </table>
    </section>

<?php
include_once("pie.html");
?>
</body>
</html>
