<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria - Ministério de Casais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Assets/css/style.css">
</head>
<body>
    <?php include 'Assets/includes/header.php'; ?>

    <div class="container my-5">
        <h1>Galeria</h1>
        <p>Veja as fotos e vídeos dos eventos e atividades do Ministério de Casais. Clique nas imagens para ampliar.</p>

        <div class="row">
            <!-- Imagem 1 -->
            <div class="col-md-4 mb-4">
                <a href="/Assets/img/galeria1.jpg" data-bs-toggle="modal" data-bs-target="#imagemModal" data-bs-img="/Assets/img/galeria1.jpg">
                    <img src="/Assets/img/galeria1.jpg" class="img-fluid" alt="Galeria 1">
                </a>
            </div>
            <!-- Imagem 2 -->
            <div class="col-md-4 mb-4">
                <a href="/Assets/img/galeria2.jpg" data-bs-toggle="modal" data-bs-target="#imagemModal" data-bs-img="/Assets/img/galeria2.jpg">
                    <img src="/Assets/img/galeria2.jpg" class="img-fluid" alt="Galeria 2">
                </a>
            </div>
            <!-- Imagem 3 -->
            <div class="col-md-4 mb-4">
                <a href="/Assets/img/galeria3.jpg" data-bs-toggle="modal" data-bs-target="#imagemModal" data-bs-img="/Assets/img/galeria3.jpg">
                    <img src="/Assets/img/galeria3.jpg" class="img-fluid" alt="Galeria 3">
                </a>
            </div>
            <!-- Adicione mais imagens conforme necessário -->
        </div>
    </div>

    <!-- Modal de Imagem -->
    <div class="modal fade" id="imagemModal" tabindex="-1" aria-labelledby="imagemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagemModalLabel">Imagem</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImg" src="" class="img-fluid" alt="Imagem Modal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'Assets/includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="/Assets/js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modalImg = document.getElementById('modalImg');
            var modals = document.querySelectorAll('[data-bs-toggle="modal"]');
            modals.forEach(function (modal) {
                modal.addEventListener('click', function () {
                    var imgSrc = this.getAttribute('data-bs-img');
                    modalImg.src = imgSrc;
                });
            });
        });
    </script>
</body>
</html>
