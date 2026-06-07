# Changelog

Todos los cambios notables en **The Dream Lab** se documentan aquí.

El formato sigue [Keep a Changelog](https://keepachangelog.com/es/1.1.0/),
y el proyecto adhiere a [Semantic Versioning](https://semver.org/lang/es/).

## [Unreleased]

### Added
- Sistema de captura de leads (waitlist) funcional con Volt component y rate limit.
- Página dedicada `#waitlist` en el landing con formulario en vivo.
- Slug automático en `Project` basado en el título, con manejo de duplicados.
- Acceso al panel de Filament configurable vía `DREAMLAB_ADMIN_ALLOWLIST` en `.env`.
- Dashboard widgets de Filament: `DreamLabStats` (proyectos/devlogs/leads) y `LatestLeads`.
- `sitemap.xml` dinámico y `robots.txt` con `Disallow` en rutas privadas.
- Meta tags SEO/OG/Twitter y `lang` en español.
- Layout público unificado, `x-footer` con redes sociales, navbar con menú móvil.
- Factories y seeders para `Project`, `DevLog` y `Lead`.
- Tests Feature: `WaitlistTest`, `ProjectShowTest`. Test Unit: `ProjectModelTest`.

### Changed
- Modelos `Project`, `DevLog`, `Lead` ahora castean a Enums PHP (`ProjectStatus`, `ProjectAccessLevel`, `LeadStatus`).
- `DevLogForm` usa `Select` con relación en vez de input numérico para `project_id`.
- `LeadForm` oculta/deshabilita `stripe_id` (gestionado automáticamente).
- `ProjectResource` form: slug auto-generado, validación `unique`, image editor, constraints de tamaño.
- `LeadsTable` muestra badges de estado, oculta `stripe_id` por defecto, columna `email` copiable.
- Iconos únicos por recurso Filament (Rocket, Document, Users).
- Eliminado `tailwind.config.js` (redundante con `@theme` en `app.css` para Tailwind 4).
- Eliminadas utilidades `layout-zoom-*` (CSS no estándar) del layout público.
- `APP_LOCALE=es` por defecto; creado `lang/es/`.

### Fixed
- `viteTheme` duplicado en `AdminPanelProvider`.
- Slug de proyecto no se generaba; ahora se crea automáticamente al guardar.
- Colores por status duplicados en 2 vistas: extraídos al enum `ProjectStatus::tailwindBadgeClasses()`.
- Imagen de cover: helper `cover_image_url` (soporta URLs externas y rutas de Storage).
- DevLog en project-show mostraba borradores: ahora usa scope `publishedDevLogs`.

## [0.1.0] - 2026-01-18

### Added
- Estructura inicial de Laravel 12 + FilamentPHP v3 + Livewire Volt + Tailwind CSS 4.
- Modelos `Project`, `DevLog`, `Lead` con migraciones.
- Recursos Filament para los tres modelos.
- Landing con hero, grid de proyectos y sección "Proceso".
- Página de detalle de proyecto (Volt).
- Autenticación admin vía Filament (básica, Breeze leftover).
