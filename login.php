<?php

$PageTitle="Inicar Sesion";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');

//body contents go here
?>
    <!--nav-bar-->


    <nav>
        <div class="nav-wrapper #00838f cyan darken-3">
            <a href="#!" class="brand-logo center">Mi EDS App</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="login.php"><i class="material-icons left">home</i>Inicio</a></li>
                <!-- <li><a href="mobile.html"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li> -->
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="login.php"><i class="material-icons right">home</i>Inicio</a></li>
                <!-- <li><a href="mobile.html"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li> -->
            </ul>
        </div>
    </nav>

    <!--fin-nav-bar-->


    <!--LOGIN-->

    <div class="container">
        <div class="row">
            <div class="col m6 ">
                <h2>Mi EDS APP</h2>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                    aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores
                    eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit
                    amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore
                    magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                    suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>
            </div>
            <div class="col m6 z-depth-1">
                <h2 class="center-align">Iniciar Sesion</h2>
                <div class="row">
                    <form class="col m12" action="controllers/checklogin.php" method="post">
                        <div class="row">
                            <div class="input-field col m12">
                                <i class="material-icons prefix">account_circle</i>
                                <input name="username" id="username" type="text" class="validate">
                                <label for="username">Nombre de usuario</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m12">
                                <i class="material-icons prefix">send</i>
                                <input id="password" name="password" type="password" class="validate">
                                <label for="pass">Contraseña</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                <p>
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Recordarme</label>
                                </p>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="col m12">
                                <p class="right-align">
                                    <button class="btn btn-large waves-effect #00838f cyan darken-3" type="submit" value="LOGIN" name="action">Iniciar Sesion</button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FIN LOGIN      -->



<!--imports js-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
<!--fin imports js-->
    <!--nav lateral responsivo-->
    <script>
        $(document).ready(function () {

            $(".button-collapse").sideNav();

        })
    </script>

    <!--fin nav lateral responsivo-->
</body>

</html>
<?php
include_once('/helpers/footer.php');
?>
