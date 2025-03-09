# ✨👀 Gestor de Travesuras de Shin-chan 👀✨

⚡️ **Bienvenidos al caos y la diversión!** ⚡️  
**"¡Hey, hola, hola! Soy Shin-chan, el rey de las locuras de Kasukabe, y esta es mi aplicación web en PHP para gestionar a mis amigos y a mí mismo (el más genial de todos, claro)."**

Esta herramienta te permite organizar a los personajes de *Crayon Shin-chan*, con un diseño que grita: **“Shin-chan estuvo aquí”**. Prepárate para un mundo lleno de risas, colores chillones y aventuras épicas. **¡Zoooombie!** 🧟‍♂️

---
## 🎯 Objetivo del Proyecto
Crear una aplicación web en PHP para:
✅ Registrar personajes
✅ Editar sus datos
✅ Eliminarlos si no son lo suficientemente traviesos
✅ Descargar sus perfiles en PDF (para que nadie olvide mis travesuras)

Todo con una interfaz inspirada en **Shin-chan**, llena de colores brillantes y elementos divertidos.

---
## 🎨 Estilo y Temática
- **Diseño:** Colores vivos (*rojo, amarillo, rosa*), fuentes juguetonas (Comic Sans, Poppins).
- **Personajes:** Gestiona personajes como yo (**Shinnosuke Nohara**), mi familia loca y mis amigos del jardín de infantes.
- **Interfaz:** Estilo dibujado como con mis crayones favoritos. 🖍️

---
## 🛢️ Base de Datos (MySQL o SQLite)
### **Base de datos:** `shinchan_db`
| Campo       | Tipo                     | Descripción |
|------------|----------------------|----------------------|
| `id`       | INT (PK, AUTO_INCREMENT) | ID de travesura |
| `nombre`   | VARCHAR(100) | Nombre del personaje |
| `color`    | VARCHAR(50) | Color representativo |
| `tipo`     | VARCHAR(50) | Rol en la serie |
| `nivel`    | INT | Nivel de caos (1000 para Shin-chan) |
| `foto`     | TEXT | URL de la foto más cool |

---
## 🔧 Backend (PHP)
### **Archivos importantes:**
- `db_config.php` → Configuración de la base de datos
- `index.php` → Inicio de la aplicación
- `crud.php` → Operaciones para crear, leer, actualizar y eliminar personajes
- `pdf.php` → Generación de PDF con TCPDF o DomPDF

### **Operaciones CRUD:**
✅ **Crear** → Añadir personajes nuevos
✅ **Leer** → Mostrar personajes en una tabla
✅ **Actualizar** → Editar datos
✅ **Eliminar** → Borrar personajes
✅ **Descargar PDF** → Generar ficha con información y foto

---
## 🛠️ Asistente de Configuración
Si la base de datos no existe, mi **Asistente de Travesuras** te ayuda:
1. Pide datos como **servidor, usuario, contraseña y nombre de la base**.
2. Crea `shinchan_db` y su tabla `personajes` automáticamente.
3. Te dice "¡Listo, a jugar!" cuando todo está bien. 😆

---
## 🚀 Instalación y Uso
1. **Clona el repositorio:**
   ```bash
   git clone <url-del-repo>
   ```
2. **Configura el servidor PHP y MySQL (o usa SQLite).**
3. **Sube las fotos de los personajes a la carpeta `images/`.**
4. **Abre el navegador y disfruta:**
   ```
   http://localhost/shinchan
   ```

---
## 🛠️ Tecnologías Usadas
- **PHP** → Para la lógica del sistema
- **MySQL / SQLite** → Base de datos
- **HTML / CSS** → Interfaz colorida
- **TCPDF / DomPDF** → Generación de PDFs

---
## 📌 Notas de Shin-chan
- **No te olvides de probar mi perfil primero (soy el número uno).**
- **Si algo falla, dile a mi mamá.**
- **¡Diviértete con esta app tanto como yo con mis crayones!** 😜✨

---
**Hecho con amor y caos por [Netanel De Jesus](https://github.com/Netrolly01), un gran fan de Shin-chan.** 🚀 Marzo 2025.
