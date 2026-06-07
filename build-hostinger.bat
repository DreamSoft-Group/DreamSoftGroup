@echo off
REM ============================================================
REM The Dream Lab - Build para Hostinger (Windows)
REM ============================================================
REM Este script:
REM   1. Compila assets de frontend
REM   2. Genera el paquete desplegable en .\dist\
REM   3. Crea dist\public_html\ (contenido de public\)
REM   4. Crea dist\laravel_app\ (todo lo demas)
REM   5. Ajusta las rutas en public_html\index.php
REM   6. Empaqueta dist\ en dist\dreamlab-hostinger.zip
REM ============================================================

setlocal EnableDelayedExpansion

echo.
echo === [1/6] Limpiando caches anteriores... ===
if exist dist rmdir /s /q dist
if exist dreamlab-hostinger.zip del /q dreamlab-hostinger.zip

echo.
echo === [2/6] Compilando assets de frontend... ===
call npm run build
if %ERRORLEVEL% NEQ 0 (
    echo ERROR: npm run build fallo.
    exit /b 1
)

echo.
echo === [3/6] Generando estructura de despliegue... ===
mkdir dist
mkdir dist\public_html
mkdir dist\laravel_app

REM --- public_html: todo lo de public/ ---
echo Copiando public/ a public_html/ ...
xcopy /E /I /Y /Q public\* dist\public_html\ >nul
xcopy /E /I /Y /Q public\.htaccess dist\public_html\ >nul 2>nul

REM --- laravel_app: todo excepto public/, vendor/, node_modules/, .git, dist ---
echo Copiando aplicacion Laravel ...
xcopy /E /I /Y /Q app dist\laravel_app\app\ >nul
xcopy /E /I /Y /Q bootstrap dist\laravel_app\bootstrap\ >nul
xcopy /E /I /Y /Q config dist\laravel_app\config\ >nul
xcopy /E /I /Y /Q database dist\laravel_app\database\ >nul
xcopy /E /I /Y /Q lang dist\laravel_app\lang\ >nul
xcopy /E /I /Y /Q resources dist\laravel_app\resources\ >nul
xcopy /E /I /Y /Q routes dist\laravel_app\routes\ >nul
xcopy /E /I /Y /Q storage dist\laravel_app\storage\ >nul
xcopy /E /I /Y /Q vendor dist\laravel_app\vendor\ >nul
copy /Y artisan dist\laravel_app\artisan >nul
copy /Y composer.json dist\laravel_app\composer.json >nul
copy /Y composer.lock dist\laravel_app\composer.lock >nul
copy /Y package.json dist\laravel_app\package.json >nul
copy /Y package-lock.json dist\laravel_app\package-lock.json >nul
copy /Y .env.production dist\laravel_app\.env.example >nul

REM Crear subdirectorios de storage vacios con .gitkeep para que se suban
if not exist dist\laravel_app\storage\framework\cache mkdir dist\laravel_app\storage\framework\cache
if not exist dist\laravel_app\storage\framework\sessions mkdir dist\laravel_app\storage\framework\sessions
if not exist dist\laravel_app\storage\framework\views mkdir dist\laravel_app\storage\framework\views
if not exist dist\laravel_app\storage\app\public mkdir dist\laravel_app\storage\app\public
if not exist dist\laravel_app\storage\logs mkdir dist\laravel_app\storage\logs
echo. > dist\laravel_app\storage\framework\cache\.gitkeep
echo. > dist\laravel_app\storage\framework\sessions\.gitkeep
echo. > dist\laravel_app\storage\framework\views\.gitkeep
echo. > dist\laravel_app\storage\app\public\.gitkeep
echo. > dist\laravel_app\storage\logs\.gitkeep

echo.
echo === [4/6] Ajustando rutas en public_html\index.php ... ===
REM En Hostinger, laravel_app/ queda un nivel arriba de public_html/
REM asi que la ruta correcta es: __DIR__ . '/../laravel_app/bootstrap/app.php'
powershell -Command "(Get-Content 'dist\public_html\index.php') -replace \"__DIR__\.'/../bootstrap/app.php'\", \"__DIR__ . '/../laravel_app/bootstrap/app.php'\" | Set-Content 'dist\public_html\index.php'"

REM Tambien ajustar la ruta al autoloader
powershell -Command "(Get-Content 'dist\public_html\index.php') -replace \"__DIR__\.'/../vendor/autoload.php'\", \"__DIR__ . '/../laravel_app/vendor/autoload.php'\" | Set-Content 'dist\public_html\index.php'"

REM Y storage para que sea escribible en public_html/storage
powershell -Command "(Get-Content 'dist\public_html\index.php') -replace \"__DIR__\.'/../storage/framework/maintenance.php'\", \"__DIR__ . '/../laravel_app/storage/framework/maintenance.php'\" | Set-Content 'dist\public_html\index.php'"

echo.
echo === [5/6] Creando .htaccess en laravel_app para bloquear acceso web... ===
(
echo # Bloquear acceso directo a archivos de la aplicacion
echo Require all denied
) > dist\laravel_app\.htaccess

echo.
echo === [6/6] Empaquetando dreamlab-hostinger.zip ... ===
powershell -Command "Compress-Archive -Path 'dist\*' -DestinationPath 'dreamlab-hostinger.zip' -Force"

echo.
echo ============================================================
echo   BUILD COMPLETADO
echo ============================================================
echo.
echo   Archivos generados:
echo     - dist\public_html\         -- sube esto a public_html/
echo     - dist\laravel_app\         -- sube esto a un dir fuera de public_html/
echo     - dreamlab-hostinger.zip    -- ZIP completo para subir de una vez
echo.
echo   Siguiente paso: ver DEPLOY-HOSTINGER.md
echo ============================================================
endlocal
