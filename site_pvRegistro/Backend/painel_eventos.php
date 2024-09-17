<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Eventos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .event-form {
            max-width: 600px;
            margin: auto;
        }
        .event-preview {
            text-align: center;
            margin-top: 20px;
        }
        .event-preview img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Painel de Eventos</h1>
        <form class="event-form" id="eventForm">
            <div class="mb-3">
                <label for="eventTitle" class="form-label">Título do Evento</label>
                <input type="text" class="form-control" id="eventTitle" required>
            </div>
            <div class="mb-3">
                <label for="eventDate" class="form-label">Data do Evento</label>
                <input type="date" class="form-control" id="eventDate" required>
            </div>
            <div class="mb-3">
                <label for="eventLocation" class="form-label">Local do Evento</label>
                <input type="text" class="form-control" id="eventLocation" required>
            </div>
            <div class="mb-3">
                <label for="eventDescription" class="form-label">Descrição do Evento</label>
                <textarea class="form-control" id="eventDescription" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="eventImage" class="form-label">Arte de Divulgação</label>
                <input type="file" class="form-control" id="eventImage" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Evento</button>
        </form>
        <div class="event-preview mt-4" id="eventPreview">
            <h4>Pré-visualização da Arte de Divulgação:</h4>
            <img id="previewImage" src="" alt="Pré-visualização">
        </div>
    </div>

    <!-- Bootstrap JS e Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        // JavaScript para pré-visualizar a arte de divulgação
        document.getElementById('eventImage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
