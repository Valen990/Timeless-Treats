<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Categorias</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>
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

        .card-header{
            background-color: #6D0A0A;
            color: #EFD9A1;
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

        .form-control{
            border-radius: 10px;
            border: 1px solid #6D0A0A;
            font-size: 0.9rem;
            padding: 8px 12px;
        }

        .btn-success{
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

    </style>

    <div class="card">
        <div class="card-header">
            🎂 Registro de Categoría
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

            <form action="{{url('/categorias/guardar')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="categoria_id" class="form-label">ID Categoria</label>
                    <input type="text" class="form-control @error('categoria_id') is-invalid @enderror" 
                        id="categoria_id" name="categoria_id" value="{{ old('producto_id') }}">
                    @error('categoria_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nombre_categoria" class="form-label">Nombre Categoria</label>
                    <input type="text" class="form-control @error('nombre_categoria') is-invalid @enderror" 
                        id="nombre_categoria" name="nombre_categoria" value="{{ old('nombre_categoria') }}">
                    @error('nombre_categoria')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="descripcion_categoria" class="form-label">Descripción categoria</label>
                    <input type="text" class="form-control @error('descripcion_categoria') is-invalid @enderror" 
                        id="descripcion_categoria" name="descripcion_categoria" value="{{ old('descripcion_categoria') }}">
                    @error('descripcion_categoria')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success me-2">
                        <i class="bi bi-plus-circle"></i> Registrar
                    </button>
                    <a href="{{ route('categorias') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>