<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - Ministério de Casais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/style.css">
    <style>
        /* Estilos personalizados para os cards */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-size: 1.5rem;
            color: #0056b3;
            margin-bottom: 20px;
        }
        .card-text {
            font-size: 1rem;
            color: #333;
        }
        .leadership-profile {
            text-align: center;
            margin-bottom: 30px;
        }
        .leadership-profile img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .leadership-profile h3 {
            font-size: 1.25rem;
            color: #0056b3;
        }
        .btn-modern {
            background-color: #0056b3;
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .btn-modern:hover {
            background-color: #003f7f;
            color: #fff;
        }
        .depoimento-date {
            font-size: 0.9rem;
            margin-top: -5px;
            margin-left: 60px;
            color: #777;
        }
        .icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: #333;
            padding: 0;
            margin: 0 5px;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        .icon-btn:hover {
            color: #0056b3;
        }
        .user-photo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            vertical-align: middle;
        }
        .depoimento-item {
            display: flex;
            align-items: center;
        }
        .depoimento-item img {
            margin-right: 15px;
        }
        .depoimento-content {
            flex: 1;
        }

        .h5_depoimento {
            margin-top: -45px;
            margin-left: 60px;
        }

        .p_depoimento {
            font-style: italic;
        }
    </style>
</head>
<body>
    <?php include 'Assets/includes/header.php'; ?>

    <div class="container my-5">
        <h1>Sobre o Ministério de Casais</h1>
        <p>O Ministério de Casais da Igreja Palavra de Vida tem como objetivo fortalecer e edificar casamentos, trazendo a palavra de Deus para dentro dos lares. Nossa missão é transformar vidas e relações através do amor e da graça de Cristo.</p>

        <h2 class="mt-5">Objetivo, Missão e Visão</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title">Objetivo</h5>
                        <p class="card-text">Fortalecer casamentos, proporcionando suporte espiritual e prático, edificando lares segundo os princípios bíblicos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title">Missão</h5>
                        <p class="card-text">Edificar casamentos sólidos e saudáveis, guiados pelos princípios bíblicos, promovendo a glória de Deus através dos relacionamentos conjugais.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title">Visão</h5>
                        <p class="card-text">Ser um farol de esperança e transformação para casais, capacitando-os a viver plenamente o propósito divino para suas vidas.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mt-5">Liderança</h2>
        <div class="row">
            <div class="col-md-6 leadership-profile">
                <img src="assets/img/20230817_093324_2.jpg" alt="Wagner Toth">
                <h3>Wagner Toth</h3>
            </div>
            <div class="col-md-6 leadership-profile">
                <img src="Assets/img/NewCleo.jpg" alt="Cleo Toth">
                <h3>Cleo Toth</h3>
            </div>
        </div>

        <h2 class="mt-5">Depoimentos</h2>
        <p>Veja o que os casais têm a dizer sobre nosso ministério.</p>
        
        <!-- Botão para redirecionar à página de inclusão de depoimentos -->
        <div class="text-center my-4">
            <a href="incluir_depoimento.php" class="btn btn-modern">Deixe seu Depoimento</a>
        </div>

        <!-- Lista de Depoimentos -->
        <div class="mt-5">
            <!-- <h4>Depoimentos de Casais</h4> -->
            <div class="list-group">
                <?php
                
                // Conexão com o banco de dados
                include 'Assets/db/conexao.php';
                
                // Consulta para buscar todos os depoimentos
                $query = "SELECT usuarios.nome, usuarios.foto, depoimentos.data_inclusao, depoimentos.depoimento 
                          FROM depoimentos 
                          INNER JOIN usuarios ON depoimentos.usuario_id = usuarios.id 
                          ORDER BY data_inclusao DESC";
                $result = $pdo->query($query);
                
                // Verifica se há depoimentos retornados
                if ($result && $result->rowCount() > 0) {
                    // Loop para exibir cada depoimento
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        // Caminho da foto
                        $foto = !empty($row['foto']) ? htmlspecialchars($row['foto']) : 'Assets/img/default-user.png';
                        echo '<div class="list-group-item depoimento-item">';
                        echo '<img src="' . $foto . '" alt="Foto de ' . htmlspecialchars($row['nome']) . '" class="user-photo">';
                        echo '<div class="depoimento-content">';
                        echo '<h5 class="h5_depoimento">' . htmlspecialchars($row['nome']) . '</h5>';
                        echo '<p class="depoimento-date">Data de Inclusão: ' . date('d/m/Y', strtotime($row['data_inclusao'])) . '</p>';
                        echo '<p class="p_depoimento">' . htmlspecialchars($row['depoimento']) . '</p>';
                        echo '<button class="icon-btn" onclick="editarDepoimento()">';
                        echo '<i class="bi bi-pencil-square"></i>';
                        echo '</button>';
                        echo '<button class="icon-btn" onclick="excluirDepoimento()">';
                        echo '<i class="bi bi-trash"></i>';
                        echo '</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Nenhum depoimento encontrado.</p>';
                }
                
                // Fechar conexão
                $pdo = null;
                ?>
            </div>
        </div>

        <!-- Botão adicional no final da lista de depoimentos -->
        <div class="text-center my-4">
            <a href="incluir_depoimento.php" class="btn btn-modern">Deixe seu Depoimento</a>
        </div>
    </div>

    <?php include 'Assets/includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="Assets/js/main.js"></script>

    <script>
        function editarDepoimento() {
            alert("Função de edição em desenvolvimento. Apenas usuários cadastrados podem editar seus depoimentos.");
        }

        function excluirDepoimento() {
            alert("Função de exclusão em desenvolvimento. Apenas o administrador pode excluir depoimentos.");
        }
    </script>
</body>
</html>
