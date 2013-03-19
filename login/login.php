
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sistema Panadería</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>

        <!-- Le styles -->
        <style type="text/css">
            /* Override some defaults */
            html, body {
                background-color: #eee;
            }
            body {
                padding-top: 40px; 
            }
            .container {
                width: 300px;
            }

            /* The white background content wrapper */
            .container > .content {
                background-color: #fff;
                padding: 20px;
                margin: 0 -20px; 
                -webkit-border-radius: 10px 10px 10px 10px;
                -moz-border-radius: 10px 10px 10px 10px;
                border-radius: 10px 10px 10px 10px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
            }

            .login-form {
                margin-left: 65px;
            }

            legend {
                margin-right: -50px;
                font-weight: bold;
                color: #404040;
            }

        </style>

    </head>
    <body>

        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="login-form">
                        <h3>Acceso Panaderia</h3>

                        <form name="login" method="post" action="procesarlogin.php">
                            <?php
                            if ($_GET['errorusuario'] == 'si') {
                                echo '<div style="width:220px" class="clearfix">
                                <div class="alert alert-error">
                                <button type="button" class="close" onclick="$(' . "'" . '.alert' . "'" . ').hide();" data-dismiss="alert">×</button>
                                <strong><i class="icon-exclamation-sign"></i> Ups!</strong> Parece que el nombre de usuario y/o la contraseña no son correctos.
                                </div>
                                </div>';
                            }
                            ?>
                            <fieldset>

                                <div class="clearfix">
                                    <label for="usuario">Usuario</label>

                                    <input type="text" id="usuario" name="usuario" required/>
                                </div>
                                <div class="clearfix">
                                    <label for="contraseña">Contraseña</label>

                                    <input type="password" id="contraseña" name="contraseña" required />
                                </div>
                                <button class="btn btn-primary"  type="submit">Entrar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->
    </body>
</html>

<!--<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Panadería</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    </head>
    <body>          
        <div style="margin-left: auto; margin-right: auto; position: relative;">
            
            
            <form name="login" method="post" action="procesarlogin.php">

                <div>
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" required/>
                </div>
                <div>
                    <label for="contraseña">Contraseña</label>
                    <input type="password" id="contraseña" name="contraseña" required />
                </div>
                <div>
                    <input type="submit" name="Submit" value="Enviar"/>
                </div>
            </form>





        </div>
    </body>
</html>-->