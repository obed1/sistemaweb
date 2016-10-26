<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="author" content="Obed Mena Chuquimia">
        <meta name="pagina" content="index">
        <meta name="materia" content="@emergentes">
        <meta charset="utf-8"/>
        <title>result_clientes</title>
    </head>

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

    <body>

        <?php
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('location:login.php');
        }
        ?>

        <div id="container">
            <div id="header">
                <table cellspacing="0" width="100%" border="0" cellpadding="20px">
                    <tr>
                        <td width="56%">
                            <table width="41%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="80%" align="center"> <font size="12px" >Sistema Web @Emergentes</font></td>
                                </tr>
                            </table></td>
                        <td style="font-size:14px;">
                            <table width="93%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th scope="col">Bienvenido: <?php echo $_SESSION['access']; ?></th>
                                    <th scope="col"><?php
                                        include_once("date1.php"); //$Today = date('y:m:d',time());
                                        //$new = date('l, F d, Y', strtotime($Today));
                                        //echo $new;
                                        ?></th>
                                    <th scope="col" width="20px"><a href="salir.php">
                                            <input type="button" id="btnadd" value="Cerrar Sesión" align="middle" />
                                        </a></th>
                                </tr>
                            </table></td>
                    </tr>

                </table>
            </div>

            <br><br><br><br><br>
            <!-- Footer -->
            <div id = "headnav"> 
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>

                        <td width="669" height="62">
                            <table width="669" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th width="90" height="56" scope="col"><a href="index.php">Tablero</a></th>
                                    <th width="50" scope="col"><a href="ventas.php">Ventas</a></th>
                                    <th width="80" scope="col"><a href="productos.php">Productos</a></th>
                                    <th width="90" scope="col"><a href="clientes.php">Clientes</a></th>
                                    <th width="90" scope="col"><a href="usuarios.php">Proveedor</a></th>
                                </tr>
                            </table>
                        </td>

                        <td width="13">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="left" style="color:#FFF">
                                        <?php
                                        $date_time = date("h:i:sa");

                                        echo $date_time;
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                </table>
            </div>
            <br>

            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

                <tr>
                    <td width="750" align="right">

                        <form action="result_clientes.php" method="get" ecntype="multipart/data-form">
                            <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Search customer..." /><input type="submit" id="btnsearch" value="Buscar" name="search" />
                        </form>

                    </td>

                    <td width="127" height="37" align="right">
                        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button" style="border:1px solid #999; background: #999; height:45px; width:125px; color:#FFF; border-radius:3px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;" value="+ Add Customer" /></a></td>
                </tr>

            </table></th>
    </tr>

    <br>

    <tr>
        <td>
            <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #999; color:#033;">

                <tr>
                    <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #033; background: #999; color:#FFF;"> Customer Information Table 	</th>
                </tr>

                <tr height="30px">
                    <th style="border-bottom:1px solid #333;"> Nombre </th>
                    <th style="border-bottom:1px solid #333;"> Contact </th>
                    <th style="border-bottom:1px solid #333;"> Address </th>
                    <th style="border-bottom:1px solid #333;"> Note </th>
                    <th style="border-bottom:1px solid #333;"> Accion </th>
                </tr>

                <?php
                include 'config.php';

                if (isset($_GET['search'])) {
                    $query = $_GET['query'];

                    $sql = "select * from customers where name like '%$query%' or contact like '%$query%'";

                    $result = $db_link->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row1 = $result->fetch_array()) {
                            ?>
                            <tr align="center" style="height:25px">
                                <td style="border-bottom:1px solid #333;"> <?php echo $row1['name']; ?> </td>
                                <td style="border-bottom:1px solid #333;"> <?php echo $row1['contact']; ?> </td>
                                <td style="border-bottom:1px solid #333;"> <?php echo $row1['address']; ?> </td>
                                <td style="border-bottom:1px solid #333;"> <?php echo $row1['note']; ?> </td>
                                <td style="border-bottom:1px solid #333;">

                                    <a href="delete_clientes.php?id=<?php echo md5($row1['id']); ?>"><input type="button" value="Eliminar" style="width:15; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>

                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<center>No records</center>";
                    }
                }
                $db_link->close();
                ?>
            </table>
        </td>
    </tr>
</table>
<br><br><br>
<div id="bdcontainer"></div>

<!--PIE DE PAGINA-->
<div id="footer">
    <table border="0" cellpadding="15px" align="center" style="size: 12px; font-family: 'Courier New', Courier, monospace; color: #FFF; font-size: 12px;">
        <tr>
            <td>
                &copy; 2016 Todos los derechos reservados.  |  Diseñado por:<a href="https://www.facebook.com/obed">Obed Mena Chuquimia</a>	
            </td>
        </tr>
    </table>
</div><!--PIE DE PAGINA-->

</div>


<div id="popup-box1" class="popup-position">
    <div id="popup-wrapper">
        <div id="popup-container">
            <div id="popup-head-color2">
                <p style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#FFF"> X </font></a></p>
                <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Add Item Form </p>
            </div>
            <br>
            <form action="add_clientes.php" method="POST">
                <table border="0" align="center">

                    <tr>
                        <td align="right">Name:</td>
                        <td><input type="text" id="txtbox" name="name" placeholder="Customer name" required><br></td>
                    </tr>

                    <tr>
                        <td align="right">Conatct:</td>
                        <td><input type="text" id="txtbox" name="contact" maxlength="11" placeholder="Contact" required><br></td>
                    </tr>

                    <tr>
                        <td align="right">Address:</td>
                        <td><input type="text" id="txtbox" name="address" placeholder="Address" required><br></td>
                    </tr>

                    <tr>
                        <td align="right">Note:</td>
                        <td><input type="text" id="txtbox" name="note" placeholder="Note" required><br></td>
                    </tr>

                    <br>
                    <tr  align="left">
                        <td>&nbsp;  </td>
                        <td><input type="SUBMIT" id="btnnav" value="Enviar"></a></td>
                    </tr>

                </table>
            </form>

        </div>
    </div>
</div>

</body>
</html>