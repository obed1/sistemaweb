<!DOCTYPE html>
<html lang="es">
    <!------------------------------------------------------------------------->
    <head>  
        <meta name="author" content="Obed Mena Chuquimia">
        <meta name="pagina" content="login">
        <meta name="materia" content="@emergentes">
        <meta charset="utf-8"/>
        <title>login</title>
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

    </head>
    <!------------------------------------------------------------------------->

    <?php
    session_start();
    if (isset($_POST['username'])) {
        header('localhost:index.php');
    }
    ?>

    <!----------------------------------------------------------------------------->
    <body style=" background:url(images/street.jpg) no-repeat center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
        <!--CONTENEDOR PRINCIPAL----------------------------------------------->
        <div id = "container">
            <!-- Header ------------------------------------------------------->
            <div id = "header">
                <table border="0" cellspacing="10px" width="100%" cellpadding="5px" style="size: 12px; font-family: 'Courier New', Courier, monospace; color: #FFF; font-size: 12px;">
                    <tr>
                        <td width="80%" align="center"> <font size="6px" >Sistema Web Tecnologias@Emergentes</font></td>
                        <td width="10%" align="right" ><a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button" id="btnadd" value="Ingresar"></a></td>
                    </tr>
                </table>
            </div><!-- Header ------------------------------------------------->

            <br><br><br><br><br><!--ESPACIOS REQUERIDOS------------------------>

            <!--BARRA DEL BUSCADOR--------------------------------------------->
            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="127" height="37" align="left">
                    <td width="750" align="center">
                        <form action="result_productos.php" method="get" ecntype="multipart/data-form">
                            <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Producto" /><input type="submit" id="btnsearch" value="Buscar" name="search" />
                        </form>
                    </td>
                    <td width="127" height="37" align="right">
                </tr>
            </table><!--BARRA DEL BUSCADOR------------------------------------->

            <br>

            <!--CONTENIDO------------------------------------------------------>
            <div id="bdcontainer">
                <tr>
                    <td>
                        <!--TABLA ESPECIFICA 1 -->
                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="40%" style="border:1px solid #066; color:#033; border-radius:3px;">
                            <tr>
                                <th colspan="4" align="center" height="55px" style="border-bottom:1px solid #033; background: #066; color:#FFF;">Productos disponibles</th> 
                            </tr>

                            <!--CAMPOS-->
                            <tr height="30px">
                                <th style="border-bottom:1px solid #333;"> Id </th>
                                <th style="border-bottom:1px solid #333;"> Descripcion </th>
                                <th style="border-bottom:1px solid #333;"> Precio </th>
                                <th style="border-bottom:1px solid #333;"> Categoria </th>
                            </tr><!--CAMPOS-->

                            <!--OPERACION PARA LISTAR-->
                            <?php
                            require('config.php');
                            $query = "SELECT * FROM productos";
                            $result = mysqli_query($db_link, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr align="left" style="height:25px">
                                    <td style="border-bottom:1px solid #333;"> <?php echo $row['idproducto']; ?> </td>
                                    <td style="border-bottom:1px solid #333;"> <?php echo $row['descripcion']; ?> </td>
                                    <td style="border-bottom:1px solid #333;"> <?php echo $row['precio_unitario']; ?> </td>
                                    <td style="border-bottom:1px solid #333;"> <?php echo $row['idcategoria']; ?> </td>
                                    <td style="border-bottom:1px solid #333;">
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table><!--TABLA ESPECIFICA-->

                        <!--TABLA ESPECIFICA 2-->
                        
                        <!--TABLA ESPECIFICA-->
                    </td>
                </tr> <!--</table>-->

            </div><!--CONTENIDO------------------------------------------------>

            <br>

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

        </div> <!--CONTENEDOR PRINCIPAL---------------------------------------->

        <!--------------------------------------------------------------------->
        <!--VENTANA EMERGENTE-------------------------------------------------->
        <div id="popup-box1" class="popup-position">
            <div id="popup-wrapper">
                <div id="popup-container">
                    <div id="popup-head-color3">
                        <p style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#0fff"> X </font></a></p>
                        <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Formulario Inicio de Sesión </p>
                    </div>
                    <br><br><br><br>

                    <!--FORMULARIO DE INICIAR SESION-->
                    <form action="login_process.php" method="POST">
                        <table border="0" align="center">
                            <tr>
                                <td>Usuario:</td>
                                <td align="center"><input type="text" id="txtbox" name="username" placeholder="Usuario" required><br></td>
                            </tr>

                            <tr>
                                <td>Clave:</td>
                                <td align="center"><input type="password" id="txtbox" name="password" placeholder="Clave" required><br></td>
                            </tr>

                            <tr>
                                <td> &nbsp; </td>
                            </tr>

                            <tr>
                                <td> &nbsp; </td>
                                <td  align="left"><input type="SUBMIT" id="btnnav" value="Iniciar Sesión"></td>
                            </tr>

                        </table>
                    </form><!--FORMULARIO DE INICIAR SESION-->

                </div>
            </div>
        </div><!--VENTANA EMERGENTE-------------------------------------------->

    </body>
    <!------------------------------------------------------------------------->
</html>
