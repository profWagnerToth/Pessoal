<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'assets/db/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palavra de Vida Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>

<body>
    <?php include 'assets/includes/header.php'; ?>

    <main>
        <!-- Seção 1: Foto Impactante -->
        <section id="foto-impactante" class="d-flex align-items-center justify-content-center">
            <div class="overlay"></div>
            <div class="content text-center">
                <img src="assets/img/logotipos/Logo_PV_White_RGT.png" alt="Logotipo da Igreja Palavra de Vida"
                    class="img-fluid mb-3" style="max-width: 300px;" />
                <p class="slogan">JESUS RECONSTRUINDO VIDAS</p>
                <a href="#culto-online" class="btn btn-primary">Acessar Site</a>
            </div>
        </section>

        <!-- Seção 2: Culto Online -->
        <section id="culto-online" class="d-flex align-items-center justify-content-center">
            <div class="overlay" style="pointer-events: none;"></div>
            <div class="content text-center" style="position: relative; z-index: 1;">
                <h2>Culto Online</h2>
                <a href="https://www.youtube.com/@palavradevidaregistro1" class="btn btn-success"
                    style="z-index: 2;">Assistir Culto</a>
            </div>
        </section>

        <!-- Seção 3: Ministérios -->
        <section id="ministerios" class="d-flex flex-column align-items-center justify-content-center">
            <div class="container card-container">
                <div class="row justify-content-center">
                    <!-- Cards para Ministérios -->
                    <?php
                    $ministerios = [
                        ["casais.jpg", "Ministério de Casais", "pages/casais/home_casais.php"],
                        ["familia.jpg", "Ministério da Família", "pages/familia/home_familia.php"],
                        ["infantil.jpg", "Ministério Infantil", "pages/infantil/home_infantil.php"],
                        ["jovens.jpg", "Ministério dos Jovens", "pages/jovens/home_jovens.php"]
                    ];

                    foreach ($ministerios as $ministerio) {
                        echo '
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <div class="card">
                                <img src="assets/img/ministerios/' . $ministerio[0] . '" class="card-img-top"
                                    alt="Imagem do ' . $ministerio[1] . '">
                                <div class="card-body">
                                    <h5 class="card-title">' . $ministerio[1] . '</h5>
                                    <a href="' . $ministerio[2] . '" class="btn btn-primary">Saiba Mais</a>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Seção 4: Contato e Depoimentos -->
        <section id="contato" class="d-flex flex-column align-items-center">
            <div class="container">
                <div class="row">
                    <!-- Card de Depoimentos -->
                    <div class="col-md-6">
                        <h4>Depoimentos Recentes</h4>
                        <div class="list-group">
                            <?php
                            include 'assets/db/conexao.php';

                            $query = "SELECT usuarios.nome, usuarios.foto, depoimentos.data_inclusao, depoimentos.depoimento 
                                      FROM depoimentos 
                                      INNER JOIN usuarios ON depoimentos.usuario_id = usuarios.id 
                                      ORDER BY data_inclusao DESC LIMIT 3";
                            $result = $pdo->query($query);

                            if ($result && $result->rowCount() > 0) {
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    $foto = !empty($row['foto']) ? htmlspecialchars($row['foto']) : 'assets/img/default-user.png';
                                    echo '
                                    <div class="depoimento-item d-flex align-items-start">
                                        <img src="' . $foto . '" alt="Foto de ' . htmlspecialchars($row['nome']) . '" class="user-photo">
                                        <div class="depoimento-content">
                                            <h5 class="h5_depoimento">' . htmlspecialchars($row['nome']) . '</h5>
                                            <p class="depoimento-date">Data de Inclusão: ' . date('d/m/Y', strtotime($row['data_inclusao'])) . '</p>
                                            <p class="p_depoimento">' . htmlspecialchars($row['depoimento']) . '</p>
                                        </div>
                                    </div>';
                                }
                            } else {
                                echo '<p>Nenhum depoimento encontrado.</p>';
                            }

                            $pdo = null;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0 text-center">
                <h5 class="text-uppercase">Venha nos visitar</h5>
                <p class="endereco">Estamos localizados na Rua Vitoria 399 - Vila Ribeiropolis, Registro, SP.</p>
        </section>

        <!-- Seção 5: Localização -->
        <section id="localizacao">
            <div class="card bg-transparent border-0"> <!-- Removendo a borda -->
                <div class="card-body">
                    <h5 class="card-title text-white">Como chegar até nós.</h5> <!-- Alteração da cor do texto -->
                    <div id="map" style="height: 200px; width: 700px;"></div>
                    <button id="tracarRota" class="btn btn-success mt-3">Traçar Rota</button>
                    <!-- Alteração da classe do botão -->
                </div>
            </div>
        </section>


        <!-- Seção 6: Redes Sociais -->
        <section id="rede_sociais" class="text-center">
            <div class="texto mb-2"> <!-- Adicionando margem inferior -->
                <h5>Siga-nos nas redes sociais</h5> <br>
                </di>
                <div class="social-icons d-flex justify-content-center"> <!-- Centralizando os ícones -->
                    <a href="https://www.facebook.com/pvregistro" class="facebook me-3"><i
                            class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/palavradevidaregistro/" class="instagram me-3"><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/@palavradevidaregistro1" class="youtube me-3"><i
                            class="fab fa-youtube"></i></a>
                    <a href="https://www.whatsapp.com" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                </div>
        </section>


        <!-- Seção 7: Rodapé -->
        <section id="footer">
            <?php include 'assets/includes/footer.php'; ?>
        </section>
    </main>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para rolagem suave -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const links = document.querySelectorAll('a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', (event) => {
                    event.preventDefault();
                    const target = document.querySelector(link.getAttribute('href'));
                    target.scrollIntoView({ behavior: 'smooth' });
                });
            });
        });
    </script>

    <!-- Leaflet.js (Mapas) -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        // Inicializar o mapa
        var map = L.map('map').setView([-24.505697491999427, -47.84105777420176], 13);

        // Adicionar a camada de mapa
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Adicionar marcador
        L.marker([-24.505697491999427, -47.84105777420176]).addTo(map)
            .bindPopup('Igreja Palavra de Vida<br>Rua Vitoria 399 - Vila Ribeiropolis, Registro, SP')
            .openPopup();

        // Função para traçar a rota no Google Maps
        document.getElementById('tracarRota').addEventListener('click', function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var lat = position.coords.latitude;
                    var lon = position.coords.longitude;
                    var destination = "-24.505697491999427, -47.84105777420176"; // Coordenadas da igreja
                    var url = `https://www.google.com/maps/dir/?api=1&origin=${lat},${lon}&destination=${destination}&travelmode=driving`;
                    window.open(url, '_blank');
                }, function () {
                    alert("Não foi possível acessar a localização. Verifique suas permissões de geolocalização.");
                });
            } else {
                alert("Geolocalização não é suportada pelo seu navegador.");
            }
        });
    </script>

</body>

</html>