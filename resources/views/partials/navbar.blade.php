<nav class="navbar">
    <style>
        .navbar {
            background-color: #3b0a1e;
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
            background-color: #d63384;
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
            color: #8b2c5f;
            font-size: 1.1rem;
            letter-spacing: 1px;
        }

        .navbar-links {
            display: flex;
            gap: 2rem;
        }

        .navbar-links a {
            color: #f3f3f3;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .navbar-links a:hover {
            color: #d63384;
        }
    </style>

    <div class="navbar-container">
        <a href="/inicio" class="navbar-logo">
            <div class="navbar-logo-circle">S</div>
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
