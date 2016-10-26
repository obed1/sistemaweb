<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="author" content="Obed Mena Chuquimia">
        <meta name="pagina" content="index">
        <meta name="materia" content="@emergentes">
        <meta charset="utf-8"/>
        <title>Editar Personal</title>
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
        <!------------------------------------------------------->
        <!--CONTENEDOR PRINCIPAL-->
        <div id="container">
            <!--CONTENEDOR SUPERIOR-->
            <div id="header">
                <table cellspacing="0" width="100%" border="0" cellpadding="20px">
                    <tr>
                        <td width="56%">
                            <table width="41%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <!--TITULO DEL SISTEMA-->
                                    <td width="80%" align="center"> <font size="12px" >Sistema Web @Emergentes</font></td>
                                </tr>
                            </table></td>
                        <td style="font-size:14px;">
                            <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th scope="col">Acceso: <?php echo $_SESSION['access']; ?> </th>
                                    <th scope="col">Usuario: <?php echo $_SESSION['usuario']; ?> </th>
                                    <th scope="col">
                                        <?php
                                        //FECHA ACTUAL DEL SISTEMA
                                        include_once("date1.php");
                                        $Today = date('y:m:d', time());
                                        ?></th>
                                    <th scope="col" width="20px"><a href="salir.php">
                                            <input type="button" id="btnadd" value="Cerrar Sesión" align="middle" src="" />
                                        </a></th>
                                </tr>
                            </table></td>
                    </tr>
                </table>
            </div><!--CONTENEDOR SUPERIOR-->
            <!------------------------------------------------------->
            <br><br><br><br><br>

            <!--MENU-->
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
                                        //<!-- TIEMPO DE SESION -->
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
            </div><!--MENU-->
            <!------------------------------------------------------->
            <br>

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

            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

                <tr>
                    <td width="750" align="right"><form action="result.php" method="get" ecntype="multipart/data-form">
                            <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Search supplier..." /><input type="submit" id="btnsearch" value="Buscar" name="search" />
                        </form></td>

                    <td width="127" height="37" align="right">
                        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button" style="border:1px solid #066; background:#066; height:45px; width:125px; color:#FFF; border-radius:3px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;" value="+ Add Supplier" /></a></td>
                </tr>

            </table></th>
    </tr>
    <!------------------------------------------------------->
    <div id="popup-box2" class="popup-position1">
        <div id="popup-wrapper1">
            <div id="popup-container1">
                <div id="popup-head-color2">
                    <br>
                    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Editar Personal </p>
                </div>

                <?php
                include 'config.php';
                $id = $_GET['id'];
                $view = "SELECT * from usuario where md5(idusuario) = '$id'";
                $result = $db_link->query($view);
                $row = $result->fetch_assoc();

                if (isset($_POST['update'])) {
                    $ID = $_GET['id'];
                    $usuarios = $_POST['usuarios'];
                    $claves = $_POST['claves'];
                    $nombres = $_POST['nombres'];
                    $correos = $_POST['correos'];
                    $accesos = $_POST['accesos'];

                    $insert = "UPDATE usuario set usuario = '$usuarios', clave = '$claves', nombre = '$nombres', correo = '$correos', access = '$accesos' where md5(idusuario) = '$ID'";

                    if ($db_link->query($insert) == TRUE) {

                        echo "Registro actualizado correctamente";
                        header('location:supplier.php');
                    } else {

                        echo "Ups no se pudo actualizar" . $conn->error;
                        header('location:supplier.php');
                    }

                    $db_link->close();
                }
                ?>

                <br>
                <form action="" method="POST">
                    <table border="0" align="center">

                        <tr>
                            <td align="right">Usuario:</td>
                            <td><input type="text" id="txtbox" name="usuarios" placeholder="Usuario" value="<?php echo $row['usuario']; ?>" required><br></td>
                        </tr>

                        <tr>
                            <td align="right">Clave:</td>
                            <td><input type="text" id="txtbox" name="claves" placeholder="Clave" value="<?php echo $row['clave']; ?>" required><br></td>
                        </tr>

                        <tr>
                            <td align="right">Nombre:</td>
                            <td><input type="text" id="txtbox" name="nombres" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required><br></td>
                        </tr>

                        <tr>
                            <td align="right">Correo:</td>
                            <td><input type="text" id="txtbox" name="correos" maxlength="11" placeholder="Correo" value="<?php echo $row['correo']; ?>" required><br></td>
                        </tr>

                        <tr>
                            <td align="right">Acceso:</td>
                            <td><input type="text" id="txtbox" name="accesos" placeholder="Acceso" value="<?php echo $row['access']; ?>" required><br></td>
                        </tr>    
                        <br>
                        <tr align="center">
                            <td>&nbsp;  </td>
                            <td>
                                <br>
                                <input type="SUBMIT" name="update" id="btnnav" value="Actualizar"></form>
                                <a href="usuarios.php"><input type="button" style="border:1px solid #900; background:#900; height:40px; width:105px; border-radius:3px; color:#FFF;" value="Cancelar"></a>

                            </td>
                        </tr>

                    </table>

            </div>
        </div>
    </div>

    <br>
    <!------------------------------------------------------->
    <tr>
        <td>
            <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #066; color:#033;">

                <tr>
                    <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #033; background: #066; color:#FFF;"> Products 	</th>
                </tr>

                <tr height="30px">
                    <th style="border-bottom:1px solid #333;"> Usuario </th>
                    <th style="border-bottom:1px solid #333;"> Clave </th>
                    <th style="border-bottom:1px solid #333;"> Nombre </th>
                    <th style="border-bottom:1px solid #333;"> Correo </th>
                    <th style="border-bottom:1px solid #333;"> Acceso </th>
                    <th style="border-bottom:1px solid #333;"> Accion </th>
                </tr>

                <?php
                require('config.php');
                $query = "SELECT * FROM usuario";
                $result = mysqli_query($db_link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    ?>

                    <tr align="center" height="25px;">
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['idusuario']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['usuario']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['clave']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['nombre']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['correo']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['access']; ?> </td>
                        <td style="border-bottom:1px solid #333;">
                            <a href="edit_supplier.php?id=<?php echo md5($row['idusuario']); ?>"><input type="button" value="Editar" style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;"></a>/<a href="delete_categorias.php"><input type="button" value="Eliminar" style="width:15; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>

                        </td>
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
</html>
