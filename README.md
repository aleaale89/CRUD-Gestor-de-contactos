# 📋 Gestor de Contactos - Aplicación Laravel

Gestor es una aplicación web para gestionar contactos (tipo agenda). Este Readme contiene instrucciones de instalación, configuración y despliegue. Construida con **Laravel 12** 

---

## 📸 Características

✅ Crear, ver, editar y eliminar contactos   
✅ Validación de datos en formularios  
✅ Base de datos con pgAdmin4 
✅ Estilos CSS personalizados  

---

## 🛠️ Requisitos del Sistema

Antes de comenzar, asegúrate de tener instalado:

- **PHP** ≥ 8.2
- **Composer** (gestor de dependencias de PHP)
- **Node.js** ≥ 18.x (incluye npm)
- **PostgreSQL** (servidor de base de datos)
- **pgAdmin 4** (interfaz gráfica para PostgreSQL, opcional)
- **Git** (para clonar el repositorio)

---

## 📦 Dependencias Utilizadas

### Dependencias Principales (PHP)

| Paquete | Versión | Descripción |
|---------|---------|-------------|
| **laravel/framework** | ^12.0 | Framework Laravel |
| **laravel/tinker** | ^2.10.1 | REPL interactivo para Laravel |
| **laravel/ui** | ^4.6 | Componentes de UI preconfigurados para Laravel |
| **PHP** | ^8.2 | Lenguaje de programación |

### Dependencias de Node.js (npm)

| Paquete | Versión | Descripción |
|---------|---------|-------------|
| **axios** | ^1.11.0 | Cliente HTTP para hacer peticiones |
| **laravel-vite-plugin** | ^2.0.0 | Plugin de Vite integrado con Laravel |
| **vite** | ^7.0.7 | Build tool moderno para assets (CSS/JS) |

### Versiones de Tecnologías Principales
```
Laravel Framework: 12.0
PHP Version: 8.2+
Node.js: Versión 19+
Database: PostgreSQL (con pgAdmin 4)
Build Tool: Vite 7.x
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

#### 2. Configurar el archivo .env
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
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=gestor
DB_USERNAME=postgres
DB_PASSWORD=1234
```

## 🖥️ Ejecutar la Aplicación

### Desarrollo: Servidor de Desarrollo integrado

```bash
php artisan serve
```

Accede a: **http://localhost:8000**

### Desarrollo: Compilar Assets en Tiempo Real (Vite)

Abre **otra terminal** y ejecuta:

```bash
npm run dev
```
Esto compilará automáticamente los cambios en CSS y JavaScript mientras desarrollas.

### Usar Script de Desarrollo Concurrente (más Práctico)

Para ejecutar servidor + cola + Vite simultáneamente:

```bash
composer run dev
```
Esto requiere que tengas `npx concurrently` instalado globalmente.

Luego accede a: **http://localhost:8000**

## 📊 Estructura de la Base de Datos

### Tabla: `contactos`

```sql
CREATE TABLE contactos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    apellido VARCHAR(200) NOT NULL,
    telefono VARCHAR(250) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    direccion VARCHAR(250) NOT NULL 
)

### Ambiente de Desarrollo (`.env`)

```env
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=gestor
DB_USERNAME=postgres
DB_PASSWORD=1234
```

---

## 💾 Cómo Exportar la Base de Datos

### Comfirma que la carpeta 'database' contenga la carpeta donde se encuentra el backup, llamado gestor.sql lo puedes exportar.

Verificar .env: 
confirma DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD

Exportar en Postgres:
pg_dump -U postgres -h 127.0.0.1 -p 5432 -F p -f [gestor.sql](http://_vscodecontentref_/3) gestor

Importar a Postgres:
Crear DB si no existe: createdb -U postgres -h 127.0.0.1 -p 5432 gestor
Cargar backup: psql -U postgres -h 127.0.0.1 -p 5432 -d gestor -f database/backup/gestor.sql

Si usas pgAdmin: botón derecho → Restore/Backup → elige gestor.sql (formato Plain/SQL).

Opción Laravel (migraciones + seeders):
1.php artisan migrate --force
2.php artisan db:seed
3.Para reiniciar y poblar: php artisan migrate:fresh --seed (pero ELIMINA datos existentes).

Nota sobre ubicación: si tienes el SQL dentro de migrations, muévelo a gestor.sql para mayor claridad.

---

**Última actualización**: 13 de febrero de 2026  
**Versión**: 1.0.0  
