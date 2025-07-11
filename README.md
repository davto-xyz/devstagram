# Devstagram

Red social similar a Instagram desarrollada con Laravel.

## Características

- Sistema de autenticación de usuarios
- Subida y edición de imágenes
- Publicaciones con descripciones
- Sistema de likes
- Seguimiento de usuarios
- Perfil de usuario personalizable
- Comentarios en publicaciones
- Responsive design con Tailwind CSS

## Tecnologías utilizadas

- **Backend**: Laravel 10
- **Frontend**: Blade Templates, Tailwind CSS
- **Base de datos**: MySQL
- **Servidor de imágenes**: Intervention Image
- **JavaScript**: Alpine.js, Dropzone.js

## Instalación

1. Clona el repositorio:
```bash
git clone https://github.com/tu-usuario/devstagram.git
cd devstagram
```

2. Instala las dependencias de PHP:
```bash
composer install
```

3. Instala las dependencias de Node.js:
```bash
npm install
```

4. Copia el archivo de configuración:
```bash
cp .env.example .env
```

5. Genera la clave de aplicación:
```bash
php artisan key:generate
```

6. Configura tu base de datos en el archivo `.env`

7. Ejecuta las migraciones:
```bash
php artisan migrate
```

8. Compila los assets:
```bash
npm run dev
```

9. Inicia el servidor de desarrollo:
```bash
php artisan serve
```

## Uso

1. Regístrate o inicia sesión en la aplicación
2. Completa tu perfil con imagen y descripción
3. Sube publicaciones con imágenes y descripciones
4. Sigue a otros usuarios
5. Da likes y comenta en las publicaciones
6. Explora el muro de publicaciones

## Estructura del proyecto

- `app/Http/Controllers/` - Controladores de la aplicación
- `app/Models/` - Modelos Eloquent
- `resources/views/` - Plantillas Blade
- `resources/js/` - Archivos JavaScript
- `resources/css/` - Archivos CSS
- `database/migrations/` - Migraciones de base de datos
- `public/uploads/` - Imágenes subidas por usuarios

## Contribución

Si quieres contribuir al proyecto:

1. Fork el repositorio
2. Crea una rama para tu feature (`git checkout -b feature/nueva-caracteristica`)
3. Commit tus cambios (`git commit -am 'Añade nueva característica'`)
4. Push a la rama (`git push origin feature/nueva-caracteristica`)
5. Abre un Pull Request

## Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.