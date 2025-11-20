<style>
    footer {
    background-color: #EFD9A1;
    color: #6D0A0A;
    padding: 3rem 2rem 1.5rem;
    font-family: 'Segoe UI', sans-serif;
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 2.5rem;
    }

    .footer-section h3 {
        color: #6D0A0A;
        margin-bottom: 1rem;
        font-weight: 600;
        font-size: 1.2rem;
    }

    .footer-section a {
        color: #3b0a1e;
        text-decoration: none;
        display: block;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        transition: color 0.3s;
    }

    .footer-section a:hover {
        color: #6D0A0A;
        font-weight: bold;
    }

    .footer-bottom {
        border-top: 1px solid rgba(255,255,255,0.1);
        margin-top: 2rem;
        padding-top: 1rem;
        text-align: center;
        font-size: 0.9rem;
        color: #3b0a1e
    }

    .footer-bottom a {
        color: #3b0a1e;
        text-decoration: none;
        margin: 0 0.5rem;
    }

   .footer-bottom a:hover {
    text-decoration: underline;
    }
</style>

<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>Timeless Treats</h3>
            <p>Artesanía, calidad y tradición en cada bocado.</p>
        </div>

        <div class="footer-section">
            <h3>Navegación</h3>
            <a href="{{ route('productos') }}">Productos</a>
            <a href="{{ route('categorias') }}">Categorías</a>
            <a href="{{ route('clientes') }}">Clientes</a>
            <a href="{{ route('compras.index') }}">Mis Compras</a>
        </div>

        <div class="footer-section">
            <h3>Información</h3>
            <p>📧 info@timelesstreats.com</p>
            <p>📞 +1 (555) 123-4567</p>
            <p>📍 123 Baker Street</p>
        </div>

        <div class="footer-section">
            <h3>Horarios</h3>
            <p>Lunes - Viernes: 7am – 8pm</p>
            <p>Sábado: 8am – 9pm</p>
            <p>Domingo: 8am – 6pm</p>
        </div>
    </div>

    <div class="footer-bottom">
        © 2025 Timeless Treats. Modern Bakery. Todos los derechos reservados.  
        <a href="#">Privacidad</a> ·
        <a href="#">Términos</a> ·
        <a href="#">Contacto</a>
    </div>
</footer>
