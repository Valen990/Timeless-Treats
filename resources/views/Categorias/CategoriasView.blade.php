<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestras categorías</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</head>
<body>

    <style>
    /* ============================================
       SECCIÓN CATEGORÍAS
       ============================================ */
    section.categorias-header {
        background-color: #3b0a0aff;    
    }

    .categories-section{
        background-color: #6D0A0A;
        overflow: hidden;
    }

    div.container{
        
        background-color: #6D0A0A;
    }

    /* ============================================
       ESTADÍSTICAS
       ============================================ */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
        margin-top: 2rem;
    }

    .stat-card {
        text-align: center;
        padding: 2rem;
        background-color: rgba(219, 204, 204, 0.14);
        /*background: linear-gradient(135deg, var(--primary-color), #d66a48);*/
        color: #EFD9A1;
        border-radius: 1rem;
        box-shadow: var(--shadow);
        transition: var(--transition);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(224, 120, 86, 0.3);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 900;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 0.95rem;
        opacity: 0.9;
        font-weight: 500;
    }

    .btn-añadir-cat{
        background-color: #3b0a0aff;
        text-decoration: none;
        color: white;
        padding: 0.9rem;
        border-radius: 10px;
        border: 1px solid white;
        box-shadow: 0 8px 20px rgba(224, 120, 86, 0.3);
    }

    .btn-añadir-cat:hover{
        font-weight: 600;
    }

    /* ============================================
       GRID CATEGORÍAS
       ============================================ */
    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
        justify-items: center; /* Centra horizontalmente las tarjetas */
        align-items: start;
    }

    /* ============================================
       TARJETA CATEGORÍA
       ============================================ */
    .category-card {
        height: 300px;/* define el alto que quieras */
        width: 100%;
        background-color: #EFD9A1;
        color: #4a0f0f;
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        //max-width: 280px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s ease;
    }

    .category-card:hover {
        transform: translateY(-5px);
    }

    .category-icon {
        font-size: 3.5rem;
        margin-bottom: 1rem;
        animation: float 3s ease-in-out infinite;
    }

    .category-card h3 { 
        font-size: 1.5rem;
        margin-bottom: 0.75rem;
        color: #3b0a0aff;
    }

    p.category-desc{
        color: #3b0a0aff;
    }

    span.product-count{
        color: #3b0a0aff;
    }

    .category-desc {
        color: #666;
        margin-bottom: 1rem;
        font-size: 0.95rem;
        line-height: 1.6;
        flex-grow: 1;
    }

    .product-count {
        display: inline-block;
        background-color: var(--accent-color);
        color: var(--text-dark);
        padding: 0.5rem 1rem;
        border-radius: 2rem;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .category-link {
        color: #3b0a0aff;
        transition: var(--transition);
        //padding: 0.75rem 1.5rem;
        //border: 2px solid var(--primary-color);
        //border-radius: 0.5rem;
        display: inline-block;
    }

    .category-link:hover {
        background-color: var(--primary-color);
        color: #6D0A0A;
        font-weight: 600;
    }

    /* ============================================
       SECCIÓN PROMOCIONES
       ============================================ */
    .featured-section {
        margin-top: 4rem;
        padding: 3rem 2rem;
        background-color: var(--secondary-color);
        color: var(--text-light);
        border-radius: 1rem;
        text-align: center;
    }

    .featured-section h2 {
        font-size: 2rem;
        margin-bottom: 2rem;
        color: white;
    }

    .featured-section h2:hover{
        font-weight: 700;
    }

    .promo-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
    }

    .promo-card {
        padding: 2rem;
        border-radius: 1rem;
        border: 2px solid rgba(255, 255, 255, 0.2);
        transition: var(--transition);
    }

    .promo-card:hover {
        transform: scale(1.05);
        border-color: rgba(255, 255, 255, 0.5);
    }

    .promo-card.primary {
        background-color: #3b0a0aff;
    }

    .promo-card.accent {
        background-color: #3b0a0aff;
    }

    .promo-card.secondary {
        background-color: #3b0a0aff;
    }

    .promo-card h4 {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: white;
    }

    .promo-card p {
        font-size: 0.9rem;
        opacity: 0.9;
        margin-bottom: 1rem;
        color: white; 
    }

    .promo-code {
        display: inline-block;
        background-color: var(--primary-color);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        font-weight: 700;
        letter-spacing: 1px;
        font-size: 0.85rem;
    }

    /* ============================================
       ANIMACIONES
       ============================================ */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 768px) {
        .categories-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .stats-container {
            gap: 1rem;
        }

        .category-icon {
            font-size: 2.5rem;
        }

        .featured-section {
            padding: 2rem 1rem;
        }

        .promo-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

@include('partials.navbar')
<section class="categorias-header text-center py-5">
    <h1 class="fw-bold text-white">Categorías de Productos</h1>
</section>
<section class="categories-section">
    <div class="container">

        <!-- Estadísticas -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number">{{$totalCategorias}}</div>
                <div class="stat-label">Categorías</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{$totalProductos}}</div>
                <div class="stat-label">Productos</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">100%</div>
                <div class="stat-label">Artesanal</div>
            </div>
        </div>

        <div align="right">
            <a href="{{route('form_reg_categoria')}}" class="btn-añadir-cat">Añadir Categoria</a>
        </div><br><br>

        <!-- Después de registrar una nueva categoría muestra un mensaje si se registró correctamente o no -->
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

        <!-- Grid de Categorías -->

        <div class="categories-grid">
        @foreach($categorias as $c)
            <div class="category-card">
                <p>{{$c->categoriaID}}</p>
                <h3>{{$c->nombreCategoria}}</h3>
                <p class="category-desc">{{$c->descripcionCategoria}}</p>
                <a href="{{route('productos')}}" class="category-link">Ver Productos →</a><br><br>

                <div class="d-flex justify-content-center gap-2">
                <!-- ✅ PASAMOS EL ID EN LA RUTA -->
                <a href="{{ route('form_edi_categoria', $c->categoriaID) }}" class="btn btn-sm btn-outline-primary">Editar</a>

                <!-- ✅ PASAMOS EL ID TAMBIÉN AQUÍ -->
                <form action="{{ route('elimina_categoria', $c->categoriaID) }}" method="POST" onsubmit="return confirm('¿Eliminar esta categoria?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach
        <!-- Sección Destacada -->
    </div>
    <section class="featured-section">
            <h2>¡Promociones Especiales!</h2>
            <div class="promo-grid">
                <div class="promo-card primary">
                    <h4>Compra 3, Lleva 4</h4>
                    <p>En cupcakes seleccionados</p>
                    <span class="promo-code">PROMO3x4</span>
                </div>
                <div class="promo-card accent">
                    <h4>Descuento del 20%</h4>
                    <p>En cajas presentes</p>
                    <span class="promo-code">REGALO20</span>
                </div>
                <div class="promo-card secondary">
                    <h4>Entrega Gratis</h4>
                    <p>En pedidos mayores a $50</p>
                    <span class="promo-code">ENVIO50</span>
                </div>
            </div>
        </section>
</section>

    @include('partials.footer')
</body>
</html>