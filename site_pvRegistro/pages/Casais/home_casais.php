<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ministério de Casais - Igreja Palavra de Vida</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="Assets/css/style.css">
    <style>
        

        /* Estilo para os cards modernos */
        .card {
            position: relative;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.45); /* Aumenta a opacidade do fundo */
            text-align: center;
            padding: 20px; /* Aumenta o padding */
        }

        .card-title_text {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: white; /* Cor do texto branca */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6); /* Adiciona sombra ao texto */
        }

        .card-text {
            font-size: 1rem;
            color: white; /* Cor do texto branca */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6); /* Adiciona sombra ao texto */
        }

        .btn-primary {
            background-color: #0056b3;
            border-color: #0056b3;
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #003f7f;
            border-color: #003f7f;
        }

        .btn-center {
            display: inline-block;
            margin: 0 auto;
        }

        /* Estilo para a altura e ajuste da imagem do banner */
        .carousel-item img {
            width: 100%;
            height: 40vh; /* 50% da altura da viewport */
            object-fit: cover; /* Ajusta a imagem para cobrir o banner sem distorção */            
        }

        img{
            
        }
    </style>
</head>

<body>
    <?php include 'Assets/includes/header.php'; ?>   

    <!-- Banner Principal -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Assets/img/imgDiversas/familia_por_do_sol.jpg" class="d-block w-100" alt="Banner">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Bem-vindo ao Ministério de Casais - Mais que Casal</h2>
                    <h4>Fortalecendo vidas e relacionamentos em Cristo.</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Seções de Destaque -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="Assets/img/imgDiversas/eventos.jpg" class="card-img-top" alt="Eventos">
                    <div class="card-body">
                        <h5 class="card-title_text">Eventos</h5>
                        <p class="card-text">Participe dos nossos eventos e fortaleça seu casamento.</p>
                        <a href="eventos.php" class="btn btn-primary btn-center">Ver Eventos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Assets/img/imgDiversas/recursos.jpg" class="card-img-top" alt="Recursos">
                    <div class="card-body">
                        <h5 class="card-title_text">Recursos</h5>
                        <p class="card-text">Acesse conteúdos que irão abençoar sua vida conjugal.</p>
                        <a href="recursos.php" class="btn btn-primary btn-center">Acessar Recursos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="Assets/img/imgDiversas/galeria.jpg" class="card-img-top" alt="Galeria">
                    <div class="card-body">
                        <h5 class="card-title_text">Galeria</h5>
                        <p class="card-text">Veja fotos e vídeos dos nossos eventos.</p>
                        <a href="galeria.php" class="btn btn-primary btn-center">Ver Galeria</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'Assets/includes/footer.php'; ?>

    <!-- Bootstrap JS e Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- JS Personalizado -->
    <script src="Assets/js/main.js"></script>
</body>

</html>
