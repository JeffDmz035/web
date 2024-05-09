<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

// Incluir la función logEvent definida en tu script o archivo separado

function logEvent($message) {
    $logFile = 'logs.txt';
    $timestamp = date("Y-m-d H:i:s");
    $logMessage = "[{$timestamp}] {$message}\n";
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
    // Registro de inicio de sesión exitoso
    $username = $_SESSION["nombre"];
    logEvent("Inicio de sesión exitoso para el usuario '{$username}'.");

    require 'template/header.php';

    if ($_SESSION['escritorio']==1)
    {
        ?>
        <br>
        <br>
        <!--Contenido-->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">        

        </div><!-- /.content-wrapper -->
        <!--Fin-Contenido-->
        <?php
    }
    else
    {
        require 'noacceso.php';
    }

    require 'template/footer.php';
}

ob_end_flush();
?>