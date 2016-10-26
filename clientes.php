<!DOCTYPE html>
<html lang="es">
    <!------------------------------------------------------------------------->
    <head>
        <meta name="author" content="Obed Mena Chuquimia">
        <meta name="pagina" content="index">
        <meta name="materia" content="@emergentes">
        <meta charset="utf-8"/>
        <title>Clientes</title>
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

        <!--CONTENEDOR PRINCIPAL-->
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
                        <td width="750" align="right">
                            <form action="result_clientes.php" method="get" ecntype="multipart/data-form">
                                <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Clientes..." /><input type="submit" id="btnsearch" value="Buscar" name="search" />
                            </form>
                        </td>
                        <td width="127" height="37" align="right">
                            <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button" style="border:1px solid #066; background: #066; height:45px; width:125px; color:#FFF; border-radius:3px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;" value="+ Agregar Cliente" /></a>
                        </td>
                    </tr>
                </table><!--BUSCADOR------------------------------------------->

                <br>

                <tr>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #999; color:#033;">
                            <tr>
                                <th colspan="6" align="center" height="55px" style="border-bottom:1px solid #033; background: #066; color:#FFF;">Informacion del Clientes</th>
                            </tr>

                            <tr height="30px">
                                <th style="border-bottom:1px solid #333;"> Id </th>
                                <th style="border-bottom:1px solid #333;"> Nombres</th>
                                <th style="border-bottom:1px solid #333;"> Direccion </th>
                                <th style="border-bottom:1px solid #333;"> Fecha de Registro </th>
                                <th style="border-bottom:1px solid #333;"> Accion </th>
                            </tr>

                            <?php
                            require('config.php');
                            $query = "SELECT * FROM clientes";
                            $result = mysqli_query($db_link, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>

                                <tr align="center" style="height:25px">
                                    <td style="border-bottom:1px solid #333;"> <?php echo $row['idcliente']; ?> </td>
                                    <td style="border-bottom:1px solid #333;"> <?php echo $row['nombres']; ?> </td>
                                    <td style="border-bottom:1px solid #333;"> <?php echo $row['direccion']; ?> </td>
                                    <td style="border-bottom:1px solid #333;"> <?php echo $row['fecha_registro']; ?> </td>
                                    <td style="border-bottom:1px solid #333;">
                                        <a href="delete_clientes.php?id=<?php echo md5($row['idcliente']); ?>"><input type="button" value="Eliminar" style="width:15; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </table>
                    </td>
                </tr>
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

        </div><!--CONTENEDOR PRINCIPAL----------------------------------------->

        <!--------------------------------------------------------------------->
        <div id="popup-box1" class="popup-position">
            <div id="popup-wrapper">
                <div id="popup-container">
                    <div id="popup-head-color4">
                        <p style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#FFF"> X </font></a></p>
                        <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Formulario Agregar Cliente </p>
                    </div>
                    <br>
                    <form action="add_clientes.php" method="POST">
                        <table border="0" align="center">
                            <tr>
                                <td align="right">Nombres:</td>
                                <td><input type="text" id="txtbox" name="name" placeholder="Nombre Cliente" required><br></td>
                            </tr>

                            <tr>
                                <td align="right">Apellidos:</td>
                                <td><input type="text" id="txtbox" name="contact" maxlength="11" placeholder="Contacto" required><br></td>
                            </tr>

                            <tr>
                                <td align="right">Direccion:</td>
                                <td><input type="text" id="txtbox" name="address" placeholder="Direccion" required><br></td>
                            </tr>

                            <tr>
                                <td align="right">Fecha de registro:</td>
                                <td><input type="text" id="txtbox" name="note" placeholder="Notas" required><br></td>
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
    <!------------------------------------------------------------------------->
</html>
