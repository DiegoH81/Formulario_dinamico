<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "Tarea_24_abril";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <script defer src="main.js"></script>
    <title>Tarea</title>
</head>
<body>
    <div id="container">
        <form id="formulario" action="#" method="post">
            <h1>Formulario</h1>
            <span class="texto_bajo_formulario">Llene los datos cuidadosamente</span>
            <h2>Informacion Personal</h2>
            <h3>Nombre</h3>
            <input type="text" class="inputs" name="nombre" id="nombre" placeholder="Ingrese su nombre" required>
            <h3>Apellido</h3>
            <input type="text" class="inputs" name="apellido" id="apellido" placeholder="Ingrese su apellido" required>
            <h3>Dirección</h3>
            <input type="text" class="inputs" name="direccion" id="direccion" placeholder="Ingrese su direccion" required>
            <h3>E-mail</h3>
            <input type="text" class="inputs" name="e-mail" id="e-mail" placeholder="Ingrese su e-mail" required>
            
            
            <div id="texto_dinamico">
                <h3>Experiencia laboral <span class="aclaraciones"> (MAXIMO 3)</span></h3>
                <a href="#" class="add_button" id="add_trabajos">+</a>
            </div>

            <div id="numero_de_trabajos">
            </div>

            <div id="texto_dinamico">
                <h3>Formación academica <span class="aclaraciones">(MAXIMO 3)</span></h3>
                <a href="#" class="add_button" id="add_formacion">+</a>
            </div>
            <div id="numero_formacion">
            </div>

            <div id="texto_dinamico">
                <h3>Idiomas <span class="aclaraciones"> (MAXIMO 4)</span></h3>
                <a href="#" class="add_button" id="add_idiomas">+</a>
            </div>

            <div id="numero_idiomas">
            </div>
            <div id="texto_dinamico">
                <h3>Aptitudes <span class="aclaraciones"> (MAXIMO 5)</span></h3>
                <a href="#" class="add_button" id="add_aptitudes">+</a>
            </div>

            <div id="numero_aptitudes">
            </div>
            <input type="submit" class="button" value="Enviar" name="registro">
        </form>
    </div>
    
</body>


<?php
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

</html>
