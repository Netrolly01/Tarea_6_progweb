<?php

class Plantilla
{
    static $instance = null;

    public static function aplicar()
    {
        if (self::$instance == null) {
            self::$instance = new Plantilla();
        }
    }

    public function __construct()
    {
        ?>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Shin-chan Fanpage</title>

            <style>
                /* General styles */
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }

                html, body {
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                    font-family: 'Comic Sans MS', cursive, sans-serif;
                    background-color: #FFD700;
                    background-image: url('https://www.nintendo.com/eu/media/images/10_share_images/games_15/nintendo_3ds_download_software_7/H2x1_3DSDV_ShinChan_Vol5.jpg');
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    color: #333;
                }

                /* Main wrapper to push footer down */
                .wrapper {
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                }

                /* Sidebar */
                .sidebar {
                    width: 250px;
                    height: 100vh;
                    background-color: rgba(255, 0, 0, 0.8);
                    position: fixed;
                    left: 0;
                    top: 0;
                    padding-top: 20px;
                    text-align: center;
                }

                .sidebar a {
                    display: block;
                    color: yellow;
                    font-size: 1.4em;
                    text-decoration: none;
                    margin: 15px 0;
                    padding: 10px;
                    font-weight: bold;
                }

                .sidebar a:hover {
                    color: white;
                }

                /* Main content */
                .main-content {
                    margin-left: 260px;
                    padding: 20px;
                    flex: 1;
                }

                /* Container */
                .container {
                    width: 90%;
                    max-width: 600px;
                    margin: auto;
                    padding: 20px;
                    background-color: rgba(255, 255, 255, 0.9);
                    border-radius: 15px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
                    border: 5px solid red;
                }

                /* Form */
                form {
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                }

                label {
                    font-size: 1.2em;
                    font-weight: bold;
                    color: red;
                }

                input {
                    padding: 10px;
                    font-size: 1em;
                    border: 2px solid red;
                    border-radius: 5px;
                    width: 100%;
                }

                /* Buttons */
                .boton {
                    background-color: red;
                    color: yellow;
                    padding: 15px;
                    font-size: 1.3em;
                    border-radius: 10px;
                    cursor: pointer;
                    text-align: center;
                }

                .boton:hover {
                    background-color: yellow;
                    color: red;
                }

                /* Image preview */
                .preview img {
                    width: 150px;
                    margin-top: 10px;
                    border: 3px solid red;
                }

                /* Footer */
                .footer {
                    text-align: center;
                    font-size: 1.2em;
                    border-top: 3px solid red;
                    padding: 10px;
                    background-color: rgba(255, 0, 0, 0.8);
                    color: yellow;
                    margin-top: auto;
                }

                .personajes {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}
.personaje {
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    padding: 15px;
    width: 250px;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    border: 3px solid red;
}
.imagen-container {
    width: 100%;
    height: 200px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f8f8f8;
}
.imagen-container img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
}
.acciones {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}
.btn-accion {
    text-decoration: none;
    padding: 8px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    display: inline-block;
    width: 40%;
}
.btn-editar {
    background-color: blue;
    color: white;
}
.btn-descargar {
    background-color: green;
    color: white;
}
.btn-eliminar {
    background-color: red;
    color: white;
    border: none;
    cursor: pointer;
}
.btn-eliminar:hover {
    background-color: darkred;
}
            </style>
        </head>

        <body>
            <div class="sidebar">
                <a href="index.php">Inicio</a>
                <a href="registro.php">Registro</a>
                <a href="galeria.php">Galería</a>
            </div>
            
            <div class="wrapper">
                <div class="main-content">
                    <div class="container">
        <?php
    }

    public function __destruct()
    {
        ?>
                    </div>
                </div>
                
                <div class="footer">
                    <p>© 2025 Fanpage de Shin-chan. Netanel De Jesus 20231103</p>
                </div>
            </div>
        </body>

        </html>
        <?php
    }
}
