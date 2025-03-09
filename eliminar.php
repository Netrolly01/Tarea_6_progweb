<?php
require_once 'libreria/conex.php';

// Verificar si se recibió un ID válido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    
    try {
        // Verificar si el personaje existe antes de eliminarlo
        $sqlCheck = "SELECT * FROM personajes WHERE id = ?";
        $personaje = Conexion::select($sqlCheck, [$id]);
        
        if ($personaje) {
            // Eliminar el personaje de la base de datos
            $sqlDelete = "DELETE FROM personajes WHERE id = ?";
            Conexion::ejecutar($sqlDelete, [$id]);
            
            // Redirigir a la página de listado después de eliminar
            header("Location: galeria.php?mensaje=Personaje eliminado exitosamente");
            exit;
        } else {
            echo "<div style='text-align: center; padding: 20px; background-color: #ffcc00; border: 2px solid #ff5733; border-radius: 15px; max-width: 500px; margin: 50px auto;'>";
            echo "<h1 style='color: #ff5733;'>⚠ Error</h1>";
            echo "<p>El personaje que intentas eliminar no existe.</p>";
            echo "<a href='galeria.php' class='boton'>⬅ Volver al listado</a>";
            echo "</div>";
        }
    } catch (Exception $e) {
        echo "<p>Error al eliminar el personaje: " . $e->getMessage() . "</p>";
    }
} else {
    // Si no se recibió un ID válido, redirigir al listado
    header("Location: galeria.php?mensaje=ID inválido");
    exit;
}
?>