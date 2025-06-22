# 🏫 Sistema de Gestión Escolar (sisgestionescolar)

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)](https://laravel.com)

Un sistema completo para la gestión de instituciones educativas, desarrollado con Laravel y diseñado para facilitar la administración académica, control de estudiantes, docentes y procesos escolares.

## 🚀 Características Principales

- Gestión integral de estudiantes y personal docente
- Control de matrículas y asignaturas
- Sistema de calificaciones y boletines
- Módulo de asistencia
- Gestión de pagos y finanzas
- Panel administrativo intuitivo
- Sistema de roles y permisos con Spatie
- Interfaz responsiva y amigable

## 📋 Requisitos del Sistema

- PHP >= 8.1
- Composer
- MySQL >= 5.7 o MariaDB >= 10.3
- Node.js >= 14.x y NPM
- Servidor web (Apache/Nginx)
- Extensión PHP BCMath
- Extensión PHP Ctype
- Extensión PHP Fileinfo
- Extensión PHP JSON
- Extensión PHP Mbstring
- Extensión PHP OpenSSL
- Extensión PHP PDO
- Extensión PHP Tokenizer
- Extensión PHP XML

## 🛠️ Instalación

1. Clonar el repositorio:
   ```bash
   git clone [URL_DEL_REPOSITORIO]
   cd sisgestionescolar
   ```

2. Instalar dependencias de Composer:
   ```bash
   composer install
   ```

3. Instalar dependencias de NPM:
   ```bash
   npm install
   npm run dev
   ```

4. Configurar el archivo .env:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Configurar la base de datos en el archivo .env:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sisgestionescolar
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_contraseña
   ```

6. Ejecutar migraciones y seeders:
   ```bash
   php artisan migrate --seed
   ```

7. Configurar el almacenamiento simbólico:
   ```bash
   php artisan storage:link
   ```

8. Iniciar el servidor de desarrollo:
   ```bash
   php artisan serve
   ```

## 🔐 Configuración de Roles y Permisos

Este proyecto utiliza el paquete Spatie Laravel Permission para la gestión de roles y permisos:

```bash
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

## 👥 Credenciales por Defecto

- **Administrador:**
  - Email: admin@sisgestionescolar.com
  - Contraseña: password

- **Docente:**
  - Email: docente@sisgestionescolar.com
  - Contraseña: password



## 🤝 Contribuir

Las contribuciones son bienvenidas. Por favor, lee nuestras [pautas de contribución](CONTRIBUTING.md) antes de enviar pull requests.

## 📧 Contacto

Para más información, contáctanos en [matiaspereznauto@gmail.com](mailto:matiaspereznauto@gmail.com)

---

Desarrollado con ❤️ por MtsPrz