# AP FENIX — Landing Page

Landing page profesional para **AP FENIX** (Colombia), enfocada en generar confianza y conversión hacia el grupo de WhatsApp de la comunidad. Diseño claro, mobile-first y orientado a la transparencia con comprobantes de pago reales.

---

## Objetivo

Transmitir confianza, profesionalismo y comunidad activa para que los visitantes:

- Entren al grupo de WhatsApp
- Visualicen comprobantes verificados
- Conozcan cómo funciona la participación
- Confíen en la marca AP FENIX

---

## Stack tecnológico

| Capa | Tecnología |
|------|------------|
| Backend | PHP 8+ (sin frameworks) |
| Frontend | HTML5, CSS3, JavaScript vanilla |
| UI | Bootstrap 5.3 + Bootstrap Icons |
| Tipografía | Google Fonts — Montserrat |
| Datos | JSON estáticos en `storage/data/` |
| Configuración | Variables `.env` |
| Servidor | Apache + `mod_rewrite` |

---

## Requisitos del sistema

- PHP 8.1 o superior
- Apache 2.4 con `mod_rewrite`, `mod_headers`, `mod_deflate` y `mod_expires`
- Extensiones PHP: `json`, `mbstring` (recomendado)
- Certificado SSL (HTTPS recomendado en producción)

---

## Estructura del proyecto

```
landing.apfenix.local/
├── .env                      # Variables de entorno (no versionar)
├── .env.example              # Plantilla de configuración
├── .htaccess                 # Rewrite, seguridad, caché y compresión
├── index.php                 # Punto de entrada (document root)
├── robots.txt
├── sitemap.xml
│
├── app/
│   ├── bootstrap.php         # Inicialización, seguridad y carga de .env
│   ├── config/
│   │   ├── env.php           # Cargador de variables .env
│   │   └── app.php           # Configuración global
│   ├── controllers/
│   │   └── HomeController.php
│   ├── helpers/
│   │   └── functions.php     # e(), config(), view(), component(), loadJson()
│   ├── layouts/
│   │   └── main.php          # Layout HTML, SEO, OG, analytics
│   ├── components/           # Componentes reutilizables PHP
│   │   ├── site-header.php
│   │   ├── promo-bar.php
│   │   ├── navbar.php
│   │   ├── brand-logo.php
│   │   ├── hero.php
│   │   ├── comprobantes.php
│   │   ├── stats.php
│   │   ├── how-it-works.php
│   │   ├── testimonials.php
│   │   ├── cta.php
│   │   ├── footer.php
│   │   ├── mobile-cta-bar.php
│   │   └── whatsapp-float.php
│   └── views/
│       └── home.php          # Vista principal
│
├── assets/
│   ├── css/main.css
│   ├── js/main.js
│   └── img/
│       ├── logo.jpg
│       └── comprobantes/     # Imágenes de comprobantes reales
│
├── routes/
│   └── web.php               # Definición de rutas
│
└── storage/
    └── data/
        ├── comprobantes.json
        ├── testimonials.json
        ├── stats.json
        └── bendecidos.json
```

> **Importante:** El `DocumentRoot` de Apache apunta a la **raíz del proyecto**, no a una carpeta `/public`.

---

## Instalación

### 1. Clonar o subir el proyecto

```bash
cd /ruta/del/servidor
# Copiar archivos del proyecto
```

### 2. Configurar variables de entorno

```bash
cp .env.example .env
```

Editar `.env` con los valores de producción (dominio, WhatsApp, colores, analytics, etc.).

### 3. Permisos

```bash
chmod 644 .env
chmod -R 755 assets/ app/ storage/
```

### 4. Virtual Host Apache (ejemplo)

```apache
<VirtualHost *:443>
    ServerName landing.apfenix.com
    DocumentRoot /var/www/landing.apfenix.local

    <Directory /var/www/landing.apfenix.local>
        AllowOverride All
        Require all granted
    </Directory>

    SSLEngine on
    # ... certificados SSL
</VirtualHost>
```

### 5. Verificar

Abrir el dominio en el navegador. Todos los assets deben cargar por HTTPS sin errores de mixed content.

---

## Variables de entorno (`.env`)

| Variable | Descripción |
|----------|-------------|
| `APP_NAME` | Nombre interno de la aplicación |
| `APP_URL` | URL base del sitio (con HTTPS en producción) |
| `BRAND_NAME` | Nombre de marca visible |
| `BRAND_LOGO` | Ruta del logo (`/assets/img/logo.jpg`) |
| `WHATSAPP_URL` | Enlace al grupo de WhatsApp |
| `PRIMARY_COLOR` | Color principal de marca (`#2D0434`) |
| `SECONDARY_COLOR` | Color de acento (`#D4AF37`) |
| `DARK_COLOR` | Color oscuro auxiliar |
| `META_PIXEL_ID` | ID de Meta Pixel (opcional) |
| `GOOGLE_ANALYTICS_ID` | ID de Google Analytics (opcional) |
| `META_DESCRIPTION` | Meta descripción SEO |
| `META_KEYWORDS` | Palabras clave SEO |
| `CONTACT_EMAIL` | Correo de contacto |
| `CONTACT_PHONE` | Teléfono de contacto |
| `CONTACT_COUNTRY` | País |
| `DEVELOPER_NAME` | Nombre del desarrollador |
| `DEVELOPER_URL` | URL del desarrollador |
| `SOCIAL_FACEBOOK` | URL de Facebook |
| `SOCIAL_INSTAGRAM` | URL de Instagram |
| `SOCIAL_TWITTER` | URL de Twitter/X (opcional) |
| `SOCIAL_TIKTOK` | URL de TikTok (opcional) |

### Grupo de WhatsApp actual

```
https://chat.whatsapp.com/IKAj2Juo4DuFU8QrLxwkMh
```

---

## Rutas

| Ruta | Controlador | Método | Descripción |
|------|-------------|--------|-------------|
| `/` | `HomeController` | `index` | Landing principal |

Cualquier otra ruta devuelve **404**.

---

## Secciones de la landing

Orden de conversión en `app/views/home.php`:

1. **Hero** — Título, CTA principal y último comprobante destacado
2. **Comprobantes** — 5 pagos reales verificados (carrusel horizontal en móvil)
3. **Estadísticas** — Cifras de la comunidad
4. **Cómo funciona** — 3 pasos simples
5. **Testimonios** — Opiniones de participantes
6. **CTA final** — Llamado a la acción

### Elementos globales

- Barra de urgencia superior (promo bar)
- Navbar fijo con scroll spy
- Barra CTA inferior en móvil
- Botón flotante de WhatsApp
- Barra de progreso de scroll

---

## Datos dinámicos (JSON)

Los contenidos editables están en `storage/data/`:

### `comprobantes.json`

```json
{
  "image": "/assets/img/comprobantes/comprobante-01.png",
  "name": "Nombre",
  "amount": "$500.000",
  "platform": "Nequi",
  "date": "2026-06-05"
}
```

### `stats.json`

Estadísticas mostradas en la sección de números.

### `testimonials.json`

Testimonios con nombre, ciudad, texto y rating.

### `bendecidos.json`

Datos de bendecidos (componente disponible, no activo en la vista principal).

---

## Funcionalidades JavaScript

Archivo: `assets/js/main.js`

- Cálculo dinámico de altura del header fijo
- Scroll suave con offset correcto para anclas (`#comprobantes`, `#como-funciona`, etc.)
- Scroll spy — resalta la sección activa en el menú
- Barra de progreso de scroll
- Carrusel de comprobantes en móvil con puntos de navegación
- Animaciones al scroll (sin bloquear contenido)
- Tracking de clics en CTAs de WhatsApp (Meta Pixel / Google Analytics)

---

## Identidad visual

| Elemento | Valor |
|----------|-------|
| Color principal | `#2D0434` (morado AP FENIX) |
| Color acento | `#D4AF37` (dorado) |
| Tema | Claro — blanco + morado + dorado |
| Fuente | Montserrat |

---

## Seguridad

- `.env` bloqueado por `.htaccess`
- Directorios `app/`, `storage/` y `routes/` no accesibles directamente
- Archivos `.json`, `.log` y `.md` bloqueados en raíz
- Headers de seguridad: `X-Content-Type-Options`, `X-Frame-Options`, `Referrer-Policy`
- Escape HTML con helper `e()` en todas las salidas

---

## SEO

- Meta tags (title, description, keywords)
- Open Graph y Twitter Cards
- `canonical` URL
- `robots.txt` y `sitemap.xml` incluidos
- Estructura semántica HTML5 con `aria-label`

---

## Despliegue en producción

Checklist rápido:

- [ ] `APP_URL` con dominio real y HTTPS
- [ ] `WHATSAPP_URL` apuntando al grupo correcto
- [ ] Meta Pixel y Google Analytics configurados (si aplica)
- [ ] Imágenes de comprobantes subidas en `assets/img/comprobantes/`
- [ ] JSON actualizado en `storage/data/`
- [ ] SSL activo
- [ ] `mod_rewrite` habilitado
- [ ] Probar en móvil: scroll, carrusel y CTAs de WhatsApp

---

## Convenciones de contenido (Meta Ads)

**Evitar** en textos públicos: rifa, rifas, sorteo, premio, lotería, ganadores.

**Usar en su lugar:** dinámicas, participaciones, comprobantes, bendecidos, comunidad, experiencias.

---

## Licencia y autoría

**Desarrollado por [Cristian Ceballos](https://rifacloud-landing.cristianceballos.com/)**

© 2026 Cristian Ceballos. Todos los derechos reservados.

Este proyecto es propiedad intelectual de su autor. Queda prohibida su reproducción, distribución o modificación sin autorización expresa.
