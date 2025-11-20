<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nuestros Clientes</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

        <style>
            body {
                background-color: #6D0A0A; 
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .clientes-header {
                background-color: #3b0a0aff;
            }

            .cliente-card {
                border-radius: 18px;
                border: 1px solid #eee;
                transition: all 0.25s ease;
                background: #EFD9A1;
            }

            .cliente-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            }

            .badge {
                font-size: 0.8rem;
                border-radius: 10px;
            }

            .btn {
                border-radius: 10px;
            }
        </style>
    </head>
    <body>
        @include('partials.navbar')

        <section class="clientes-header text-center py-5">
            <h1 class="fw-bold text-white">Nuestros Clientes</h1>
            <p class="text-white-50 fs-5">Aquellos que siguen confiando en nosotros con amor</p>
        </section>

        <div class="container py-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Mensajes de error -->
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Mensajes de advertencia -->
            @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Mensajes informativos -->
            @if(session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex justify-content-end mb-3">
                <a href="{{route('form_reg_cliente')}}" class="btn btn-success">Añadir Cliente</a>
            </div>

            <div class="row g-3">
                @foreach($clientes as $c)
                    <div class="col-lg-4 col-md-6">
                        <div class="cliente-card card shadow-sm p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-1">{{ $c->nombreCliente }}</h5>
                                <span class="badge bg-dark">{{ $c->cedulaCliente }}</span>
                            </div>

                            <p class="mb-1">📞 {{ $c->telefonoCliente }}</p>
                            <p class="mb-3">📍 {{ $c->direccionCliente }}</p>

                            <div class="d-flex justify-content-between">
                                <a href="{{route('form_edi_cliente', $c->cedulaCliente)}}" class="btn btn-outline-primary btn-sm">✏️ Editar</a>

                                <form action="{{route('elimina_cliente', $c->cedulaCliente)}}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este cliente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> 🗑️ Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @include('partials.footer')
    </body>
</html>