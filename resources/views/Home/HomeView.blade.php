<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenido - Timeless Treats</title>
        
        <style>
            .hero {
                padding: 3rem 0;
                background: #F0AEA1  ;/*linear-gradient(135deg, #fff5f7 0%, #fff 100%);*/
                min-height: 80vh;
                display: flex;
                align-items: center;
            }

            .hero-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 4rem;
                align-items: start;
            }

            /* IZQUIERDA - CARRUSEL COMPLETO */
            .hero-left {
                animation: slideInLeft 0.8s ease-out;
                display: flex;
                flex-direction: column;
            }

            .hero-right {
                animation: slideInRight 0.8s ease-out;
            }

            /* CARRUSEL CON IMÁGENES NÍTIDAS */
            .carousel-container {
                position: relative;
                width: 100%;
                height: 450px;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            }

            .carousel-slide {
                position: absolute;
                width: 100%;
                height: 100%;
                opacity: 0;
                transition: opacity 0.8s ease-in-out;
            }

            .carousel-slide.active {
                opacity: 1;
            }

            .carousel-slide img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                image-rendering: -webkit-optimize-contrast;
                image-rendering: crisp-edges;
                image-rendering: high-quality;
                filter: brightness(1.02) contrast(1.05);
            }

            /* CONTROLES DEL CARRUSEL DEBAJO */
            .carousel-bottom-controls {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 1rem;
                margin-top: 1.5rem;
            }

            .carousel-btn {
                background-color: rgba(255, 255, 255, 0.9);
                color: #870A0A ;
                border: none;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                font-size: 1.4rem;
                cursor: pointer;
                transition: 0.3s;
                box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .carousel-btn:hover {
                background-color: #870A0A ;
                color: white;
                transform: scale(1.1);
            }

            /* DERECHA - CAJA BLANCA CON CONTENIDO Y BOTONES */
            .hero-content-box {
                background: white;
                padding: 3rem;
                border-radius: 15px;
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
                height: fit-content;
                position: relative;
            }

            /* EFECTO MÁQUINA DE ESCRIBIR PERMANENTE */
            .typewriter-container {
                min-height: 100px;
                display: flex;
                align-items: center;
                margin-bottom: 1rem;
            }

            .typewriter-text {
                font-size: 3.2rem;
                font-weight: 800;
                color: #870A0A ;
                letter-spacing: 2px;
                min-height: 1.2em;
                font-family: 'Georgia', serif;
                overflow: hidden;
                white-space: nowrap;
                border-right: 3px solid #870A0A ;
                animation: typing 2.5s steps(15, end) forwards, blink 0.8s infinite;
                width: 0;
            }

            @keyframes typing {
                from {
                    width: 0;
                }

                to {
                    width: 100%;
                }
            }

            @keyframes blink {

                0%,
                50% {
                    border-right-color: #870A0A ;
                }

                51%,
                100% {
                    border-right-color: transparent;
                }
            }

            .hero-subtitle {
                font-size: 1.4rem;
                color: #666;
                font-weight: 400;
                letter-spacing: 1px;
                margin-bottom: 2rem;
                font-style: italic;
            }

            /* DESCRIPCIÓN DENTRO DE LA CAJA */
            .description-box {
                background-color: transparent;
                padding: 0;
                margin-bottom: 2.5rem;
                font-size: 1.1rem;
                line-height: 1.7;
                color: grey;
                text-align: left;
                border-left: 3px solid #f8d7e6;
                padding-left: 1.5rem;
            }

            /* BOTONES DE ACCIÓN EN LA CAJA DERECHA */
            .hero-buttons {
                display: flex;
                gap: 1.2rem;
                justify-content: flex-start;
                flex-wrap: wrap;
                margin-top: 2rem;
            }

            .btn {
                padding: 0.9rem 2rem;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 600;
                transition: 0.3s;
                display: inline-block;
                font-size: 1rem;
                letter-spacing: 0.5px;
                text-align: center;
                min-width: 160px;
            }

            .btn-primary {
                background-color: #C2602B;
                color: white;
                border: 2px solid #C2602B;
            }

            .btn-primary:hover {
                background-color: #870A0A ;
                border-color: #870A0A ;
                transform: translateY(-2px);
                box-shadow: 0 6px 12px rgba(214, 51, 132, 0.3);
            }

            .btn-secondary {
                background-color: transparent;
                color: #870A0A ;
                border: 2px solid #870A0A ;
            }

            .btn-secondary:hover {
                background-color: #C2602B;
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 6px 12px rgba(214, 51, 132, 0.3);
            }

            /* ABOUT SECTION */
            .about-section {
                background-color: #C2602B;
                padding: 4rem 0;
                margin-top: 3rem;
                border-top: 1px solid #eee;
            }

            .section-title {
                text-align: center;
                font-size: 2.2rem;
                margin-bottom: 3rem;
                color: #870A0A ;
                font-weight: 700;
                position: relative;
            }

            .section-title:after {
                content: '';
                display: block;
                width: 60px;
                height: 3px;
                background-color: #870A0A ;
                margin: 0.5rem auto;
            }

            .about-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 2.5rem;
            }

            .about-card {
                text-align: center;
                padding: 2.5rem 1.5rem;
                border-radius: 12px;
                background-color: white;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
                transition: 0.3s;
            }

            .about-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            }

            .about-icon {
                font-size: 3.5rem;
                margin-bottom: 1.5rem;
            }

            .about-card h3 {
                font-size: 1.5rem;
                margin-bottom: 1rem;
                color: #870A0A ;
                font-weight: 600;
            }

            .about-card p {
                color: #666;
                line-height: 1.6;
            }

            /* ANIMACIONES */
            @keyframes slideInLeft {
                from {
                    opacity: 0;
                    transform: translateX(-50px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes slideInRight {
                from {
                    opacity: 0;
                    transform: translateX(50px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            /* RESPONSIVE */
            @media (max-width: 968px) {
                .hero-grid {
                    grid-template-columns: 1fr;
                    gap: 3rem;
                }

                .hero-content-box {
                    order: -1;
                    margin-bottom: 1rem;
                }

                .typewriter-text {
                    font-size: 2.8rem;
                    text-align: center;
                }

                .hero-subtitle {
                    font-size: 1.3rem;
                    text-align: center;
                }

                .description-box {
                    text-align: center;
                    border-left: none;
                    border-top: 3px solid #f8d7e6;
                    padding-left: 0;
                    padding-top: 1rem;
                }

                .hero-buttons {
                    justify-content: center;
                }

                .carousel-container {
                    height: 350px;
                }
            }

            @media (max-width: 768px) {
                .hero-content-box {
                    padding: 2rem 1.5rem;
                }

                .typewriter-text {
                    font-size: 2.2rem;
                }

                .hero-subtitle {
                    font-size: 1.1rem;
                }

                .hero-buttons {
                    flex-direction: column;
                    align-items: center;
                }

                .btn {
                    width: 100%;
                    max-width: 250px;
                }

                .carousel-container {
                    height: 300px;
                }

                .section-title {
                    font-size: 1.8rem;
                }
            }

            /* ESTILOS GLOBALES */
            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1.5rem;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: #333;
                line-height: 1.6;
                margin: 0;
                padding: 0;
            }
        </style>
    </head>

    <body>
        @include('partials.navbar')
        <section class="hero">
            <div class="container">
                <div class="hero-grid">
                    <!-- IZQUIERDA - CARRUSEL COMPLETO -->
                    <div class="hero-left">
                        <!-- Carrusel -->
                        <div class="carousel-container">
                            <div class="carousel-slide active">
                                <img src="{{ asset('imagenes/productos/cheescake_maracuya.jpg') }}" alt="Cheesecake de Maracuyá">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('imagenes/productos/croissant.jpg') }}" alt="Croissant">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('imagenes/productos/cupcake_redvelvet.jpg') }}" alt="Cupcake Red Velvet">
                            </div>
                            <div class="carousel-slide">
                                <img src="{{ asset('imagenes/productos/cupcake_vainilla.jpg') }}" alt="Cupcake de Vainilla">
                            </div>
                        </div>

                        <!-- Controles del carrusel debajo -->
                        <div class="carousel-bottom-controls">
                            <button class="carousel-btn prev" onclick="prevSlide()">❮</button>
                            <button class="carousel-btn next" onclick="nextSlide()">❯</button>
                        </div>
                    </div>

                    <!-- DERECHA - CONTENIDO EN CAJA BLANCA CON BOTONES -->
                    <div class="hero-right">
                        <div class="hero-content-box">
                            <div class="typewriter-container">
                                <h1 class="typewriter-text" id="typewriter">TIMELESS TREATS.</h1>
                            </div>
                            <p class="hero-subtitle">Modern Bakery</p>
                            
                            <!-- Descripción -->
                            <div class="description-box">
                                <p>Descubre nuestros productos artesanales elaborados con ingredientes de la más alta calidad. Cada creación es una obra maestra de sabor y diseño, perfecta para cualquier ocasión.</p>
                            </div>

                            <!-- Botones de acción -->
                            <div class="hero-buttons">
                                <a href="{{ route('productos') }}" class="btn btn-primary">Ver Productos</a>
                                <a href="{{ route('categorias') }}" class="btn btn-secondary">Explorar Categorías</a>
                            </div>
                        </div>
                    </div>
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

        @include('partials.footer')

        <script>
            let currentSlideIndex = 0;

            function showSlide(n) {
                const slides = document.querySelectorAll('.carousel-slide');

                if (n >= slides.length) currentSlideIndex = 0;
                if (n < 0) currentSlideIndex = slides.length - 1;

                slides.forEach(slide => slide.classList.remove('active'));
                slides[currentSlideIndex].classList.add('active');
            }

            function nextSlide() {
                currentSlideIndex++;
                showSlide(currentSlideIndex);
            }

            function prevSlide() {
                currentSlideIndex--;
                showSlide(currentSlideIndex);
            }

            setInterval(nextSlide, 5000);
            showSlide(currentSlideIndex);
        </script>
    </body>
</html>