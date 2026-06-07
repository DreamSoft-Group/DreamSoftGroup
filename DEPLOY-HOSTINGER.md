# Despliegue en Hostinger — The Dream Lab

> Guía paso a paso para subir el build de producción a un hosting compartido de Hostinger (Business o Cloud).

## 1. Antes de subir

### 1.1 Requisitos del plan de Hostinger

- **PHP 8.2+** (todos los planes Business/Cloud lo traen)
- **MySQL** o **MariaDB**
- Acceso al **hPanel** con File Manager y a la terminal SSH (opcional pero recomendado)
- Subdominio o dominio apuntando al hosting (p. ej. `thedreamlab.dreamsoftgroup.com`)

> ⚠️ Si tu plan es **Single** (el más barato), puede que no tengas MySQL remoto. Verifica antes de contratar.

### 1.2 Crear la base de datos

En hPanel → **Bases de datos MySQL**:

1. Crear nueva base de datos: `u123456789_dreamlab`
2. Crear usuario: `u123456789_dreamlab` con contraseña segura
3. Anotar: **host** (suele ser `localhost`), **puerto** (`3306`), **nombre BD**, **usuario** y **contraseña**

### 1.3 Crear cuenta de correo (opcional pero recomendado)

En hPanel → **Cuentas de correo** → crear `no-reply@dreamsoftgroup.com` con su contraseña. Anotar el servidor SMTP (`smtp.hostinger.com`), puerto (`465` con SSL) y credenciales.

## 2. Estructura del paquete generado

El build produce **dos directorios** que se suben a posiciones distintas en el servidor:

| Directorio local | Destino en Hostinger | Contenido |
|---|---|---|
| `dist/public_html/` | `/domains/tudominio.com/public_html/` | Punto de entrada web (`index.php`, assets, `.htaccess`, etc.) |
| `dist/laravel_app/` | `/domains/tudominio.com/laravel_app/` | Resto de Laravel (app, vendor, storage, etc.) |

> ⚠️ **No subas `laravel_app/` dentro de `public_html/`** — quedaría accesible vía web y expondría `.env`, `vendor/` y todo el código.

## 3. Subir los archivos (vía File Manager)

### 3.1 Subir `public_html/`

1. En hPanel → **File Manager** → entrar a `/domains/tudominio.com/public_html/`
2. **Borrar** todo lo que haya (si es un dominio nuevo suele venir con un `default.php`/`index.html`)
3. **Subir** el archivo `dreamlab-public_html.zip` (1.9 MB)
4. Click derecho sobre el zip → **Extract**
5. Mover el contenido extraído un nivel arriba si es necesario (debe quedar en `public_html/index.php`, no `public_html/public_html/index.php`)
6. **Borrar** el zip

### 3.2 Subir `laravel_app/`

1. En hPanel → **File Manager** → ir a `/domains/tudominio.com/`
2. Crear carpeta `laravel_app` si no existe
3. Entrar a `laravel_app/`
4. **Subir** el archivo `dreamlab-laravel_app.zip` (19 MB)
5. Click derecho → **Extract**
6. Verificar que quedaron: `app/`, `vendor/`, `artisan`, `.env.example`, etc. directamente en `laravel_app/`
7. **Borrar** el zip

> 💡 Si File Manager tarda mucho con el zip grande, usa **SSH + rsync** (ver sección 5).

## 4. Configurar el entorno (.env)

### 4.1 Crear `.env`

1. En File Manager, ir a `/domains/tudominio.com/laravel_app/`
2. Copiar `.env.example` → `.env`
3. Click derecho sobre `.env` → **Edit**
4. Rellenar **todos** los valores de `DB_*`, `MAIL_*`, `APP_URL`, `DREAMLAB_ADMIN_ALLOWLIST`
5. **Generar `APP_KEY`** con SSH (ver 4.2)
6. Guardar

### 4.2 Generar `APP_KEY` vía SSH

```bash
ssh tu_usuario@tu_dominio.com
cd /domains/tudominio.com/laravel_app
cp .env.example .env
php artisan key:generate --force
```

## 5. Migrar la base de datos

```bash
# Localmente, con las credenciales de Hostinger:
cd /domains/tudominio.com/laravel_app
php artisan migrate --force
php artisan db:seed --force    # opcional, datos de ejemplo
```

> Si tu plan no permite SSH, abre **phpMyAdmin** desde hPanel y ejecuta el SQL manualmente (exporta primero las migraciones a SQL con `php artisan migrate --pretend`).

## 6. Permisos de escritura

`storage/` y `bootstrap/cache/` deben ser escribibles por el servidor web:

```bash
chmod -R 775 storage bootstrap/cache
chown -R tu_usuario:tu_usuario storage bootstrap/cache
```

> En Hostinger Business/Cloud el usuario del servidor web es el mismo que el FTP, así que normalmente no necesitas cambiar el owner. Si tienes errores 500 por permisos, ajusta desde File Manager → click derecho → **Permissions** → 775.

## 7. Crear el symlink de `storage`

```bash
php artisan storage:link
```

Esto crea `public_html/storage` apuntando a `laravel_app/storage/app/public` (para imágenes de proyectos).

## 8. Optimizaciones finales

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

> Estas ya están aplicadas en el build, pero ejecútalas de nuevo si modificas `.env` o rutas.

## 9. Verificar

- Visita `https://tudominio.com` → debería cargar el landing
- Visita `https://tudominio.com/admin` → debería aparecer el login de Filament
- Visita `https://tudominio.com/sitemap.xml` → debería listar los proyectos
- Visita `https://tudominio.com/robots.txt` → debería listar `Disallow` en rutas privadas

## 10. Crear el primer admin

```bash
php artisan make:filament-user
```

Te pedirá nombre, email y contraseña. Ese email debe estar en `DREAMLAB_ADMIN_ALLOWLIST` del `.env` o pertenecer a `@dreamsoftgroup.com`.

## Solución de problemas

### 500 Internal Server Error al cargar la web

1. Revisa `/domains/tudominio.com/laravel_app/storage/logs/laravel.log`
2. Verifica que `bootstrap/cache/` tiene permisos de escritura
3. Ejecuta `php artisan config:clear && php artisan cache:clear`
4. Confirma que PHP en el servidor es 8.2+: `php -v` por SSH

### Las imágenes de proyectos no se ven

1. Verifica que `public_html/storage` existe (es un symlink a `laravel_app/storage/app/public`)
2. Si no existe, ejecuta `php artisan storage:link`
3. Si el plan no soporta symlinks, cópialo manualmente:
   ```bash
   cp -r laravel_app/storage/app/public/* public_html/storage/
   ```

### CSS/JS no cargan (404 en assets)

1. Verifica que `public_html/build/` tiene los assets compilados
2. Limpia caché del navegador o usa modo incógnito
3. Si usas CDN/Cloudflare, purga el caché

### El panel `/admin` da error de `APP_KEY`

```bash
cd /domains/tudominio.com/laravel_app
php artisan key:generate --force
```

### Email no se envía

Verifica los datos `MAIL_*` en `.env`. En Hostinger suele ser:
- Host: `smtp.hostinger.com`
- Puerto: `465` con `MAIL_ENCRYPTION=ssl` o `587` con `MAIL_ENCRYPTION=tls`

---

## Resumen rápido (TL;DR)

```bash
# 1. Subir ZIP public_html → public_html/, extraer, borrar zip
# 2. Subir ZIP laravel_app → laravel_app/, extraer, borrar zip
# 3. SSH al servidor:
cd /domains/tudominio.com/laravel_app
cp .env.example .env
nano .env   # editar DB, MAIL, APP_URL, APP_KEY después
php artisan key:generate --force
php artisan migrate --force
php artisan storage:link
chmod -R 775 storage bootstrap/cache
php artisan optimize
php artisan make:filament-user
```

Si el plan no tiene SSH, todos los pasos `php artisan` se pueden ejecutar creando un archivo temporal `deploy.php` en `public_html/` que ejecute los comandos y luego borrarlo (no recomendado, mejor pedir SSH).
