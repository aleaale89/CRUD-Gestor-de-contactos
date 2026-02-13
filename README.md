# 📋 Gestor de Contactos - Aplicación Laravel

Gestor es una aplicación web para gestionar contactos (tipo agenda). Este Readme contiene instrucciones de instalación, configuración y despliegue. Construida con **Laravel 12** 

---

## 📸 Características

✅ Crear, ver, editar y eliminar contactos   
✅ Validación de datos en formularios  
✅ Base de datos con pgAdmin 4 
✅ Estilos CSS personalizados  
---

## 🛠️ Requisitos del Sistema

Antes de comenzar, asegúrate de tener instalado:

- **PHP** ≥ 8.2
- **Composer** (gestor de dependencias de PHP)
- **Node.js** (para compilar assets)
- **PgAdmin 4**

---

## 📦 Dependencias Utilizadas

### Dependencias Principales

| Paquete | Versión | Descripción |
|---------|---------|-------------|
| **laravel/framework** | ^12.0 | Framework Laravel |
| **laravel/tinker** | ^2.10.1 | REPL interactivo para Laravel |
| **PHP** | ^8.2 | Lenguaje de programación |

### Dependencias de Desarrollo

| Paquete | Versión | Descripción |
|---------|---------|-------------|
| **fakerphp/faker** | ^1.23 | Generador de datos falsos para testing |
| **laravel/pail** | ^1.2.2 | Monitor de logs de Laravel |
| **laravel/pint** | ^1.24 | Code style checker para PHP |
| **laravel/sail** | ^1.41 | Docker environment para Laravel |
| **mockery/mockery** | ^1.6 | Librería para mocking en tests |
| **nunomaduro/collision** | ^8.6 | Mejor presentación de errores |
| **pestphp/pest** | ^3.8 | Framework de testing moderno |
| **pestphp/pest-plugin-laravel** | ^3.2 | Plugin de Pest para Laravel |

### Versión de Laravel

```
Laravel Framework: 12.0
PHP Version: 8.2+
Database: PgAdmin 4
Node.js: Para compilar assets (Vite)
```

---

## 🚀 Cómo Desplegar el Proyecto

### Opción 1: Instalación Completa desde Cero

#### 1. Clonar o descargar el repositorio
```bash
cd c:\xampp\htdocs\laravel
git clone <url-del-repositorio> gestor
cd gestor
```

#### 2. Instalar dependencias de PHP
```bash
composer install
```

#### 3. Configurar el archivo .env
```bash
cp .env.example .env
```

Edita el archivo `.env` y asegúrate de tener la configuración correcta:
```env
APP_NAME="Gestor de Contactos"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_DATABASE=gestor
```

#### 4. Generar la clave de la aplicación
```bash
php artisan key:generate
```

#### 5. Crear la base de datos (SQLite)
```bash
touch database/database.pgsql
```

#### 6. Ejecutar las migraciones (crear las tablas)
```bash
php artisan migrate
```

Si hay datos de prueba, ejecuta también:
```bash
php artisan db:seed
```

#### 7. Instalar dependencias de Node.js
```bash
npm install
```

#### 8. Compilar los assets
```bash
npm run build
```

### Opción 2: Usar el Script de Setup Automático

Si el archivo `composer.json` tiene el script setup, ejecuta:
```bash
composer run setup
```

---

## 🖥️ Ejecutar la Aplicación

### Opción 1: Servidor de Desarrollo integrado

```bash
php artisan serve
```

Luego accede a: **http://localhost:8000**

### Opción 2: Usar XAMPP (Apache)

1. Coloca el proyecto en `C:\xampp\htdocs\laravel\gestor`
2. Inicia Apache desde el panel de XAMPP
3. Accede a: **http://localhost/laravel/gestor/public**

### Opción 3: Desarrollo con Hot Reload

Para compilación automática de assets mientras desarrollas:
```bash
npm run dev
```

---

## 📊 Estructura de la Base de Datos

### Tabla: `contactos`

```sql
CREATE TABLE contactos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
```

---

## 💾 Cómo Exportar la Base de Datos

### Opción 1: Exportar usando Comandos de Laravel

#### Exportar a archivo SQL
```bash
php artisan db:export database/backups/contactos_backup.sql
```

#### 1. Usando sqlite3 (para SQLite)
```bash
sqlite3 database/database.sqlite ".dump" > database/backup.sql
```

### Opción 2: Copiar el archivo de SQLite directamente

Si usas SQLite, simplemente copia el archivo:
```bash
copy database/database.sqlite database/database.sqlite.backup
```

### Opción 3: Exportar usando phpMyAdmin o DB Manager

1. Abre phpMyAdmin en http://localhost/phpmyadmin
2. Selecciona la base de datos
3. Haz clic en la pestaña "Exportar"
4. Elige el formato SQL
5. Haz clic en "Descargar"

### Opción 4: Crear un Backup con Artisan

Crea un backup automático:
```bash
php artisan backup:run
```

---

## 🔧 Comandos Útiles de Laravel

```bash
# Ver la versión de Laravel
php artisan --version

# Crear una migración nueva
php artisan make:migration nombre_migracion

# Crear un modelo nuevo
php artisan make:model NombreModelo

# Crear un controlador
php artisan make:controller NombreControlador

# Ver todas las rutas
php artisan route:list

# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Ejecutar tests
php artisan test

# Ver la base de datos en la consola
php artisan tinker
```

---

## 📝 Migraciones Disponibles

Las siguientes migraciones están incluidas:

1. `0001_01_01_000000_create_users_table.php` - Tabla de usuarios
2. `0001_01_01_000001_create_cache_table.php` - Tabla de caché
3. `0001_01_01_000002_create_jobs_table.php` - Tabla de jobs/colas
4. `2026_02_13_010324_create_contactos_table.php` - **Tabla de contactos**

---

## 🐛 Solución de Problemas

### Error: "Class 'App\Models\Contacto' not found"
```bash
php artisan migrate
```

### Error: ".env file not found"
```bash
cp .env.example .env
php artisan key:generate
```

### Error: "SQLSTATE[HY000]: General error: 1 table contactos already exists"
```bash
php artisan migrate:reset
php artisan migrate
```

### Assets no se cargan (CSS/JS)
```bash
npm install
npm run build
php artisan cache:clear
```

---

## 📞 API de Rutas

```
GET    /                    - Página de inicio
GET    /contacto            - Listar todos los contactos
GET    /contacto/create     - Formulario para crear contacto
POST   /contacto            - Guardar nuevo contacto
GET    /contacto/{id}/edit  - Formulario para editar contacto
PATCH  /contacto/{id}       - Actualizar contacto
DELETE /contacto/{id}       - Eliminar contacto
```

---

## 📄 Estructura del Proyecto

```
gestor/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── ContactoController.php
│   └── Models/
│       ├── Contacto.php
│       └── User.php
├── database/
│   ├── migrations/
│   └── database.sqlite
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   └── views/
│       ├── welcome.blade.php
│       └── contacto/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── form.blade.php
├── routes/
│   └── web.php
├── public/
│   └── index.php
├── .env
├── composer.json
├── package.json
└── README.md
```

---

## 📧 Contacto y Soporte

Para reportar bugs o sugerencias, contacta al desarrollador.

---

## 📜 Licencia

Este proyecto está bajo la licencia MIT. Ver archivo LICENSE para más detalles.

---

**Última actualización**: 13 de febrero de 2026  
**Versión**: 1.0.0  
**Estado**: En desarrollo ✅
