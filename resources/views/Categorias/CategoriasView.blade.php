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
    @include('partials.navbar')

    <style>
    /* ============================================
       SECCIÓN CATEGORÍAS
       ============================================ */
    .categories-section {
        padding: 3rem 0;
        background-color:  #3b0a1e;
    }

    h1.section-title {
        color: #EFD9A1;
    }

    /* ============================================
       ESTADÍSTICAS
       ============================================ */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
        margin-top: 3rem;
    }

    .stat-card {
        text-align: center;
        padding: 2rem;
        background-color: #EFD9A1;
        /*background: linear-gradient(135deg, var(--primary-color), #d66a48);*/
        color:  #3b0a1e;
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

    /* ============================================
       GRID CATEGORÍAS
       ============================================ */
    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    /* ============================================
       TARJETA CATEGORÍA
       ============================================ */
    .category-card {
        background-color: white;
        border-radius: 1rem;
        padding: 2rem;
        text-align: center;
        box-shadow: var(--shadow);
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        border: 2px solid transparent;
    }

    .category-card:hover {
        transform: translateY(-8px);
        border-color: var(--primary-color);
        box-shadow: 0 8px 25px rgba(224, 120, 86, 0.2);
    }

    .category-icon {
        font-size: 3.5rem;
        margin-bottom: 1rem;
        animation: float 3s ease-in-out infinite;
    }

    .category-card h3 {
        font-size: 1.5rem;
        margin-bottom: 0.75rem;
        color: var(--text-dark);
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
        color: var(--primary-color);
        font-weight: 600;
        transition: var(--transition);
        padding: 0.75rem 1.5rem;
        border: 2px solid var(--primary-color);
        border-radius: 0.5rem;
        display: inline-block;
    }

    .category-link:hover {
        background-color: var(--primary-color);
        color: white;
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
        color: #EFD9A1;
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
        background-color: rgba(224, 120, 86, 0.1);
        background-color: grey;
    }

    .promo-card.accent {
        background-color: rgba(245, 220, 200, 0.1);
        background-color: grey;
    }

    .promo-card.secondary {
        background-color: rgba(255, 255, 255, 0.05);
        background-color: grey;
    }

    .promo-card h4 {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: var(--primary-color);
    }

    .promo-card p {
        font-size: 0.9rem;
        opacity: 0.9;
        margin-bottom: 1rem;
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

<section class="categories-section">
    <div class="container">
        <h1 class="section-title">Categorías de Productos</h1>

        <!-- Estadísticas -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number">8</div>
                <div class="stat-label">Categorías</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">50+</div>
                <div class="stat-label">Productos</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">100%</div>
                <div class="stat-label">Artesanal</div>
            </div>
        </div>

        <!-- Grid de Categorías -->
        <div class="categories-grid">
            <!-- Categoría 1 -->
            <div class="category-card">
                <div class="category-icon">🧁</div>
                <h3>Cupcakes</h3>
                <p class="category-desc">Cupcakes esponjosos con frosting cremoso en diferentes sabores</p>
                <span class="product-count">12 productos</span>
                <a href="#" class="category-link">Ver Productos →</a>
            </div>

            <!-- Categoría 2 -->
            <div class="category-card">
                <div class="category-icon">🎂</div>
                <h3>Pasteles</h3>
                <p class="category-desc">Pasteles artesanales hechos con ingredientes premium</p>
                <span class="product-count">8 productos</span>
                <a href="#" class="category-link">Ver Productos →</a>
            </div>

            <!-- Categoría 3 -->
            <div class="category-card">
                <div class="category-icon">🥐</div>
                <h3>Pasteles Franceses</h3>
                <p class="category-desc">Croissants, éclairs y otras delicias de la pastelería francesa</p>
                <span class="product-count">10 productos</span>
                <a href="#" class="category-link">Ver Productos →</a>
            </div>

            <!-- Categoría 4 -->
            <div class="category-card">
                <div class="category-icon">🍩</div>
                <h3>Donas</h3>
                <p class="category-desc">Donas caseras frescas y deliciosas en múltiples sabores</p>
                <span class="product-count">6 productos</span>
                <a href="#" class="category-link">Ver Productos →</a>
            </div>

            <!-- Categoría 5 -->
            <div class="category-card">
                <div class="category-icon">🍪</div>
                <h3>Galletas</h3>
                <p class="category-desc">Galletas caseras crujientes y suaves de diversos tipos</p>
                <span class="product-count">9 productos</span>
                <a href="#" class="category-link">Ver Productos →</a>
            </div>

            <!-- Categoría 6 -->
            <div class="category-card">
                <div class="category-icon">🧁</div>
                <h3>Postres Especiales</h3>
                <p class="category-desc">Creaciones especiales y ediciones limitadas</p>
                <span class="product-count">5 productos</span>
                <a href="#" class="category-link">Ver Productos →</a>
            </div>

            <!-- Categoría 7 -->
            <div class="category-card">
                <div class="category-icon">🎁</div>
                <h3>Cajas Presentes</h3>
                <p class="category-desc">Cajas surtidas perfectas para regalos especiales</p>
                <span class="product-count">7 productos</span>
                <a href="#" class="category-link">Ver Productos →</a>
            </div>

            <!-- Categoría 8 -->
            <div class="category-card">
                <div class="category-icon">🍰</div>
                <h3>Pedidos Personalizados</h3>
                <p class="category-desc">Crea tu propio pastel personalizado para cualquier ocasión</p>
                <span class="product-count">Consulta disponibilidad</span>
                <a href="#" class="category-link">Solicitar Presupuesto →</a>
            </div>
        </div>

        <!-- Sección Destacada -->
        <section class="featured-section">
            <h2>Promociones Especiales</h2>
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
    </div>
</section>

    @include('partials.footer')
</body>
</html>