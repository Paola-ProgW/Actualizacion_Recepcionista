<?php
  include_once("cabecera_Inicio.html");
  include_once("menu.html");
?>
    <section class="inicio">

    <table style="width: 100%">
      <tr>
      <td width="50%" ><h1> Generar ticket </h1></td><br>
      <td width="50%" align="center"><h1> Artea </h1></td>
      </tr>

      <form action="" method="post">
            <tr>
               <td><br><input type="text" name="NumPedido" placeholder="Numero de Pedido"> <br/> </td>
            </tr>
            <tr>
                <td>	<input style="margin-top: 30px" type="submit" value="Genarar"/> <input style="margin-left: 65px" type="submit" value="Imprimir"/> </td>
            </tr>
      </form>
    </table>

    </section>
<?php
include_once("pie.html");
?>
