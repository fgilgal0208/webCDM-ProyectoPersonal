# Web oficial del C. D. Murianense ⚽

Aplicación web full-stack desarrollada en Laravel para el club de fútbol C. D. Murianense, **desplegada en producción** en un hosting real. Combina un escaparate público para la afición con un panel de administración a medida, para que la directiva gestione los contenidos del club de forma autónoma y sin conocimientos técnicos.

## 🚀 Características principales

### Parte pública
- **Portada del club:** clasificación de la liga ordenada por puntos, resultados de cada jornada con navegación entre jornadas y el próximo partido del club destacado.
- **Noticias:** últimas noticias en la portada, listado paginado y página de detalle de cada noticia.
- **Patrocinadores y redes sociales:** sección de patrocinadores y enlaces a los perfiles oficiales del club.
- **Diseño responsive:** interfaz adaptada a móvil, tablet y escritorio con Tailwind CSS.

### Panel de administración
- **Acceso protegido:** login de administrador y rutas privadas mediante el middleware `auth` de Laravel.
- **Gestión de noticias (CRUD):** crear, editar y eliminar noticias con título, categoría, extracto, cuerpo, fecha de publicación e imagen, con validación de formularios.
- **Optimización automática de imágenes:** con Intervention Image, cada foto subida se recorta a 800×600 px y se comprime al 80 % de calidad. Los archivos reciben un nombre único y la imagen antigua se borra del servidor al actualizar o eliminar una noticia.
- **Resultados por jornada:** registro de los goles de cada partido, jornada a jornada.

## 🛠️ Stack tecnológico

- **Backend:** PHP 8.2, Laravel 12
- **Frontend:** Blade, Tailwind CSS 4, Vite
- **Base de datos:** MySQL (equipos, jugadores, partidos, clasificación y noticias)
- **Procesamiento de imágenes:** Intervention Image
- **Despliegue:** hosting compartido en producción
- **Control de versiones:** Git, GitHub

## ⚙️ Instalación en local

Necesitas tener instalados PHP 8.2+, Composer y Node.js.

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/fgilgal0208/webCDM-ProyectoPersonal.git
   cd webCDM-ProyectoPersonal
   ```
2. Instalar las dependencias de PHP:
   ```bash
   composer install
   ```
3. Instalar y compilar las dependencias de frontend:
   ```bash
   npm install
   npm run build
   ```
4. Configurar las variables de entorno y generar la clave de la aplicación:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Definir la conexión a la base de datos en el archivo `.env`, crear las tablas con los datos de la liga (equipos, partidos y clasificación) y crear el usuario administrador:
   ```bash
   php artisan migrate --seed
   php artisan db:seed --class=AdminSeeder
   ```
6. Levantar el servidor de desarrollo:
   ```bash
   php artisan serve
   ```

La web estará disponible en http://localhost:8000 y el panel de administración en http://localhost:8000/admin.

## 📄 Licencia y copyright

© 2026 Francisco Gilarte Galán. Todos los derechos reservados.

Este repositorio y su contenido se proporcionan exclusivamente con fines de exhibición y evaluación profesional (portafolio). No se otorga permiso para utilizar, copiar, modificar o distribuir este código con fines comerciales o derivados sin autorización expresa del autor.
