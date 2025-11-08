<style>
    /* ======== NAVBAR PRINCIPAL ======== */
    .navbar {
        background-color: #EFD9A1;
        border-bottom: 1px solid #870A0A;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);

        /* 🔹 Altura fija y alineación vertical */
        height: 70px;
        display: flex;
        align-items: center;
    }

    /* ======== CONTENEDOR CENTRAL ======== */
    .navbar-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem; /* 🔹 sin padding vertical */
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    /* ======== LOGO ======== */
    .navbar-logo {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        text-decoration: none;
    }

    /* Contenedor del ícono */
    .navbar-logo-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Imagen dentro del círculo */
    .navbar-logo-circle img.navbar-logo-img {
        width: 80%;
        height: auto;
        object-fit: contain;
    }

    /* Texto del logo */
    .navbar-logo-text {
        font-weight: 700;
        color: #6D0A0A;
        font-size: 1.1rem;
        letter-spacing: 1px;
        margin: 0;
    }

    /* ======== ENLACES ======== */
    .navbar-links {
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    /* Enlaces normales */
    .navbar-links a {
        color: #6D0A0A;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s, font-weight 0.3s;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    /* Hover */
    .navbar-links a:hover {
        color: #6D0A0A;
        font-weight: 700;
    }

    /* ======== RESPONSIVE ======== */
    @media (max-width: 768px) {
        .navbar-container {
            flex-direction: column;
            gap: 0.8rem;
            height: auto;
            padding: 0.5rem 1rem;
        }

        .navbar-links {
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }
    }
</style>

<nav class="navbar">
    <div class="navbar-container">
        <a href="/dashboard" class="navbar-logo">
            <div class="navbar-logo-circle">
                <img src="{{ asset('imagenes/logo1.png') }}" alt="Logo" class="navbar-logo-img">
            </div>
            <p class="navbar-logo-text">Timeless Treats</p>
        </a>

        <div class="navbar-links">
            <a href="{{ route('productos') }}">Productos</a>
            <a href="{{ route('categorias') }}">Categorías</a>
            <a href="{{ route('clientes') }}">Clientes</a>
            <a href="{{ route('compras') }}">🛒 Compras</a>
        </div>
    </div>
</nav>
