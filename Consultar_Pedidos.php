<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Consular pedidos</title>
</head>
<body>


<?php
  include_once("cabecera_Inicio.html");
  include_once("menu.html");

  session_start();
  include_once("modelo\conexion.php");


  $Query = "select * from orden";
  $Result =  $conection->query( $Query );

  $numeroRegistros=$Result->num_rows;
  if($numeroRegistros>0)
     {

?>
    <section class="inicio">

    <table style="width: 100%">
      <tr>
      <td width="50%" ><h1> Consultar Pedidos </h1><br></td>
      <td width="50%" align="center"><h1> Artea </h1><br></td>
      </tr>
<td>
            <table style="width: 50%" border="1px">
                <tr>
                <td width="15%"><strong>Numero Pedido</strong></td>
                <td width="15%"><strong>Fecha</strong></td>
    </tr>
    <?php
        while($row =$Result->fetch_array()) {
          $orden=$row["id_orden"];
           ?>
      <tr>
        <form action="" method="get">
          <td> <a  href="Consultar_Pedidos.php ? Orden=<?php print($orden); ?>"> <?php print($orden); ?> </a></td>

             <td> <?php printf($row["fecha"]); ?> </td>
            </tr>
            </td>
        </form>

    <?php	}
    }
    ?>

  <?php

  if (isset($_GET['Orden']))
  {
    $orden=$_GET['Orden'];

    $Query1 = "SELECT * FROM condetalle WHERE id_orden='".$orden."'";
    $Result1 =  $conection->query( $Query1 );

    $numeroRegistros1=$Result1->num_rows;
    if($numeroRegistros1>0)
       {
    ?>
    </table>
    <td>
            <center>  <table style="width: 60%" border="1px">
                  <tr>
                  <td width="15%"><strong>Nombre del producto</strong></td>
                  <td width="15%"><strong>Precio del producto</strong></td>
      </tr>
      <?php
          while($row1 =$Result1->fetch_array()) {
                $orden=$row1["id_orden"];
             ?>
        <tr>
         <td> <?php print($row1["nombre_producto"]); ?> </td>
         <td> <?php printf($row1["precio_producto"]); ?> </td>
        </tr>
        </td>
      <?php	}
      }
      }
      ?>
  </table> </center>
  </table>

  </section>

<?php
include_once("pie.html");
?>

</body>
</html>
