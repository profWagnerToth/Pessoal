<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Eventos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .event-card {
            margin-bottom: 20px;
        }
        .event-card img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Eventos</h1>
        <div class="row">
            <!-- Exemplo de card de evento -->
            <div class="col-md-4 event-card">
                <div class="card">
                    <img src="Assets/images/event1.jpg" class="card-img-top" alt="Evento 1">
                    <div class="card-body">
                        <h5 class="card-title">Título do Evento</h5>
                        <p class="card-text">Descrição breve do evento.</p>
                        <a href="event-details.html" class="btn btn-primary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
            <!-- Mais cards de eventos aqui -->
        </div>
    </div>
</body>
</html>
