<?php

if (!file_exists('libreria/configBD.php')) {
    header("Location: launcher.php");
    exit;
}

require_once 'libreria/configBD.php';
require_once 'libreria/conexBD.php';
require_once 'libreria/plantilla.php';
plantilla::aplicar();

$conexion = new PDO("mysql:host=localhost;dbname=tarea_6", "root", "");
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM personajes";
$stmt = $conexion->query($sql);
$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="personajes-container">
    <h2 class="titulo-personajes">🎭 Conoce al Elenco de Shin-chan 🎭</h2>

    <div class="personajes">
        <?php
        if (empty($filas)) {
            echo "<p class='mensaje-vacio'>🤠 ¡Oh no! Aún no hay personajes. 🎡 ¡Añade a Shin-chan y sus amigos! 🎨</p>";
        } else {
            foreach ($filas as $fila) {
                echo "
                <div class='personaje'>
                    <div class='imagen-container'>
                        <img src='{$fila['foto']}' alt='{$fila['nombre']}'>
                    </div>
                    <h3>{$fila['nombre']}</h3>
                    <p class='profesion'>Color favorito: {$fila['color']}</p>
                    <p class='edad'>Tipo: {$fila['tipo']}</p>
                    <p class='edad'>Nivel de travesura: {$fila['nivel']}</p>
                    <div class='acciones'>
                        <a href='registro.php?id={$fila['id']}' class='btn-accion btn-editar'>📝 Editar</a>
                        <a href='generar_pdf.php?id={$fila['id']}' class='btn-accion btn-descargar' target='_blank'>📄 Descargar</a>
                        <button onclick='eliminarPersonaje({$fila['id']}, this)' class='btn-accion btn-eliminar'>🗑️ Eliminar</button>
                    </div>
                </div>
                ";
            }
        }
        ?>
    </div>
</section>


<script>
    function eliminarPersonaje(id, boton) {
        if (!confirm("💔 ¿Estás seguro de que quieres eliminar este personaje?")) {
            return;
        }

        fetch('eliminar.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${id}`
        })
        .then(response => response.text())
        .then(data => {
            try {
                let jsonData = JSON.parse(data);
                if (jsonData.success) {
                    let card = boton.closest(".personaje");
                    card.style.transition = "opacity 0.5s ease";
                    card.style.opacity = "0";
                    setTimeout(() => {
                        card.remove();
                        window.location.reload();
                    }, 600);
                } else {
                    alert("⚠ Error: " + jsonData.message);
                }
            } catch (e) {
                alert("⚠ Error inesperado del servidor.");
            }
        })
        .catch(error => {
            alert("⚠ Hubo un problema al eliminar el personaje.");
        });
    }
</script>