<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Timeless Treats.</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        /* ============================================
           HERO SECTION
           ============================================ */
        .hero {
            padding: 3rem 0;
        }
        .hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            margin-bottom: 3rem;
        }
        .hero-left {
            animation: slideInLeft 0.8s ease-out;
        }
        .hero-right {
            animation: slideInRight 0.8s ease-out;
        }

        /* TYPEWRITER */
        .typewriter-container {
            min-height: 100px;
            display: flex;
            align-items: center;
        }
        .typewriter-text {
            font-size: 4rem;
            font-weight: 900;
            color: var(--primary-color, #d63384);
            letter-spacing: 3px;
            min-height: 1.2em;
            font-family: 'Courier New', monospace;
            overflow: hidden;
            white-space: nowrap;
            border-right: 4px solid var(--primary-color, #d63384);
            animation: typing 3s steps(12, end), blink 0.6s infinite;
        }
        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }
        @keyframes blink {
            0%, 50% { border-right-color: var(--primary-color, #d63384); }
            51%, 100% { border-right-color: transparent; }
        }
        .hero-subtitle {
            font-size: 1.8rem;
            color: #333;
            font-weight: 300;
            letter-spacing: 2px;
            margin-top: 0.5rem;
        }

        /* CARRUSEL */
        .carousel-container {
            position: relative;
            width: 100%;
            height: 400px;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .carousel-slide {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
        }
        .carousel-slide.active {
            opacity: 1;
        }
        .carousel-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 2rem;
            transform: translateY(-50%);
            z-index: 10;
            pointer-events: none;
        }
        .carousel-btn {
            background-color: rgba(255, 255, 255, 0.7);
            color: #333;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            transition: 0.3s;
            pointer-events: all;
        }
        .carousel-btn:hover {
            background-color: var(--primary-color, #d63384);
            color: white;
            transform: scale(1.1);
        }
        .carousel-indicators {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 10;
        }
        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: 0.3s;
        }
        .indicator.active {
            background-color: var(--primary-color, #d63384);
            width: 32px;
            border-radius: 6px;
        }

        /* DESCRIPTION */
        .description-box {
            background-color: white;
            padding: 2rem;
            border-radius: 1rem;
            border-left: 5px solid var(--primary-color, #d63384);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            font-size: 1.1rem;
            line-height: 1.8;
            color: #333;
        }

        /* BOTONES */
        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        .btn {
            padding: 0.8rem 1.5rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-primary {
            background-color: var(--primary-color, #d63384);
            color: white;
        }
        .btn-primary:hover {
            background-color: #b02e6d;
        }
        .btn-secondary {
            background-color: #f3f3f3;
            color: #333;
        }
        .btn-secondary:hover {
            background-color: #ddd;
        }

        /* ABOUT */
        .about-section {
            background-color: var(--secondary-color, #f8f9fa);
            padding: 4rem 0;
            margin-top: 3rem;
        }
        .about-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        .about-card {
            text-align: center;
            padding: 2rem;
            border-radius: 1rem;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            transition: 0.3s;
        }
        .about-card:hover {
            transform: translateY(-5px);
        }
        .about-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .about-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary-color, #d63384);
        }

        /* ANIMACIONES */
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero-grid { grid-template-columns: 1fr; gap: 2rem; }
            .typewriter-text { font-size: 2.5rem; }
            .hero-subtitle { font-size: 1.2rem; }
            .carousel-container { height: 300px; }
            .hero-buttons { flex-direction: column; }
            .btn { width: 100%; text-align: center; }
        }
    </style>
</head>

<body>
    <!-- HERO SECTION -->
    <section class="hero">
        <div class="container">
            <div class="hero-grid">
                <!-- IZQUIERDA -->
                <div class="hero-left">
                    <div class="typewriter-container">
                        <h1 class="typewriter-text" id="typewriter">TIMELESS TREATS.</h1>
                    </div>
                    <p class="hero-subtitle">Modern Bakery</p>
                </div>

                <!-- DERECHA -->
                <div class="hero-right">
                    <div class="carousel-container">
                        <div class="carousel-slide active"><img src="{{ asset('imagenes/productos/cheescake_maracuya.jpg') }}" alt=""></div>
                        <div class="carousel-slide"><img src="{{ asset('imagenes/productos/croissant.jpg') }}" alt=""></div>
                        <div class="carousel-slide"><img src="{{ asset('imagenes/productos/cupcake_redvelvet.jpg') }}" alt=""></div>
                        <div class="carousel-slide"><img src="{{ asset('imagenes/productos/cupcake_vainilla.jpg') }}" alt=""></div>
                        <div class="carousel-slide"><img src="{{ asset('imagenes/productos/flan_napolitano.jpg') }}" alt=""></div>
                        <div class="carousel-slide"><img src="{{ asset('imagenes/productos/galletas_chispas.jpg') }}" alt=""></div>
                        <div class="carousel-slide"><img src="{{ asset('imagenes/productos/torta_chocolate.jpg') }}" alt=""></div>
                        <div class="carousel-slide"><img src="{{ asset('imagenes/productos/torta_tresleches.jpg') }}" alt=""></div>
                    </div>

                    <!-- Controles -->
                    <div class="carousel-controls">
                        <button class="carousel-btn prev" onclick="prevSlide()">❮</button>
                        <button class="carousel-btn next" onclick="nextSlide()">❯</button>
                    </div>

                    <!-- Indicadores -->
                    <div class="carousel-indicators">
                        <span class="indicator active" onclick="currentSlide(0)"></span>
                        <span class="indicator" onclick="currentSlide(1)"></span>
                        <span class="indicator" onclick="currentSlide(2)"></span>
                        <span class="indicator" onclick="currentSlide(3)"></span>
                    </div>
                </div>
            </div>

            <!-- Descripción -->
            <div class="description-box">
                <p>Descubre nuestros productos artesanales elaborados con ingredientes de la más alta calidad. Cada creación es una obra maestra de sabor y diseño, perfecta para cualquier ocasión.</p>
            </div>

            <!-- Botones -->
            <div class="hero-buttons">
                <a href="{{ route('productos') }}" class="btn btn-primary">Ver Productos</a>
                <a href="{{ route('categorias') }}" class="btn btn-secondary">Explorar Categorías</a>
            </div>
        </div>
    </section>

    <!-- SOBRE NOSOTROS -->
    <section class="about-section">
        <div class="container">
            <h2 class="section-title">Sobre Nosotros</h2>
            <div class="about-grid">
                <div class="about-card">
                    <div class="about-icon">🎂</div>
                    <h3>Tradición Moderna</h3>
                    <p>Combinamos recetas clásicas con técnicas contemporáneas para crear experiencias gustativas únicas.</p>
                </div>
                <div class="about-card">
                    <div class="about-icon">✨</div>
                    <h3>Calidad Premium</h3>
                    <p>Solo utilizamos ingredientes frescos y de alta calidad seleccionados cuidadosamente.</p>
                </div>
                <div class="about-card">
                    <div class="about-icon">💝</div>
                    <h3>Hecho con Amor</h3>
                    <p>Cada producto es creado con dedicación y pasión por nuestro equipo experto.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        let currentSlideIndex = 0;

        function showSlide(n) {
            const slides = document.querySelectorAll('.carousel-slide');
            const indicators = document.querySelectorAll('.indicator');

            if (n >= slides.length) currentSlideIndex = 0;
            if (n < 0) currentSlideIndex = slides.length - 1;

            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(ind => ind.classList.remove('active'));

            slides[currentSlideIndex].classList.add('active');
            indicators[currentSlideIndex].classList.add('active');
        }

        function nextSlide() {
            currentSlideIndex++;
            showSlide(currentSlideIndex);
        }

        function prevSlide() {
            currentSlideIndex--;
            showSlide(currentSlideIndex);
        }

        function currentSlide(n) {
            currentSlideIndex = n;
            showSlide(currentSlideIndex);
        }

        setInterval(nextSlide, 5000);
        showSlide(currentSlideIndex);
    </script>
</body>
</html>
