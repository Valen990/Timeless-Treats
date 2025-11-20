<style>
    /* ======== NAVBAR PRINCIPAL ======== */
    .navbar {
        background-color: #EFD9A1;
        border-bottom: 1px solid #870A0A;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        height: 70px;
        display: flex;
        align-items: center;
    }

    /* ======== CONTENEDOR CENTRAL ======== */
    .navbar-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
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

    .navbar-logo-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .navbar-logo-circle img.navbar-logo-img {
        width: 80%;
        height: auto;
        object-fit: contain;
    }

    .navbar-logo-text {
        font-weight: 700;
        color: #6D0A0A;
        font-size: 1.1rem;
        letter-spacing: 1px;
        margin: 0;
    }

    /* ======== ENLACES + BOTÓN ======== */
    .navbar-menu {
        display: flex;
        align-items: center;
        gap: 1.5rem; /* 🔹 controla la distancia entre los links y el botón */
    }

    .navbar-links {
        display: flex;
        align-items: center;
        gap: 1.2rem; /* 🔹 menor separación entre los enlaces */
    }

    .navbar-links a {
        color: #6D0A0A;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s, font-weight 0.3s;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .navbar-links a:hover {
        color: #3b0a0a;
        font-weight: 700;
    }

    /* ======== BOTÓN CERRAR SESIÓN ======== */
    .logout-btn {
        background-color: #a82c2c !important;
        color: white;
        border: 2px solid transparent !important;
        padding: 6px 14px !important;
        border-radius: 6px !important;
        cursor: pointer !important;
        font-weight: 500 !important;
        font-size: 0.9rem !important;
        line-height: 1.2 !important;
    }

    .logout-btn:hover {
        border-color: #3b0a0aff; /* borde color crema */
        color: #EFD9A1; /* texto crema */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        //font-weight: 700;
    }

    /* ======== RESPONSIVE ======== */
    @media (max-width: 768px) {
        .navbar-container {
            flex-direction: column;
            gap: 0.8rem;
            height: auto;
            padding: 0.5rem 1rem;
        }

        .navbar-menu {
            flex-direction: column;
            gap: 0.8rem;
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
        <!-- LOGO -->
        <a href="/dashboard" class="navbar-logo">
            <div class="navbar-logo-circle">
                <img src="{{ asset('imagenes/logo1.png') }}" alt="Logo" class="navbar-logo-img">
            </div>
            <p class="navbar-logo-text">Timeless Treats</p>
        </a>

        <!-- ENLACES + CERRAR SESIÓN -->
        <div class="navbar-menu">
            <div class="navbar-links">
                <a href="{{ route('productos') }}">Productos</a>
                <a href="{{ route('categorias') }}">Categorías</a>
                <a href="{{ route('clientes') }}">Clientes</a>
                <a href="{{ route('favoritos') }}">❤️ Favoritos</a>
                <a href="{{ route('compras') }}">🛒 Compras</a>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Cerrar sesión</button>
            </form>
        </div>
    </div>
</nav>
