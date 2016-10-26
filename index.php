<!DOCTYPE html>
<html lang="es">
    <!------------------------------------------------------------------------->
    <head>
        <meta name="author" content="Obed Mena Chuquimia">
        <meta name="pagina" content="index">
        <meta name="materia" content="@emergentes">
        <meta charset="utf-8"/>
        <title>index</title>
    </head>
    <!------------------------------------------------------------------------->
    <link rel="stylesheet" type="text/css" href="css/css1.css">
    <!------------------------------------------------------------------------->
    <body>
        <?php
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('location:login.php');
        }
        ?>

        <?php
        if ($_SESSION['access'] == 'vendedor') {
            header('location:ventas1.php');
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
                                    <th width="10 %" height="62" scope="col"><a href="index.php" >Inicio</a></th>
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

            <br><br><br><br><br><!--ESPACIOS REQUERIDOS------------------------>

            <!--CONTENIDO------------------------------------------------------>
            <div id="bdcontainer">
                <!--BOTONES CENTRALES-->
                <table border="0" cellpadding="0"  cellspacing="0" align="center" width="15%" style="border:1px solid #033; color:#033;">
                    <tr>
                    <th colspan="" align="center" height="60px" style="border-bottom:1px solid #033; background: #066; color:#FFF; font-size:20px; ">MENU INICIO</th>
                </tr>
                    <tr >
                        <tr>
                        <td style="border-bottom:1px solid #333;"><a href="index.php"><input type="button" value="Inicio" style="font-size:20px; background: #066; color:#FFF;"></a></td>
                        </tr>
                        <tr>
                        <td style="border-bottom:1px solid #333;"><a href="ventas.php"><input type="button" value="Ventas" style="font-size:20px; background: #066; color:#FFF;"></a></td>    
                        </tr>
                        <tr>
                        <td style="border-bottom:1px solid #333;"><a href="productos.php"><input type="button" value="Productos" style="font-size:20px; background: #066; color:#FFF;"></a></td>    
                        </tr>
                        <tr>
                        <td style="border-bottom:1px solid #333;"><a href="clientes.php"><input type="button" value="Clientes" style="font-size:20px; background: #066; color:#FFF;"></a></td>     
                        </tr>
                        <tr>
                        <td style="border-bottom:1px solid #333;"><a href="usuarios.php"><input type="button" value="Personal" style="font-size:20px; background: #066; color:#FFF;"></a></td> 
                        </tr>
                        <tr>
                        <td style="border-bottom:1px solid #333;"><a href="categorias.php"><input type="button" value="Categoria" style="font-size:20px; background: #066; color:#FFF;"></a></td> 
                        </tr>
                        <tr>
                        <td style="border-bottom:1px solid #333;"><a href="salir.php"><input type="button" value="Salir" style=" font-size:20px; background: #066; color:#FFF;"></a></td>  
                        </tr>
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

        </div><!--CONTENEDOR PRINCIPAL----------------------------------------->

    </body>
    <!------------------------------------------------------------------------->
</html>
