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
    body {
        background-color: #6D0A0A;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
        padding: 0;
    }

    main {
        flex-grow: 1;
    }

    /* Fondo del encabezado */
    section.categorias-header {
        background-color: #3b0a0aff;
        margin-bottom: 2rem; /* separa del navbar */
    }

    /* Contenedor principal */
    section.container {
        background-color: #EFD9A1;
        padding: 2rem;
        border-radius: 1rem;
        max-width: 1200px;
        margin: 0 auto 3rem auto; /* centrado + espacio inferior */
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    /* Tabla */
    table.table {
        background-color: white;
        border-radius: 0.5rem;
        overflow: hidden;
    }

    /* Ajuste de cuerpo para que el footer quede abajo */
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* El contenido crece y empuja el footer */
    section.container {
        flex-grow: 1;
    }

</style>

    <section class="categorias-header text-center py-5">
        <h1 class="fw-bold text-white">Mis compras</h1>
    </section>
    <section class="container">
        @if($compras->isEmpty())
            <p class="text-center">No has realizado compras aún.</p>
        @else
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Cliente</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Método de Pago</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($compras as $compra)
                    <tr>
                        <td>{{ $compra->compraID }}</td>
                        <td>{{ $compra->nombreCliente }}</td>
                        <td>{{ $compra->cantidadCompra }}</td>
                        <td>{{ $compra->fechaCompra }}</td>
                        <td>{{ $compra->estadoCompra }}</td>
                        <td>{{ $compra->metodoPago }}</td>
                        <td>${{ number_format($compra->totalCompra, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </section>
    @include('partials.footer')
</body>
</html>