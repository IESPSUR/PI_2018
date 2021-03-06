<?php
session_start();
include '../php/connection.php';

$id = $_GET['id'];
$sql_oferta = "SELECT * FROM oferta WHERE id=".$id;

if(isset($_POST['nombre'])){ // array post con datos recibido


    $nombre = $_POST['nombre'];
    $duracion = $_POST['duracion'];
    $plazas = $_POST['num_plazas'];
    $descripcion = $_POST['descripcion'];
    $dificultad = $_POST['dificultad'];
    $sql_edit = "UPDATE oferta SET nombre='".$nombre."', duracion='".$duracion."',num_plazas=".$plazas.",descripcion='".$descripcion."', dificultad='".$dificultad."' WHERE id=".$id;
    if ($conexion->query($sql_edit) === TRUE) {
        header('location: ./edit.php?id=' . $id . '&offer=succeed');
    } else {
        header('location: ./edit.php?id=' . $id . '&offer=error');
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="../img/favicon.ico" />
	<title>Editar actividad | WildSports</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/conectores_content.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    </head>
<body>
<header class="menuLogin">

</header>
<nav class="menuPrincipalUser">

</nav>
<aside class="publicidad">

</aside>
<section id="sectionforms"> 
    <article id="userforms">
        <div class="status"></div>
    <div id="lista">
        <?php
        $result = $conexion->query($sql_oferta);
        $row = $result->fetch_assoc();
        echo '<div id="detalle-oferta">';
        echo '<form action="" method="post" accept-charset="utf-8">';
        // echo "<p>AVISO: ESTO ESTÁ HECHO EN PLAN CUTRÓN, LA IDEA ES QUE AQUÍ SALGAN LOS DATOS, PERO SOLO ALGUNOS DE ELLOS SE PUEDAN MODIFICAR, A CONTINUACIÓN VEREIS CUALES. SE HARÁ PRIMERO LA PARTE BACK Y LUEGO SE LE IMPLEMENTARÁ LA VISTA.</p>";
        echo '<h2>Información de la actividad a editar</h2>';      
echo "<div class='filainfo'>";
        echo "<div class='infoperfiliz'><label>Nombre de la oferta: </label></div>";
        echo "<div class='infoperfilde'><input name=\"nombre\" type=\"text\" value={$row['nombre']}> </div> ";
echo "</div>";
        echo "<div class='filainfo'>";
        echo "<div class='infoperfiliz'><label>Provincia: </label></div>";
        echo "<div class='infoperfilde'><input name=\"provincia\" type=\"text\" disabled value={$row['provincia']}> </div> ";
        echo "</div>";
        echo "<div class='filainfo'>";
        echo "<div class='infoperfiliz'><label>Municipio: </label></div>";
        echo "<div class='infoperfilde'><input name=\"municipio\" type=\"text\" disabled value={$row['municipio']}> </div> ";
        echo "</div>";
        echo "<div class='filainfo'>";
        echo "<div class='infoperfiliz'><label>Duración: </label></div>";
        echo "<div class='infoperfilde'><input name=\"duracion\" type=\"text\" value={$row['duracion']}> </div> ";
        echo "</div>";
        echo "<div class='filainfo'>";
        echo "<div class='infoperfiliz'><label>Número de plazas disponibles: </label></div>";
        echo "<div class='infoperfilde'><input name=\"num_plazas\" type=\"text\" value={$row['num_plazas']}> </div> ";
        echo "</div>";
        echo "<div class='filainfo'>";
        echo "<div class='infoperfiliz'><label>Tipo de actividad: </label></div>";
        echo "<div class='infoperfilde'><input name=\"tipo_actividad\" type=\"text\" disabled value={$row['tipo_actividad']}> </div> ";
        echo "</div>";
        echo "<div class='filainfo'>";
        echo "<div class='infoperfiliz'><label>Descripción: </label></div>";
        echo "<div class='infoperfilde'><input name=\"descripcion\" type=\"text\" value={$row['descripcion']}> </div> ";
        echo "</div>";
        echo "<div class='filainfo'>";
        echo "<div class='infoperfiliz'><label>Precio: </label></div>";
        echo "<div class='infoperfilde'><input name=\"precio\" type=\"text\" disabled value={$row['precio']}> </div> ";
        echo "</div>";
        echo "<div class='filainfo'>";
        echo "<div class='infoperfiliz'><label>Dificultad: </label></div>";
        echo "<div class='infoperfilde'><select selected={$row['dificultad']} name=\"dificultad\" id='categ-usu'>
        <option value='facil'>Fácil</option>
        <option value='media'>Media</option>
        <option value='alta'>Alta</option>
        <option value='experto'>Experto</option>
    </select></div>";
        echo "</div>";
        echo "<div class='filainfo'>";
        echo "<div class='infoperfiliz'><label>Categoría: </label></div>";
        echo "<div class='infoperfilde'><input name=\"categoria\" type=\"text\" disabled value={$row['categoria']}> </div> ";
        echo "</div>";
        echo "<div class='filainfo'>";
        echo "<div class='infoperfiliz'><label>Fecha de inicio: </label></div>";
        echo "<div class='infoperfilde'><input name=\"fecha_inicio\" type=\"text\" disabled value={$row['fecha_inicio']}> </div> ";
        echo "</div>";
        echo "<div class='filainfo'> ";
        echo "<div class='infoperfiliz'><label>Fecha de fin: </label></div>";
        echo "<div class='infoperfilde'><input name=\"fecha_fin\" type=\"text\" disabled value={$row['fecha_fin']}> </div> ";
        echo "</div>";

        echo '<input id="enviar" name="enviar" type="submit" value="Editar" class="botones">';
        echo '</form>';
        

        echo '<form action="../php/edit_photo.php?id='.$id.'" method="post" enctype="multipart/form-data">';
        echo "<div class='filainfo'> ";
        echo "<div class='infoperfiliz'><label>Imagen: </label></div>";
        echo "<div class='infoperfilde'><input  name='upfile' type='file'> </div> ";
        echo "</div>";
        echo '<input id="enviar" name="enviar" type="submit" value="Cambiar foto" class="botones">';
        echo '</form>';
        echo '</div>';
        ?>
        <br><br>
</div>
        <a href="../index.php">Volver al index</a>
    </article>
    <article id="userforms">
    </article>
</section>

<footer class="pie">

</footer>
</body>
</html>