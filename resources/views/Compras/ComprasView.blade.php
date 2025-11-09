<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestras compras</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</head>
<body>
    @include('partials.navbar')

<style>
    /* ============================================
       SECCIÓN COMPRAS
       ============================================ */
    .orders-section {
        padding: 3rem 0;
        background-color:  #3b0a1e;
    }

    h1.section-title{
        color: #EFD9A1;
    }

    /* ============================================
       ESTADÍSTICAS COMPRAS
       ============================================ */
    .orders-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
        margin-top: 2rem;
    }

    .stat-box {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        background-color: white;
        padding: 1.5rem;
        border-radius: 1rem;
        box-shadow: var(--shadow);
        border-left: 4px solid var(--primary-color);
        transition: var(--transition);
    }

    .stat-box:hover {
        transform: translateX(5px);
    }

    .stat-icon {
        font-size: 2.5rem;
    }

    .stat-info {
        flex-grow: 1;
    }

    .stat-number {
        font-size: 1.8rem;
        font-weight: bold;
        color: var(--primary-color);
        margin-bottom: 0.25rem;
    }

    .stat-text {
        color: #666;
        font-size: 0.9rem;
    }

    /* ============================================
       TABLA COMPRAS
       ============================================ */
    .orders-table-container {
        background-color: white;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: var(--shadow);
        margin-bottom: 2rem;
        overflow-x: auto;
    }

    .orders-table {
        width: 100%;
        border-collapse: collapse;
    }

    .orders-table thead {
        background-color: var(--secondary-color);
        color: var(--text-light);
    }

    .orders-table th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        border: none;
    }

    .orders-table td {
        padding: 1rem;
        border-bottom: 1px solid var(--border-color);
    }

    .order-row {
        cursor: pointer;
        transition: var(--transition);
    }

    .order-row:hover {
        background-color: var(--accent-color);
    }

    .order-row strong {
        color: var(--primary-color);
    }

    /* ============================================
       DETALLES EXPANDIBLES
       ============================================ */
    .order-details {
        background-color: var(--accent-color);
    }

    .details-content {
        padding: 1rem 0;
    }

    .details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }

    .details-grid h4 {
        color: var(--primary-color);
        margin-bottom: 0.75rem;
        font-size: 1rem;
    }

    .details-grid ul {
        list-style: none;
        padding: 0;
    }

    .details-grid li {
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .details-grid p {
        color: var(--text-dark);
        font-size: 0.9rem;
        line-height: 1.6;
    }

    /* ============================================
       BADGES ESTADO
       ============================================ */
    .badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 2rem;
        font-size: 0.85rem;
        font-weight: 600;
        text-align: center;
    }

    .badge.delivered {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .badge.processing {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .badge.shipped {
        background-color: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }

    .badge.pending {
        background-color: #e2e3e5;
        color: #383d41;
        border: 1px solid #d6d8db;
    }

    .badge.cancelled {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* ============================================
       BOTONES DETALLES
       ============================================ */
    .btn-detail {
        background-color: var(--primary-color);
        color: white;
        border: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 1.2rem;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-detail:hover {
        background-color: #d66a48;
        transform: scale(1.1) rotate(180deg);
    }

    /* ============================================
       ACCIONES
       ============================================ */
    .orders-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 768px) {
        .orders-stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .orders-table {
            font-size: 0.85rem;
        }

        .orders-table th,
        .orders-table td {
            padding: 0.75rem 0.5rem;
        }

        .details-grid {
            grid-template-columns: 1fr;
        }

        .orders-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
</style>

    <section class="orders-section">
    <div class="container">
        <h1 class="section-title">Mis Compras</h1>

        <!-- Estadísticas de Compras -->
        <div class="orders-stats">
            <div class="stat-box">
                <div class="stat-icon">📦</div>
                <div class="stat-info">
                    <p class="stat-number">12</p>
                    <p class="stat-text">Pedidos Totales</p>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon">✅</div>
                <div class="stat-info">
                    <p class="stat-number">9</p>
                    <p class="stat-text">Entregados</p>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon">⏳</div>
                <div class="stat-info">
                    <p class="stat-number">2</p>
                    <p class="stat-text">En Progreso</p>
                </div>
            </div>
            <div class="stat-box">
                <div class="stat-icon">💰</div>
                <div class="stat-info">
                    <p class="stat-number">$486.50</p>
                    <p class="stat-text">Total Gastado</p>
                </div>
            </div>
        </div>

        <!-- Tabla de Compras -->
        <div class="orders-table-container">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Fecha</th>
                        <th>Productos</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Pedido 1 -->
                    <tr class="order-row" onclick="toggleDetails(this)">
                        <td><strong>#ORD001</strong></td>
                        <td>15/11/2025</td>
                        <td>3 artículos</td>
                        <td>$45.50</td>
                        <td><span class="badge delivered">Entregado</span></td>
                        <td><button class="btn-detail">+</button></td>
                    </tr>
                    <tr class="order-details" style="display: none;">
                        <td colspan="6">
                            <div class="details-content">
                                <div class="details-grid">
                                    <div>
                                        <h4>Artículos</h4>
                                        <ul>
                                            <li>• 2x Cupcake de Vainilla - $7.00</li>
                                            <li>• 1x Croissant Mantequilla - $4.99</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4>Dirección de Entrega</h4>
                                        <p>123 Calle Principal<br>San Francisco, CA 94103</p>
                                    </div>
                                    <div>
                                        <h4>Detalles</h4>
                                        <p>Subtotal: $26.50<br>Envío: $5.00<br>Impuesto: $14.00</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Pedido 2 -->
                    <tr class="order-row" onclick="toggleDetails(this)">
                        <td><strong>#ORD002</strong></td>
                        <td>12/11/2025</td>
                        <td>2 artículos</td>
                        <td>$54.99</td>
                        <td><span class="badge processing">Procesando</span></td>
                        <td><button class="btn-detail">+</button></td>
                    </tr>
                    <tr class="order-details" style="display: none;">
                        <td colspan="6">
                            <div class="details-content">
                                <div class="details-grid">
                                    <div>
                                        <h4>Artículos</h4>
                                        <ul>
                                            <li>• 1x Pastel de Chocolate - $24.99</li>
                                            <li>• 1x Macarons Variados - $18.99</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4>Dirección de Entrega</h4>
                                        <p>456 Avenida Central<br>San Francisco, CA 94102</p>
                                    </div>
                                    <div>
                                        <h4>Detalles</h4>
                                        <p>Subtotal: $43.98<br>Envío: Gratis<br>Impuesto: $11.01</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Pedido 3 -->
                    <tr class="order-row" onclick="toggleDetails(this)">
                        <td><strong>#ORD003</strong></td>
                        <td>10/11/2025</td>
                        <td>5 artículos</td>
                        <td>$78.45</td>
                        <td><span class="badge shipped">Enviado</span></td>
                        <td><button class="btn-detail">+</button></td>
                    </tr>
                    <tr class="order-details" style="display: none;">
                        <td colspan="6">
                            <div class="details-content">
                                <div class="details-grid">
                                    <div>
                                        <h4>Artículos</h4>
                                        <ul>
                                            <li>• 4x Cupcake Frambuesa - $16.00</li>
                                            <li>• 1x Caja Presentes - $45.99</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4>Dirección de Entrega</h4>
                                        <p>789 Calle del Paseo<br>San Francisco, CA 94104</p>
                                    </div>
                                    <div>
                                        <h4>Detalles</h4>
                                        <p>Subtotal: $61.99<br>Envío: $8.00<br>Impuesto: $8.46</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Pedido 4 -->
                    <tr class="order-row" onclick="toggleDetails(this)">
                        <td><strong>#ORD004</strong></td>
                        <td>08/11/2025</td>
                        <td>1 artículo</td>
                        <td>$22.99</td>
                        <td><span class="badge delivered">Entregado</span></td>
                        <td><button class="btn-detail">+</button></td>
                    </tr>
                    <tr class="order-details" style="display: none;">
                        <td colspan="6">
                            <div class="details-content">
                                <div class="details-grid">
                                    <div>
                                        <h4>Artículos</h4>
                                        <ul>
                                            <li>• 1x Cheesecake Neoyorquino - $22.99</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4>Dirección de Entrega</h4>
                                        <p>321 Camino del Mar<br>San Francisco, CA 94105</p>
                                    </div>
                                    <div>
                                        <h4>Detalles</h4>
                                        <p>Subtotal: $22.99<br>Envío: $0.00<br>Impuesto: $0.00</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Pedido 5 -->
                    <tr class="order-row" onclick="toggleDetails(this)">
                        <td><strong>#ORD005</strong></td>
                        <td>05/11/2025</td>
                        <td>6 artículos</td>
                        <td>$92.45</td>
                        <td><span class="badge delivered">Entregado</span></td>
                        <td><button class="btn-detail">+</button></td>
                    </tr>
                    <tr class="order-details" style="display: none;">
                        <td colspan="6">
                            <div class="details-content">
                                <div class="details-grid">
                                    <div>
                                        <h4>Artículos</h4>
                                        <ul>
                                            <li>• 6x Donas de Canela - $12.99</li>
                                            <li>• 2x Brownies de Chocolate - $29.98</li>
                                            <li>• 3x Galletas Variadas - $14.97</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4>Dirección de Entrega</h4>
                                        <p>654 Avenida del Bosque<br>San Francisco, CA 94106</p>
                                    </div>
                                    <div>
                                        <h4>Detalles</h4>
                                        <p>Subtotal: $57.94<br>Envío: $12.00<br>Impuesto: $22.51</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Botones de Acción -->
        <div class="orders-actions">
            <a href="{{ route('productos') }}" class="btn btn-primary">Continuar Comprando</a>
            <a href="#" class="btn btn-secondary">Descargar Historial</a>
        </div>
    </div>
</section>
    @include('partials.footer')
</body>
</html>