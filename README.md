# 🚀 Prompt Lab | Central de Operaciones 🧠⚡

¡Bienvenido a **Prompt Lab**, una plataforma interactiva y gamificada diseñada para el aprendizaje de Inteligencia Artificial, Algoritmos y Deep Learning! El sistema combina lecciones multimedia, lecturas teóricas y una zona de juegos dinámicos para acumular puntos de experiencia (XP) y trackear el progreso del usuario con una estética puramente cyberpunk y retro-arcade.

---

## 🛠️ Tecnologías Utilizadas

* **Backend:** Laravel 10 / 11 (PHP)
* **Frontend:** Blade Templates, Tailwind CSS (vía CDN), Font Awesome (Iconos)
* **Base de Datos:** MySQL / PostgreSQL (Con soporte para tablas pivote dinámicas para el rastreo de XP)

---

## ✨ Características Principales

* **Almacén Centralizado Dinámico:** Los bancos de datos de lecciones y juegos corren de forma local y dinámica, expandiendo el límite máximo de XP automáticamente al añadir nuevos elementos.
* **Sistema de Gamificación (XP):**
    * `+40 XP` por marcar un video como aprendido (Pago único).
    * `+150 XP` por completar lecturas de profundización teórica (Pago único).
    * `+100 XP` por clics interactivos en la Zona de Juegos (Acumulable).
* **Barra de Progreso en Tiempo Real:** Calcula el porcentaje de avance general del módulo basándose en la XP máxima disponible actual.
* **Filtros de Navegación Inteligentes:** Clasificación instantánea por módulos como *IA Básica*, *Algoritmos* y *Deep Learning*.
* **Interfaz Cyberpunk:** Estructura con estilo de fibra de carbono, sombras de neón azul y animaciones pixeladas *retro-running* inspiradas en Mario Bros.

---

## 🚀 Requisitos Previos

Antes de clonar e instalar el proyecto, asegúrate de tener instalado:
* [PHP >= 8.1](https://www.php.net/)
* [Composer](https://getcomposer.org/)
* [MySQL](https://www.mysql.com/) o cualquier gestor de base de datos compatible con Laravel.

---

## 💻 Instalación y Configuración

Sigue estos pasos para levantar el entorno de desarrollo localmente:

1. **Clonar el repositorio:**
   ```bash
   git clone [https://github.com/TU_USUARIO/prompt-lab.git](https://github.com/TU_USUARIO/prompt-lab.git)
   cd prompt-lab
