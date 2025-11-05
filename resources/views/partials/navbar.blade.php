<style>
    .navbar {
        background-color: #870A0A;
        border-bottom: 1px solid #870A0A;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .navbar-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 1rem 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .navbar-logo {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        text-decoration: none;
    }

    .navbar-logo-circle {
        width: 42px;
        height: 42px;
        background-color: #870A0A;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .navbar-logo-text {
        font-weight: 700;
        color: #F0AEA1;
        font-size: 1.1rem;
        letter-spacing: 1px;
    }
    
    .navbar-logo-circle {
        width: 50px;       /* tamaño del contenedor */
        height: 50px;
        border-radius: 50%; /* círculo */
        overflow: hidden;   /* recorta cualquier parte que sobresalga */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .navbar-logo-circle img.navbar-logo {
        width: 80%;         /* la imagen ocupará el 80% del contenedor */
        height: auto;       /* mantiene proporción */
        object-fit: contain; /* asegura que no se deforme */
    }

    .navbar-links {
        display: flex;
        gap: 2rem;
    }

    .navbar-links a {
        color: #F0AEA1;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s;
    }

    .navbar-links a:hover {
        color: #d63384;
    }

    /*Esto funcionó para que no se moviera el estilo al chocar con otros de otras páginas */
    .navbar {
        text-align: left !important;
    }

    .navbar-container {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        width: 100% !important;
    }
</style>

<nav class="navbar">
    <style>
        .navbar {
            background-color: #EFD9A1;
            border-bottom: 1px solid #f3f3f3;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
        }

        .navbar-logo-circle {
            width: 42px;
            height: 42px;
            background-color: #C3382B;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .navbar-logo-text {
            font-weight: 700;
            color: #6D0A0A;
            font-size: 1.1rem;
            letter-spacing: 1px;
        }

        .navbar-links {
            display: flex;
            gap: 2rem;
        }

        .navbar-links a {
            color: #6D0A0A;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .navbar-links a:hover {
            color: #d63384;
        }
    </style>

    <div class="navbar-container">
        <a href="/dashboard" class="navbar-logo">
            <div class="navbar-logo-circle">
                <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo" class="navbar-logo">
            </div>
            <span class="navbar-logo-text">Timeless Treats</span>
        </a>

        <div class="navbar-links">
            <a href="{{ route('productos') }}">Productos</a>
            <a href="{{ route('categorias') }}">Categorías</a>
            <a href="{{ route('clientes') }}">Clientes</a>
            <a href="{{ route('compras') }}">🛒 Compras</a>
        </div>
    </div>
</nav>
