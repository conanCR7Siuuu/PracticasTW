<?php
    function luhn($number) {
        $odd = true;
        $sum = 0;
      
        foreach ( array_reverse(str_split($number)) as $num) {
            $sum += array_sum( str_split(($odd = !$odd) ? $num*2 : $num) );
        }
      
        return (($sum % 10 == 0) && ($sum != 0));
      }

      function formulario($valorNombre,$valorCorreo, $valorCorreo2, $valorNumero, $valorMes, $valorAño, $valorCvc){
            
            GLOBAL $valNombre, $valCorreo, $valNumero, $valMes, $valAño, $valCvc, $valInfo, $primera_vez, $correoValido;
            echo "<h1> FORMULARIO </h1>";
            echo "<form novalidate>";

            if($valNombre == false && $primera_vez == false){
                echo "<p>Nombre: <input type='text' name='nombre' value= '$valorNombre' /></p>";
                echo "<p class = 'error'> El nombre introducido no es válido(solo puede contener letras y espacios).</p>";
            }else if($valorNombre == " "){
                echo "<p>Nombre: <input type='text' name='nombre' placeholder='Introduzca su nombre' /></p>";
            }else echo "<p>Nombre: <input type='text' name='nombre' value= '$valorNombre' /></p>";

            if($correoValido == false && $primera_vez == false){
                echo "<p>Email: <input type='text' name='correo' value= '$valorCorreo'/></p>";
                echo "<p class = 'error'>  El correo introducido no es válido.</p>";
            }else if($valorCorreo == " "){
                echo "<p>Email: <input type='text' name='correo' placeholder= 'Introduzca su correo'/></p>";
            } else echo "<p>Email: <input type='text' name='correo' value= '$valorCorreo'/></p>";

            if($valCorreo == false && $primera_vez == false){
                echo "<p>Repetir Email: <input type='text' name='correo2' value= '$valorCorreo2'/></p>";
                echo "<p class = 'error'>  Los correos no coinciden.</p>";
            }else if($valorCorreo2 == " "){
                echo "<p>Repetir Email: <input type='text' name='correo2' placeholder= 'Introduzca su correo'/></p>";
            }else echo "<p>Repetir Email: <input type='text' name='correo2' value= '$valorCorreo2'/></p>";

            if($valNumero == false && $primera_vez == false){
                echo "<p>Numero Tarjeta: <input type='text' name='numero' value= '$valorNumero'/></p>";
                echo "<p class = 'error'> Número de tarjeta inválido.</p>";
            }else if($valorNumero == " "){
                echo "<p>Numero Tarjeta: <input type='text' name='numero' placeholder= 'Introduzca su número'/></p>";
            }else echo "<p>Numero Tarjeta: <input type='text' name='numero' value= '$valorNumero'/></p>";

            if($valMes == false && $primera_vez == false){
                echo "<p>Mes de Caducidad: <input type='number' name='mes' value= '$valorMes'/></p>";
                echo "<p class = 'error'>  Introduzca un mes correcto(1-12).</p>";
            }else if($valorMes == " "){
                echo "<p>Mes de Caducidad: <input type='number' name='mes' placeholder= 'Inserte el mes'/></p>";
            }else echo "<p>Mes de Caducidad: <input type='number' name='mes' value= '$valorMes'/></p>";

            if($valAño == false && $primera_vez == false){
                echo "<p>Año de Caducidad: <input type='number' name='año' value= '$valorAño'/></p>";
                echo "<p class = 'error'> Introduzca un año correcto(2000-2100).</p>";
            }else if($valorAño == " "){
                echo "<p>Año de Caducidad: <input type='number' name='año' placeholder= 'Introduzca el año'/></p>";
            }else echo "<p>Año de Caducidad: <input type='number' name='año' value= '$valorAño'/></p>";

            if($valCvc == false && $primera_vez == false){
                echo "<p>CVC: <input type='text' name='cvc' value= '$valorCvc'/></p>";
                echo "<p class = 'error'>  Introduzca un numero correcto en formato CVC (3 números).</p>";

            }else if($valorCvc = " "){
                echo "<p>CVC: <input type='text' name='cvc' placeholder= 'Introduzca el cvc'/></p>";
            }else echo "<p>CVC: <input type='text' name='cvc' value= '$valorCvc'/></p>";

            if($valInfo == false && $primera_vez == false){
                echo "<p>DESEA RECIBIR INFORMACION:
                <input type='radio' name='info' value='si'/>Si
                <input type='radio' name='info' value='no'/>No
                    </p>";
                    echo "<p class = 'error'>  Debes marcar una opción obligatoriamente.</p>";

            }else echo "<p>DESEA RECIBIR INFORMACION:
                <input type='radio' name='info' value='si'/>Si
                <input type='radio' name='info' value='no'/>No
                    </p>";
            
            if($primera_vez == false){
                echo "<p>TEMAS DE INTERES:";
                if(isset($_GET['intereses1'])){
                    echo "<input type='checkbox' name='intereses1' value='aves' checked/>Aves";
                }else echo "<input type='checkbox' name='intereses1' value='aves'/>Aves";

                if(isset($_GET['intereses2'])){
                    echo "<input type='checkbox' name='intereses2' value='casas' checked/>Casas";
                }else echo "<input type='checkbox' name='intereses2' value='casas'/>Casas";

                if(isset($_GET['intereses3'])){
                    echo "<input type='checkbox' name='intereses3' value='coches'checked/>Coches";
                }else echo "<input type='checkbox' name='intereses3' value='coches'/>Coches";          
                echo"</p>";
        
            }else echo "<p>TEMAS DE INTERES:
                    <input type='checkbox' name='intereses1' value='aves'/>Aves
                    <input type='checkbox' name='intereses2' value='casas'/>Casas
                    <input type='checkbox' name='intereses3' value='coches'/>Coches</p>";
            
            echo "<input type='submit' value='Enviar' name='submit'/></br>";
            echo "</form></br>";
      }
      
?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <title>Formulario</title>
            <link rel="stylesheet" href="estilo.css">
        </head>
            <?php 
                
                $primera_vez = true;
                $valNombre = false;
                $valCorreo = false;
                $correoValido = false;
                $valNumero = false;
                $valMes = false;
                $valAño = false;
                $valCvc = false;
                $valInfo = false;

                if(isset($_GET['submit'])){
                    if(isset($_GET['nombre'])){
                        $busqueda = "!^[a-z,A-Z, ]*$!";
                        if(preg_match($busqueda, $_GET['nombre'])){
                            $valNombre = true;
                        }                
                    }

                    if(isset($_GET['correo']) && isset($_GET['correo2'])){
                        if(filter_var($_GET['correo'],FILTER_VALIDATE_EMAIL) != false){
                            $correoValido = true;
                            if(strcmp($_GET['correo'],$_GET['correo2']) == 0){
                                $valCorreo = true;
                            }

                        }
                    }

                    if(isset($_GET['numero'])){
                        if(luhn($_GET['numero']) == true){
                            $valNumero = true;
                        }
                    }

                    if(isset($_GET['mes'])){
                        if(0 < $_GET['mes'] &&  $_GET['mes'] < 13){
                            $valMes= true;
                        }
                    }

                    if(isset($_GET['año'])){
                        if(2000 <= $_GET['año'] &&  $_GET['año'] <= 2100){
                            $valAño= true;
                        }
                    }

                    if(isset($_GET['cvc'])){
                        $busqueda = "!^[0-9]{3}$!";
                        if(preg_match($busqueda, $_GET['cvc'])){
                            $valCvc= true;
                        }
                    }

                    if(isset($_GET['info'])){
                        $valInfo= true;
                    }
                }
            ?>

        <body>
            <?php 
                if(isset($_GET['submit'])){
                    $primera_vez = false;
                    if($valNombre && $valCorreo && $valNumero && $valMes && $valAño && $valCvc && $valInfo){
                        echo "<h1> RESULTADO </h1>";
                        echo "<p class='resultado'>";
                        $nombre = $_GET['nombre'];
                        echo "Nombre = $nombre </br>";
                        $correo = $_GET['correo'];
                        $correo2 = $_GET['correo2'];
                        echo "Correo = $correo </br>";
                        $numero = $_GET['numero'];
                        echo "Numero Tarjeta = $numero </br>";
                        $mes = $_GET['mes'];
                        echo "Mes caducidad = $mes </br>";
                        $año = $_GET['año'];
                        echo "Año caducidad = $año </br>";
                        $cvc = $_GET['cvc'];
                        echo "CVC = $cvc </br>";
                        $info = $_GET['info'];
                        echo "Recibir información = $info </br>";
                        echo "Interes = ";
                        if(isset($_GET['intereses1'])){
                            $intereses1 = $_GET['intereses1'];
                        echo "$intereses1 ";
                        }
                        if(isset($_GET['intereses2'])){
                            $intereses2 = $_GET['intereses2'];
                        echo "$intereses2 ";
                        }
                        if(isset($_GET['intereses3'])){
                            $intereses3 = $_GET['intereses3'];
                        echo "$intereses3 ";
                        }
                        echo "</br>";
                        echo "</p>";

                    }else{
                        formulario($_GET['nombre'], $_GET['correo'], $_GET['correo2'],
                                    $_GET['numero'], $_GET['mes'], $_GET['año'], $_GET['cvc']);
                    }
                    
                } else{
                    formulario(" ", " "," "," "," "," ", " ");

                }
            ?>

            
        </body>
    </html>
