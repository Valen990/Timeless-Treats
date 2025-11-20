<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #3b0a0a;
        }

        .orders-section {
            background-color: #6D0A0A;
            overflow: hidden;
        }

        .cart-container {
            background-color: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--shadow);
        }

        .empty {
            color: #a82c2c;
            font-size: 1.2rem;
            text-align: center;
            font-weight: 500;
        }

        .fila-carrito {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .select-metodo {
            width: 220px;
            background-color: #EFD9A1;
            color: #6D0A0A;
            border: 2px solid #a82c2c;
            border-radius: 8px;
            font-weight: 500;
            text-align: center;
            padding: 0.5rem;
            box-shadow: 0 0 5px rgba(239, 217, 161, 0.5);
            transition: box-shadow 0.3s ease;
        }

        .select-metodo:focus {
            outline: none;
            box-shadow: 0 0 10px rgb(239,217,161);
        }

        .btn-carrito {
            font-weight: 500;
            padding: 0.5rem 1rem;
        }

        a.btn.btn-primary {
            background-color: #3b0a0a;
            border-color: #3b0a0a;
            font-weight: 500;
        }

        a.btn.btn-primary:hover {
            color: #EFD9A1;
            box-shadow: 0 0 10px rgb(239,217,161);
        }
    </style>
</head>

<body>

@include('partials.navbar')

<section class="categorias-header text-center py-5">
    <h1 class="fw-bold text-white">Mi carrito de compras</h1>
</section>

<section class="orders-section py-4">
    <div class="container">

        <div class="cart-container mt-4">

            {{-- SI EL CARRITO ESTÁ VACÍO --}}
            @if(empty($carrito))
                <p class="empty">¡No hay productos en el carrito!</p>
            @else

                {{-- TABLA DEL CARRITO --}}
                <table class="table table-dark table-sm text-center" style="width: 99%; margin:auto;">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total por producto</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $total = 0; @endphp

                        @foreach($carrito as $id => $item)
                        <tr>
                            <td>{{ $item['nombre'] }}</td>
                            <td>${{ number_format($item['precio'], 2) }}</td>
                            <td>{{ $item['cantidad'] }}</td>
                            <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>

                            <td>
                                <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>

                        @php
                            $total += $item['precio'] * $item['cantidad'];
                        @endphp
                        @endforeach
                    </tbody>
                </table>

                <br>
                <h3 class="text-center">Total: ${{ number_format($total, 2) }}</h3>

                <div class="fila-carrito">
                    {{-- Vaciar carrito --}}
                    <form action="{{ route('carrito.vaciar') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-warning btn-carrito"
                            style="background-color: #a82c2c; color: #EFD9A1;">
                            Vaciar carrito
                        </button>
                    </form>

                    {{-- Selector de método de pago --}}
                    <form action="{{ route('finalizar.compra') }}" method="POST" class="d-flex align-items-center gap-3">
                        @csrf
                        <select name="metodoPago" id="metodoPago" class="select-metodo">
                            <option value="Efectivo">Efectivo</option>
                            <option value="Tarjeta de crédito">Tarjeta de crédito</option>
                            <option value="Nequi">Nequi</option>
                            <option value="Daviplata">Daviplata</option>
                        </select>

                        <button type="submit" class="btn btn-success btn-carrito"
                            style="background-color: #EFD9A1; color: #a82c2c; border-color: #a82c2c;">
                            Finalizar Compra
                        </button>
                    </form>
                </div>

            @endif
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('productos') }}" class="btn btn-primary">Seguir comprando</a>
        </div>
    </div>
</section>

@include('partials.footer')
</body>
</html>
