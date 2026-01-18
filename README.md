# The Dream Lab

**The Dream Lab** es la plataforma de "Building in Public" y portafolio de productos de **DreamSoft Group**. Este proyecto sirve como escaparate para nuestros desarrollos experimentales, productos SaaS y herramientas Open Source.

![The Dream Lab Banner](https://via.placeholder.com/1200x400.png?text=The+Dream+Lab)

## 🚀 Características

*   **Showcase de Proyectos**: Grid interactivo con estado del proyecto (Concepto, Desarrollo, Beta, Live).
*   **DevLogs**: Actualizaciones técnicas y bitácora de desarrollo vinculada a cada proyecto.
*   **Waitlist & Leads**: Sistema de captación de usuarios interesados y early adopters.
*   **Admin Panel**: Gestión completa de contenidos potenciada por **FilamentPHP**.
*   **Frontend Moderno**: Construido con **Laravel 12**, **Livewire Volt** y **Tailwind CSS**.

## 🛠 Tech Stack

*   **Framework**: [Laravel 12](https://laravel.com)
*   **Admin Panel**: [FilamentPHP v3](https://filamentphp.com)
*   **Frontend**: [Livewire Volt](https://livewire.laravel.com/docs/volt) + [Tailwind CSS](https://tailwindcss.com)
*   **Database**: MySQL
*   **Typography**: Montserrat (Google Fonts)

## 📦 Instalación Local

1.  **Clonar repositoio**
    ```bash
    git clone https://github.com/DreamSoft-Group/DreamSoftGroup.git
    cd DreamSoftGroup
    ```

2.  **Instalar dependencias**
    ```bash
    composer install
    npm install
    ```

3.  **Configurar entorno**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    *Configura tu base de datos en `.env`.*

4.  **Migraciones y Datos**
    ```bash
    php artisan migrate
    php artisan make:filament-user # Para crear tu usuario admin
    ```

5.  **Iniciar servidores**
    ```bash
    php artisan serve
    npm run dev
    ```

## 📘 Manual de Uso del Admin

El panel administrativo (`/admin`) es el corazón de **The Dream Lab**. Aquí se gestionan los tres módulos principales:

### 1. Proyectos (`Projects`)
Representa cada producto o experimento en el portafolio.
*   **Campos Clave**:
    *   `Status`: Define la etapa del ciclo de vida (`Concept`, `Development`, `Beta`, `Live`).
    *   `Access Level`: Controla quién puede ver o acceder (`Free`, `Waitlist`, `Premium`).
    *   `Slug`: URL amigable generada automáticamente.
*   **Uso**: Crea un proyecto aquí para que aparezca automáticamente en la Landing Page.

### 2. Bitácoras (`DevLogs`)
Diario de desarrollo técnico. Funciona como un blog vinculado a cada proyecto.
*   **Relación**: Cada entrada debe pertenecer a un `Proyecto`.
*   **Publicación**: Usa el campo `Published At` para programar o publicar inmediatamente.
*   **Contenido**: Soporta texto enriquecido para explicar avances técnicos, changelogs o roadmaps.

### 3. Prospectos (`Leads`)
Base de datos de usuarios interesados.
*   **Origen**: Se llena automáticamente cuando un visitante se registra en la "Waitlist" desde el frontend.
*   **Status**: `Pending` por defecto. Puede usarse para dar acceso beta manual a ciertos usuarios.

## 📄 Licencia

Este software es propiedad de **DreamSoft Group**. Todos los derechos reservados.
