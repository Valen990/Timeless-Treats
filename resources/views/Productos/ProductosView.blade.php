<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nuestros Productos</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

        <style>
            body {
                background-color: #6D0A0A; 
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .productos-header {
                background-color: #3b0a0aff;
            }

            .btn-category {
                background-color: #fff;
                border: 2px solid #3b0a0aff;
                border-radius: 50px;
                padding: 6px 18px;
                color: #3b0a0aff;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .btn-category:hover,
            .btn-category.active {
                background-color: #3b0a0aff;
                color: #fff;
            }

            /* === TARJETAS DE PRODUCTO === */
            .producto-card {
                border-radius: 15px;
                background-color: #fff;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .producto-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 16px rgba(0,0,0,0.1);
            }

            .card-img-top {
                height: 200px;
                object-fit: cover;
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;
            }

            /* === ETIQUETA DE CATEGORÍA === */
            .bg-category {
                background-color: #3b0a0aff  !important;
                font-size: 0.75rem;
            }

            /* === BOTÓN CORAZÓN === */
            .btn-heart {
                background-color: rgba(255, 255, 255, 0.9);
                border: none;
                border-radius: 50%;
                padding: 0.4rem 0.5rem;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: transform 0.3s, color 0.3s;
            }

            .btn-heart i {
                font-size: 1.2rem;
                color: #6D0A0A;
                transition: transform 0.3s ease, color 0.3s ease;
            }

            .btn-heart:hover i {
                color: #6D0A0A;
                animation: heartbeat 0.6s ease-in-out infinite;
            }

            @keyframes heartbeat {
                0%, 50%, 100% { transform: scale(1); }
                25%, 75% { transform: scale(1.2); }
            }
        </style>
    </head>
    <body>
        @include('partials.navbar')

        <section class="productos-header text-center py-5">
            <h1 class="fw-bold text-white">Nuestros Productos</h1>
            <p class="text-white-50 fs-5">Descubre nuestra exquisita selección de productos artesanales</p>
        </section>

        <div class="container my-5">

            <!-- FILTRO DE CATEGORÍAS -->
            <div class="text-center mb-4">
                <form method="GET" action="{{ route('productos') }}">
                    <div class="category-buttons d-flex flex-wrap justify-content-center gap-2">
                        <button type="submit" name="categoria" value=""
                            class="btn btn-category {{ !$categoriaID ? 'active' : '' }}">
                            Todos
                        </button>
                        @foreach ($categorias as $ct)
                            <button type="submit" name="categoria" value="{{ $ct->categoriaID }}" class="btn btn-category {{ $categoriaID == $ct->categoriaID ? 'active' : '' }}">
                                {{ $ct->nombreCategoria }}
                            </button>
                        @endforeach
                    </div>
                </form>
            </div>

            <div align="right">
                <a href="{{ route('form_reg_producto') }}" class="btn btn-success">Añadir Producto</a>
            </div>
            <br>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            <br>

            <!-- TARJETAS DE PRODUCTOS -->
            <div class="row">
                @forelse($productos as $p)
                    <div class="col-md-3 mb-4">
                        <div class="card producto-card h-100 border-0 shadow-sm">
                            <div class="position-relative">
                                <img src="{{ asset('imagenes/productos/' . $p->fotoProducto) }}"
                                    class="card-img-top" alt="{{ $p->nombreProducto }}">
                                <span class="badge bg-category position-absolute top-0 start-0 m-2">
                                    {{ $categorias->firstWhere('categoriaID', $p->categoriaID)->nombreCategoria ?? 'Sin categoría' }}
                                </span>
                                <button class="btn btn-light btn-heart position-absolute top-0 end-0 m-2" type="button">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            <div class="card-body text-center">
                                <p class="card-text mb-1"><strong>Id:</strong> {{ $p->productoID }}</p>
                                <h5 class="card-title fw-semibold">{{ $p->nombreProducto }}</h5>
                                <p class="card-text mb-1"><strong></strong> {{ $p->descripcionProducto }}</p>
                                <div class="fw-bold text-dark mb-2">${{ number_format($p->precioProducto, 0, ',', '.') }}</div>
                                <p class="card-text mb-1"><strong>Stock:</strong> {{ $p->stockProducto }}</p>
                                <br>
                                <div class="d-flex justify-content-center gap-2">
                                    <!-- ✅ PASAMOS EL ID EN LA RUTA -->
                                    <a href="{{ route('form_edi_producto', $p->productoID) }}" class="btn btn-sm btn-outline-primary">Editar</a>

                                    <!-- ✅ PASAMOS EL ID TAMBIÉN AQUÍ -->
                                    <form action="{{ route('elimina_producto', $p->productoID) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p class="text-center text-muted">No hay productos en esta categoría.</p>
                @endforelse
                </div>
            </div>

        @include('partials.footer')
    </body>
</html>