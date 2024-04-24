<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "Tarea_24_abril_prueba";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if (isset($_POST ["registro"]))
{
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $email = $_POST["e-mail"];

    $insertarDatosUsuario = "INSERT INTO usuarios VALUES('', '$nombre', '$apellido', '$direccion', '$email')";
    $ejecutar_insertar_usuario = mysqli_query ($enlace, $insertarDatosUsuario);

    $idUsuario = mysqli_insert_id($enlace);

    //EXPERIENCIA LABORAL
    $nombres_de_cargos = isset($_POST["cargos_nombres"]) ? $_POST["cargos_nombres"] : "";
    $nombres_de_empresas = isset($_POST["empresas_nombres"]) ? $_POST["empresas_nombres"] : "";
    $fechas_inicio = isset($_POST["inicio_trabajos"]) ? $_POST["inicio_trabajos"] : array();
    $fechas_final = isset($_POST["final_trabajos"]) ? $_POST["final_trabajos"] : array();

    if(!empty($nombres_de_cargos))
    {
        foreach ($nombres_de_cargos as $index => $cargo)
        {
            $empresa_nombre = $nombres_de_empresas[$index];
            $fecha_inicio_empresa = $fechas_inicio[$index];
            $fecha_final_empresa = $fechas_final[$index];
    
            $insertar_experiencia_laboral = "INSERT INTO experiencia_laboral VALUES ('', '$idUsuario', '$cargo', '$empresa_nombre', '$fecha_inicio_empresa', '$fecha_final_empresa')";
            $ejecutar_insertar_experiencia_laboral = mysqli_query ($enlace, $insertar_experiencia_laboral);
        }
    }


    //IDIOMAS
    $nombres_de_idiomas = isset($_POST["idiomas_nombre"]) ? $_POST["idiomas_nombre"] : "";
    $niveles_de_idiomas = isset($_POST["niveles_idioma"]) ? $_POST["niveles_idioma"] : "";

    if (!empty($nombres_de_idiomas))
    {
        foreach ($nombres_de_idiomas as $index => $nombre_idioma)
        {
            $niveles_temporal = $niveles_de_idiomas[$index];
            $insertar_idiomas = "INSERT INTO idiomas VALUES ('', '$idUsuario', '$nombre_idioma', '$niveles_temporal')";
            $ejectuar_insertar_idiomas = mysqli_query($enlace, $insertar_idiomas);
        }
    }
    
    //APTITUDES
    $nombres_de_aptitudes = isset($_POST["aptitudes_nombres"]) ? $_POST["aptitudes_nombres"] : "";

    if (!empty($nombres_de_aptitudes))
    {
        foreach ($nombres_de_aptitudes as $index => $aptitudes)
        {
            $insertar_aptitudes = "INSERT INTO aptitudes VALUES ('', '$idUsuario', '$aptitudes')";
            $ejecutar_insertar_aptitudes = mysqli_query($enlace, $insertar_aptitudes);
        }
    }
    
    //FORMACION
    $instituciones_nombres = isset($_POST["instituciones_nombres"]) ? $_POST["instituciones_nombres"] : "";
    $titulos_nombres = isset($_POST["titulo_nombres"]) ? $_POST["titulo_nombres"] : "";
    $inicio_formacion = isset($_POST["inicio_formacion"]) ? $_POST["inicio_formacion"] : array();
    $final_formacion = isset($_POST["final_formacion"]) ? $_POST["final_formacion"] : array();

    if (!empty($instituciones_nombres))
    {
        foreach ($instituciones_nombres as $index => $nombre_institucion)
        {
            $titulo_nombre_temp = $titulos_nombres[$index];
            $inicio_formacion_temp = $inicio_formacion[$index];
            $final_formacion_temp = $final_formacion[$index];
    
            $insertar_formacion = "INSERT INTO formacion_academica VALUES ('', '$idUsuario', '$nombre_institucion', '$titulo_nombre_temp', '$inicio_formacion_temp', '$final_formacion_temp')";
            $ejecutar_insertar_formacion = mysqli_query($enlace, $insertar_formacion);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="style_formulario_procesado.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum</title>   
</head>
<body>
    <div id="container">
        <div id="header">
            <div id="header-text">
                <span class="nombre"> <?php echo $nombre; ?> <?php echo $apellido; ?></span> <br>
                <span class="posicion">PUESTO OCUPADO/BUSCADO</span>
            </div>
        </div>
        <div id="parent">       
            <div id="narrow">
                <div id="narrow-container">
                        <section>
                            <h1>CONTACTO</h1>
                            <hr>
                            📧 <?php echo $email; ?><br>
                            📍  <?php echo $direccion; ?><br>
                        </section>
                        <section>
                            <h1>IDIOMAS</h1><hr>
                            <?php 
                            if (!empty($nombres_de_idiomas))
                            {
                                foreach ($nombres_de_idiomas as $index => $nombre_idioma)
                                {
                                    $niveles_temporal = $niveles_de_idiomas[$index];
                                    echo "$nombre_idioma : $niveles_temporal<br>";
                                }
                            }
                            else
                            {
                                echo "No ingresado";
                            }
                            ?>
                        </section>
                        <section>
                            <h1>APTITUDES</h1><hr>
                            <?php 
                            if (!empty($nombres_de_aptitudes))
                            {
                                foreach ($nombres_de_aptitudes as $index => $nombre_aptitud)
                                {
                                    echo "<li>$nombre_aptitud</li>";
                                }
                            }
                            else
                            {
                                echo "No ingresado";
                            }
                            ?>
                        </section>
                </div>
            </div>
            <div id="wide">
                <div id="wide-container">
                    <section>
                    </section>
                    <section>
                        <h1>EXPERIENCIA LABORAL</h1><hr>
                        <?php
                        if (!empty($nombres_de_cargos))
                        {
                            foreach ($nombres_de_cargos as $index => $cargo)
                            {
                                $empresa_nombre = $nombres_de_empresas[$index];
                                $fecha_inicio_empresa = $fechas_inicio[$index];
                                $fecha_final_empresa = $fechas_final[$index];
                                

                                echo "<section>";
                                echo "<h2>$cargo - $empresa_nombre</h2>";
                                echo "<h3> <span class='year'>| $fecha_inicio_empresa - $fecha_final_empresa </span> </h3>";
                                echo "</section>";
                            }
                        }
                        else
                        {
                            echo "<h3>No ingresado</h3>";
                        }
                        ?>
                    </section>
                    <section>
                        <h1>FOMARCION</h1><hr>
                        <?php
                        if (!empty($instituciones_nombres))
                        {
                            
                            foreach ($instituciones_nombres as $index => $nombre_institucion)
                            {
                                $titulo_nombre_temp = $titulos_nombres[$index];
                                $inicio_formacion_temp = $inicio_formacion[$index];
                                $final_formacion_temp = $final_formacion[$index];
                                echo "<section>";
                                echo "<h2>$titulo_nombre_temp - $nombre_institucion</h2>";
                                echo "<h3> <span class='year'>| $inicio_formacion_temp - $final_formacion_temp </span> </h3>";
                                echo "</section>";
                            }
                        }
                        else
                        {
                            echo "<h3>No ingresado</h3>";
                        }
                        ?>
                    </section>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

