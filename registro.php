<?php
ob_start(); // Iniciar buffer de salida para evitar problemas con header()

require_once 'libreria/conexBD.php';
require_once 'libreria/plantilla.php';
plantilla::aplicar();

// Verificar si se está editando un personaje existente
$personaje = null;
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM personajes WHERE id = ?";
    $parametros = [$_GET['id']];
    $personaje = conexion::select($sql, $parametros);

    if (!$personaje) {
        echo "<div style='text-align: center; padding: 20px; background-color: #ffccdd; border: 2px solid #ff1493; border-radius: 15px; max-width: 500px; margin: 50px auto;'>";
        echo "<h1 style='color: #ff1493;'>⚠ Oops...</h1>";
        echo "<p>El personaje que buscas no existe.</p>";
        echo "<a href='galeria.php' class='boton'>⬅ Volver al listado</a>";
        echo "</div>";
        exit;
    }
}

// Si no es edición, se asignan valores por defecto
if (!$personaje) {
    $personaje = [
        'id'     => '',
        'nombre' => '',
        'color'  => '',
        'tipo'   => '',
        'nivel'  => '',
        'foto'   => ''
    ];
}

// Guardar datos cuando se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id      = $_POST['id'];
    $nombre  = $_POST['nombre'];
    $color   = $_POST['color'];
    $tipo    = $_POST['tipo'];
    $nivel   = $_POST['nivel'];
    $foto    = $_POST['foto'];

    try {
        if ($id) {
            // Actualizar personaje
            $sql = "UPDATE personajes SET nombre=?, color=?, tipo=?, nivel=?, foto=? WHERE id=?";
            $parametros = [$nombre, $color, $tipo, $nivel, $foto, $id];
            Conexion::ejecutar($sql, $parametros);
        } else {
            // Insertar nuevo personaje
            $sql = "INSERT INTO personajes (nombre, color, tipo, nivel, foto) VALUES (?, ?, ?, ?, ?)";
            $parametros = [$nombre, $color, $tipo, $nivel, $foto];
            $id = Conexion::insert($sql, $parametros);
        }

        ob_end_clean(); // Limpiar el buffer de salida
        header("Location: reparto.php");
        exit;
    } catch (Exception $e) {
        echo "<p>Error al guardar: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Personaje - Shin-chan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1 class="title">🎉👦 ¡Bienvenido al Mundo de Shin-chan! 👦🎉</h1>
<p>🍜 Ingresa los datos del personaje y guárdalos en la base de datos.</p>

<div class="form-container">
    <form method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($personaje['id'] ?? '') ?>">

        <div class="form-group">
            <label>👦 Nombre:</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($personaje['nombre'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label>🎨 Color de ropa:</label>
            <input type="text" name="color" value="<?= htmlspecialchars($personaje['color'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label>🌟 Tipo (Amigo, Familiar, Mascota, etc.):</label>
            <input type="text" name="tipo" value="<?= htmlspecialchars($personaje['tipo'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label>📈 Nivel de travesuras:</label>
            <input type="number" name="nivel" value="<?= htmlspecialchars($personaje['nivel'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label>🖼️ Foto del personaje (URL):</label>
            <input type="url" name="foto" value="<?= htmlspecialchars($personaje['foto'] ?? '') ?>">
        </div>

        <!-- Mostrar la foto si existe -->
        <?php if (!empty($personaje['foto'])): ?>
            <div class="preview">
                <img src="<?= htmlspecialchars($personaje['foto']) ?>" alt="Foto del personaje">
            </div>
        <?php endif; ?>

        <button type="submit" class="boton">✅ Guardar</button>
    </form>

    <!-- Opción para eliminar personaje si está en edición -->
    <?php if (!empty($personaje['id'])): ?>
        <form method="post" action="eliminar.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($personaje['id']) ?>">
            <button type="submit" class="boton eliminar" onclick="return confirm('¿Seguro que deseas eliminar este personaje?');">❌ Eliminar</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
