<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>🧁 Registro de Productos</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

        <style>
            body {
                background-color: #EFD9A1;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .card {
                max-width: 500px;
                margin: 50px auto;
                border: none;
                border-radius: 20px;
                box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
                background-color: #fff;
            }

            .card-header {
                background-color: #6D0A0A;
                color: #fff;
                border-top-left-radius: 20px;
                border-top-right-radius: 20px;
                text-align: center;
                font-weight: 600;
                font-size: 1.3rem;
                padding: 20px;
            }

            .card-body {
                padding: 30px;
            }

            label {
                font-weight: 600;
                color: #4a3f35;
            }

            .form-control,
            .form-select {
                border-radius: 10px;
                border: 1px solid #6D0A0A;
                font-size: 0.9rem;
                padding: 8px 12px;
            }

            textarea {
            resize: none;
            }

            .btn-success {
                background-color: #3b0a0aff;
                border: none;
                border-radius: 10px;
                font-weight: 600;
                transition: all 0.2s ease-in-out;
            }

            .btn-success:hover {
                background-color: #6D0A0A;
                transform: scale(1.03);
            }

            .btn-secondary {
                border-radius: 10px;
            }

            .alert {
                border-radius: 10px;
                font-size: 0.9rem;
            }

            .text-center button,
            .text-center a {
                width: 48%;
            }
        </style>
    </head>
    <body>

        <div class="card">
            <div class="card-header">
                🧁 Registro de Productos
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/productos/registro') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="producto_id" class="form-label">ID Producto</label>
                        <input type="text" class="form-control @error('producto_id') is-invalid @enderror"
                            id="producto_id" name="producto_id" value="{{ old('producto_id') }}">
                        @error('producto_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nombre_producto" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('nombre_producto') is-invalid @enderror"
                            id="nombre_producto" name="nombre_producto" value="{{ old('nombre_producto') }}">
                        @error('nombre_producto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descripcion_producto" class="form-label">Descripción</label>
                        <textarea class="form-control @error('descripcion_producto') is-invalid @enderror"
                            id="descripcion_producto" name="descripcion_producto" rows="3">{{ old('descripcion_producto') }}</textarea>
                        @error('descripcion_producto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="precio_producto" class="form-label">Precio</label>
                            <input type="number" step="0.01" class="form-control @error('precio_producto') is-invalid @enderror"
                                id="precio_producto" name="precio_producto" value="{{ old('precio_producto') }}">
                            @error('precio_producto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="stock_producto" class="form-label">Stock</label>
                            <input type="number" class="form-control @error('stock_producto') is-invalid @enderror"
                                id="stock_producto" name="stock_producto" value="{{ old('stock_producto') }}">
                            @error('stock_producto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="foto_producto" class="form-label">Foto</label>
                        <input type="file" class="form-control @error('foto_producto') is-invalid @enderror"
                            id="foto_producto" name="foto_producto">
                        @error('foto_producto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select class="form-select @error('categoria') is-invalid @enderror" id="categoria" name="categoria">
                            <option selected disabled>-- Seleccione una categoría --</option>
                            @foreach($categorias as $ct)
                                <option value="{{ $ct->categoriaID }}"
                                    {{ old('categoria') == $ct->categoriaID ? 'selected' : '' }}>
                                    {{ $ct->nombreCategoria }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success me-2">
                            <i class="bi bi-plus-circle"></i> Registrar
                        </button>
                        <a href="{{ route('productos') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
