<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mis Favoritos</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

        <style>
            body { background-color:#6D0A0A; font-family: 'Segoe UI'; }
            .producto-card{ 
                border-radius:15px; 
                background:#fff; 
                transition:transform .2s, box-shadow .2s;
                position: relative;
            }
            .producto-card:hover{ transform:translateY(-5px); box-shadow:0 6px 16px rgba(0,0,0,.1); }
            .card-img-top{ height:200px; object-fit:cover; border-top-left-radius:15px; border-top-right-radius:15px; }
            .bg-category{ background-color:#3b0a0aff !important; font-size:.75rem; }
            .btn-remove{
                background: white;
                border-radius: 50%;
                padding: 6px 8px;
                border: none;
                cursor: pointer;
                z-index: 10;
            }
            .btn-remove {
                background: white;
                border: none;
                border-radius: 50%;
                padding: 6px 8px;
                cursor: pointer;
                z-index: 10;
            }
        </style>
    </head>
    <body>

        @include('partials.navbar')

        <section class="text-center py-5" style="background:#3b0a0a;">
            <h1 class="fw-bold text-white">Mis Favoritos</h1>
            <p class="text-white-50 fs-5">Productos que te han enamorado</p>
        </section>

        <div class="container py-4">
            <p id="mensajeNoFavs" class="text-center text-light fs-5 d-none">No tienes productos favoritos aún. ❤️</p>
            <div class="row" id="favoritosGrid"></div>
        </div>

        @include('partials.footer')

        <script>
            // Productos que viene desde Laravel
            const productos = @json($productos);

            function getFavoritos() {
                return JSON.parse(localStorage.getItem('favoritos')) || [];
            }

            function saveFavoritos(arr) {
                localStorage.setItem('favoritos', JSON.stringify(arr));
            }

            function renderFavoritos() {
                const favs = getFavoritos();
                const grid = document.getElementById('favoritosGrid');
                const mensaje = document.getElementById('mensajeNoFavs');

                grid.innerHTML = "";

                if (!favs.length) {
                mensaje.classList.remove("d-none");
                return;
                } else {
                mensaje.classList.add("d-none");
                }

                const filtrados = productos.filter(p => favs.includes(String(p.productoID)));

                filtrados.forEach(p => {

                const categoria = p.belongs_category?.nombreCategoria ?? "Favoritos";
                
                const card = `
                    <div class="col-md-3 mb-4 favorito-card" data-id="${p.productoID}">
                    <div class="card producto-card shadow-sm">

                        <!-- BOTÓN CORAZÓN PARA QUITAR -->
                        <button class="btn-remove position-absolute top-0 end-0 m-2" data-id="${p.productoID}">
                        <i class="bi bi-heart-fill text-danger fs-5"></i>
                        </button>

                        <img src="/imagenes/productos/${p.fotoProducto}" class="card-img-top">

                        <span class="badge bg-category position-absolute top-0 start-0 m-2">${categoria}</span>

                        <div class="card-body text-center">
                        <p class="card-text mb-1"><strong>ID:</strong> ${p.productoID}</p>
                        <h5 class="card-title fw-semibold">${p.nombreProducto}</h5>
                        <p class="card-text mb-1">${p.descripcionProducto}</p>
                        <div class="fw-bold mb-2">$${new Intl.NumberFormat('es-CO').format(p.precioProducto)}</div>
                        <p class="card-text mb-1"><strong>Stock:</strong> ${p.stockProducto}</p>
                        </div>
                    </div>
                    </div>
                `;

                grid.insertAdjacentHTML("beforeend", card);
                });

                // Activar botones recién insertados
                attachRemoveHandlers();
            }


            function attachRemoveHandlers() {
                document.querySelectorAll(".btn-remove").forEach(btn => {
                btn.addEventListener("click", () => {
                    const id = btn.dataset.id;
                    let favs = getFavoritos().filter(x => x != id);
                    saveFavoritos(favs);

                    document.querySelector(`.favorito-card[data-id="${id}"]`)?.remove();

                    if (!getFavoritos().length) {
                    document.getElementById("mensajeNoFavs").classList.remove("d-none");
                    }
                });
                });
            }

            function attachRemoveHandlers() {
                document.querySelectorAll(".btn-remove").forEach(btn => {
                    btn.addEventListener("click", () => {
                        const id = btn.dataset.id;

                        let favs = JSON.parse(localStorage.getItem("favoritos")) || [];
                        favs = favs.filter(x => x != id);
                        localStorage.setItem("favoritos", JSON.stringify(favs));

                        // Remover tarjeta del DOM
                        document.querySelector(`.favorito-card[data-id="${id}"]`).remove();

                        // Mostrar mensaje si se vacía
                        if (!favs.length) {
                            document.getElementById("mensajeNoFavs").classList.remove("d-none");
                        }
                    });
                });
            }
            document.addEventListener("DOMContentLoaded", renderFavoritos);
        </script>
    </body>
</html>