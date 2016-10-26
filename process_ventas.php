<!DOCTYPE html>
<html lang="es">
    <!------------------------------------------------------------------------->
    <head>
        <meta name="author" content="Obed Mena Chuquimia">
        <meta name="pagina" content="index">
        <meta name="materia" content="@emergentes">
        <meta charset="utf-8"/>
        <title>process_ventas</title>
    </head>
    <!------------------------------------------------------------------------->
    <link rel="stylesheet" type="text/css" href="css/css1.css">
    <script>
        function toggle_visibility(id) {
            var e = document.getElementById(id);
            if (e.style.display == 'block')
                e.style.display = 'none';
            else
                e.style.display = 'block';
        }
    </script>
    <!------------------------------------------------------------------------->
    <body>

        <?php
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('location:login.php');
        }
        ?>

        <!--CONTENEDOR PRINCIPAL----------------------------------------------->
        <div id="container">
            <!--CONTENEDOR SUPERIOR-------------------------------------------->
            <div id="header">
                <table cellspacing="1" width="100%" border="0" cellpadding="20px">
                    <tr>
                    <table border="0" cellspacing="10px" width="100%" cellpadding="5px" style="size: 12px; font-family: 'Courier New', Courier, monospace; color: #FFF; font-size: 12px;">
                        <tr>
                            <td width="80%" align="center"> <font size="6px" >Sistema Web Tecnologias@Emergentes</font></td>
                            <th scope="col">Acceso: <?php echo $_SESSION['access']; ?> </th>
                            <th scope="col">Usuario: <?php echo $_SESSION['usuario']; ?> </th>
                            <th scope="col">
                                <?php
                                include_once("date1.php");
                                $Today = date('y:m:d', time());
                                ?>
                            </th>
                            <th scope="col" width="20px"><a href="salir.php">
                                    <input type="button" id="btnadd" value="Cerrar Sesión" align="middle" src=""/> </a>
                            </th>
                        </tr>
                    </table>
                    </tr>
                </table>
            </div><!--CONTENEDOR SUPERIOR-------------------------------------->

            <br><br><br><br><br><!--ESPACIOS REQUERIDOS------------------------>

            <!--MENU----------------------------------------------------------->
            <div id = "headnav"> 
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="1053" height="62">
                            <table width="669" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th width="10 %" height="62" scope="col"><a href="index.php">Inicio</a></th>
                                    <th width="10 %" scope="col"><a href="ventas.php">Ventas</a></th>
                                    <th width="10 %" scope="col"><a href="productos.php">Productos</a></th>
                                    <th width="15 %" scope="col"><a href="clientes.php">Clientes</a></th>
                                    <th width="10 %" scope="col"><a href="usuarios.php">Personal</a></th>
                                    <th width="15 %" scope="col"><a href="categorias.php">Categorias</a></th>
                                </tr>
                            </table>
                        </td>

                        <td width="20 %">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="left" style="color:#FFF">
                                        <?php
                                        date_default_timezone_set('America/Caracas');
                                        $hora = date("g:i:s A");
                                        echo "|HORA: " . $hora . "|";
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div><!--MENU----------------------------------------------------->

            <br><!--ESPACIOS REQUERIDOS---------------------------------------->

            <!--CONTENIDO------------------------------------------------------>
            <div id="bdcontainer">
                <!--BUSCADOR--------------------------------------------------->
                <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

                    <tr>
                        <td width="573">&nbsp;  </td>
                        <td width="304" align="right"><form action="result.php" method="get" ecntype="multipart/data-form">
                                <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Producto" /><input type="submit" id="btnsearch" value="Buscar" name="search" />
                            </form></td>
                    </tr>

                </table>
            </div><!--CONTENIDO------------------------------------------------>


            <!--PIE DE PAGINA-------------------------------------------------->
            <div id="footer">
                <table border="0" cellpadding="15px" align="center" style="size: 12px; font-family: 'Courier New', Courier, monospace; color: #FFF; font-size: 12px;">
                    <tr>
                        <td>
                            &copy; 2016 Todos los derechos reservados. @emergentes |  Diseñado por:<a href="https://www.obed.com">Obed Mena Chuquimia</a>
                        </td>
                    </tr>
                </table>
            </div><!--PIE DE PAGINA-------------------------------------------->


            <!----------------------------------------------------------------->
            <div id="popup-box2" class="popup-position1">
                <div id="popup-wrapper2">
                    <div id="popup-container2">
                        <div id="popup-head-color5">
                            <br>
                            <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;">Formulario de Transaccion</p>
                        </div>

                        <?php
                        include 'config.php';
                        $id = $_GET['id'];
                        $view = "SELECT * from productos where md5(idproducto) = '$id'";
                        $result = $db_link->query($view);
                        $row = $result->fetch_assoc();
                        if (isset($_POST['update'])) {
                            $ID = $_GET['id'];
                            $view1 = "SELECT cantidad from productos where md5(idproducto) = '$id'";
                            $result1 = $db_link->query($view);
                            $row2 = $result->fetch_assoc();
                            //$dates = $_POST['dates'];
                            ///$usuario = $_POST['usuario'];
                            //@$customers = $_POST['clientes'];
                            //$tproducto= $_POST['idproducto'];
                            //$quant = $_POST['cantidad'];
                            //@$ten = $tendered;
                            //@$change = $tendered - $total;
                            $dates = $_POST['dates'];
                            $idus = $_POST['idusuario'];
                            @$customers = $_POST['idcliente'];
                            $tidproducto= $_POST['idproducto'];
                            $quant = $_POST['cantidad'];
                            @$ten = $tendered;
                            $insert1 = "UPDATE productos set cantidad = cantidad - '$quant' where md5(idproducto) = '$ID'";
                            $insert = "INSERT INTO ventas(fecha,idusuario,idcliente,idproducto,cantidad,total) VALUES('$dates',$idus,@$customers,$tidproducto,'$quant','@$ten')" or die("error" . mysqli_errno($db_link));
                            $result = mysqli_query($db_link, $insert);
                            if ($db_link->query($insert1) == TRUE) {
                                echo "Actualizacion de registro correcto en productos & ventas";
                                header('location:ventas.php');
                            }
                            $db_link->close();
                        }
                        ?>

                        <br>

                        <form action="" method="POST">
                            <table border="0" align="center">  
                                <?php
                                if (isset($_POST['sub'])) {
                                    @$total = $_POST['total'];
                                    @$tendered = $_POST['cancelado'];// tendered cancelado
                                    @$quant = $_POST['cantidad'];
                                    @$profit = $_POST['ganancia'];

                                    @$profit = $profit;
                                    @$quant = $quant;
                                    @$ten = $tendered;
                                    @$change = $tendered - $total;
                                }
                                ?>

                                <tr>
                                    <td align="right"> Fecha Actual: </td>
                                    <td> <input type="text" name="dates" id="txtbox" value="<?php echo "  " . date("Y/m/d") ?>" readonly> </td>
                                    <td> <input  align="left"  type="text" id="txtbox" name="idusuario" value="
                                        <?php $conexion = mysqli_connect("localhost", "root", "", "bd_farmacia") or  
                                                    die("Problemas con la conexión");
                                            $idu=$_SESSION['usuario']; 
                                            $registros = mysqli_query($conexion, "select idusuario,usuario from usuarios where usuario like '$idu'" ) or
                                                    die("Problemas en el select:" . mysqli_error($conexion));
                                           
                                            if ($reg = mysqli_fetch_array($registros)) {
                                                echo "Id:".$reg['idusuario'];
                                            }  
                                            ?>" 
                                        hidden>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="right">Clientes:</td>
                                    <td>
                                        <select name="idcliente" id="txtbox" readonly >
                                            <?php
                                            $conexion = mysqli_connect("localhost", "root", "", "bd_farmacia") or
                                                    die("Problemas con la conexión");
                                            $registros = mysqli_query($conexion, "select idcliente,nombres from clientes") or
                                                    die("Problemas en el select:" . mysqli_error($conexion));
                                            while ($reg = mysqli_fetch_array($registros)) {
                                                echo "<option value=\"$reg[idcliente]\">$reg[nombres].$reg[idcliente]</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="right">Categoria:</td>
                                    <td><input type="text" id="txtbox" name="categoria" value="<?php echo $row['idcategoria']; ?>" readonly><br></td>
                                </tr>

                                <tr>
                                    <td align="right">Nombre Producto:</td>
                                    <td><input type="text" id="txtbox" name="idproducto" value="<?php echo $row['idproducto'].".".$row['descripcion'] ; ?>" readonly><br></td>
                                </tr>


                                <!-- Computation starts here -->
                                <form method="POST">
                                    <?php
                                    if (isset($_POST['calculate'])) {
                                    @$amnt = $_POST['precio'];//amount precio
                                    @$quant = $_POST['cantidad'];//quant cantidad
                                    @$profit = $_POST['ganancia'];//profit ganancia
                                    @$purchase = $_POST['costo'];//purchase costo
                                    @$quant = $quant;
                                    @$total = $amnt * $quant;//total monto total a pagar
                                    @$profit = $total - $quant * $purchase;
                                    }
                                    ?>

                                    <form method="post">
                                        <tr>
                                            <td align="right">Costo Unitario:</td>
                                            <td><input type="text" id="txtbox" name="costo" value="<?php echo $row['costo_unitario']; ?>" readonly><br></td>
                                        </tr>

                                        <tr>
                                            <td align="right">Precio Venta:</td>
                                            <td><input type="text" id="txtbox" name="precio" value="<?php echo $row['precio_unitario']; ?>" readonly><br></td>
                                        </tr>

                                        <tr>
                                            <td align="right">Cantidad:</td>
                                            <td><input type="text" id="txtbox" name="cantidad" value="<?php echo @$quant ?>" placeholder="Cantidad" required></td>
                                        </tr>

                                        <tr>
                                            <td align="right">Monto Total a Pagar:</td>
                                            <td><input type="text" id="txtbox" name="total" value="<?php echo @$total ?>" readonly></td>
                                            <td><input type="submit" name="calculate" value="Calcular" id="btncalc"></td>
                                        </tr>

                                        <tr>
                                            <td align="right">Ganancia:</td>
                                            <td><input type="text" id="txtbox" name="ganancia" value="<?php echo @$profit ?>" readonly><br></td>
                                        </tr>
                                    </form>

                                    <tr>
                                        <td align="right">Monto Cancelado:</td>
                                        <td><input type="text" id="txtbox" name="cancelado" value="<?php echo @$ten ?>"  placeholder="Monto Recibido"></td>
                                        <td><input type="submit" value="Calcular" name="sub" id="btncalc"></td>
                                    </tr>

                                    <tr>
                                        <td align="right">Devolver:</td>
                                        <td><input type="text" id="txtbox" name="devolver" value="<?php echo @$change ?>" readonly></td>
                                    </tr>
                                </form>

                                <!-- Computation ends here -->

                                <br>
                                <tr  align="center">
                                    <td>&nbsp;  </td>
                                    <td>
                                        <br>
                                        <input type="SUBMIT" name="update" id="btnnav" value="Agregar"></form>
                                        <a href="ventas.php"><input type="button" style="border:1px solid #900; background:#900; height:40px; width:105px; border-radius:3px; color:#FFF;" value="Cancelar"></a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

            <br>

            <tr>
                <td>
                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #030; color:#033;">

                        <tr>
                            <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #030; background: #030; color:#FFF;"> Seleccionar Productos </th>
                        </tr>

                        <tr height="30px">
                            <th style="border-bottom:1px solid #333;"> Id </th>
                            <th style="border-bottom:1px solid #333;"> Descripcion </th>
                            <th style="border-bottom:1px solid #333;"> Precio </th>
                            <th style="border-bottom:1px solid #333;"> Cantidad </th>
                            <th style="border-bottom:1px solid #333;"> Stock </th>
                            <th style="border-bottom:1px solid #333;"> Categoria </th>
                            <th style="border-bottom:1px solid #333;"> Hacer Pedido </th>
                        </tr>

                        <!-- Search goes here! -->

                        <?php
                        require('config.php');
                        $query = "SELECT * FROM productos";
                        $result = mysqli_query($db_link, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>

                            <tr align="center" style="height:35px">
                                <td style="border-bottom:1px solid #333;"> <?php echo $row['idproducto']; ?> </td>
                                <td style="border-bottom:1px solid #333;"> <?php echo $row['descripcion']; ?> </td>
                                <td style="border-bottom:1px solid #333;">$ <?php echo $row['precio_unitario']; ?> </td>
                                <td style="border-bottom:1px solid #333;"> <?php echo $row['cantidad']; ?> pcs. </td>
                                <td style="border-bottom:1px solid #333;"> <?php echo $row['stock_minimo']; ?> pcs. </td>
                                <td style="border-bottom:1px solid #333;"> <?php echo $row['idcategoria']; ?> pcs. </td>
                                <td style="border-bottom:1px solid #333;">
                                    <a href="process_ventas.php?id=<?php echo md5($row['id']); ?>"><input type="button" value="Pedir" style="width:90px; height:30px; color:#FFF; background: #930; border:1px solid #930; border-radius:3px;"></a>
                                </td>
                            </tr>
                        <?php }
                        ?>

                    </table>

                </td>
            </tr>
        </table>

    </div>

</body>
<!------------------------------------------------------------------------->
</html>
