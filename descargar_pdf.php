<?php
require_once 'vendor/autoload.php'; // Carga Dompdf con Composer
require_once 'libreria/configBD.php';
require_once 'libreria/conexBD.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Verificar si se recibió un ID
if (!isset($_GET['id'])) {
    die("❌ Error: No se especificó un personaje.");
}

$id = $_GET['id'];
$sql = "SELECT * FROM personajes WHERE id = ?";
$personaje = Conexion::consulta($sql, [$id]);

if (empty($personaje)) {
    die("❌ Error: El personaje no existe.");
}

$personaje = $personaje[0]; // Obtener datos del personaje

// Configurar Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('defaultFont', 'Arial'); // Fuente moderna

$dompdf = new Dompdf($options);

// Plantilla HTML para el PDF
$html = "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <style>
        body {
            font-family: 'Chalkboard', 'Comic Sans MS', sans-serif; /* Fuente infantil y divertida */
            text-align: center;
            background-color: #FF9999; /* Rosa chillón como el estilo de Shin-chan */
            color: #333;
        }
        .container {
            border: 5px solid #FFFF00; /* Amarillo brillante como los lápices de Shin-chan */
            padding: 20px;
            margin: 20px auto;
            width: 60%;
            background: #FFFFFF;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #FF0000; /* Rojo vibrante para el título, como la energía de Shin-chan */
            text-shadow: 2px 2px 5px rgba(255, 255, 0, 0.5); /* Sombra amarilla */
            font-size: 36px;
            font-weight: bold;
        }
        .image img {
            width: 180px;
            height: auto;
            border-radius: 50%; /* Círculo para un toque juguetón */
            border: 3px solid #FFFF00; /* Borde amarillo */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }
        .info {
            text-align: left;
            margin-top: 20px;
            font-size: 18px;
            padding: 10px;
            background: #FFCC99; /* Naranja claro como los colores del anime */
            border-radius: 10px;
            box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .info p {
            padding: 8px;
            border-bottom: 2px dashed #FF0000; /* Línea punteada roja */
            font-weight: bold;
        }
        .icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #FF4500; /* Naranja rojizo */
            font-style: italic; /* Para la frase icónica */
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1> ¡Perfil de Shin-chan! </h1>
        <div class='image'>
            <img src='{$personaje['foto']}' alt='Foto de Shin-chan'>
        </div>
        <div class='info'>
            <p><strong>Nombre:</strong> {$personaje['nombre']}</p>
            <p><strong>Color Representativo:</strong> {$personaje['color']}</p>
            <p><strong>Tipo:</strong> {$personaje['tipo']}</p>
            <p><strong>Nivel de Travesuras:</strong> {$personaje['nivel']}</p>
        </div>
    </div>
</body>
</html>
";

// Generar el PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait'); // Formato vertical
$dompdf->render();

// Enviar el PDF al navegador
$dompdf->stream("Perfil_{$personaje['nombre']}.pdf", ["Attachment" => false]);
?>
