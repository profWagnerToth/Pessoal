<?php
session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php'); // Redireciona para a página de login se não estiver autenticado
    exit();
}

// Defina o fuso horário local
date_default_timezone_set('America/Sao_Paulo'); // Ajuste para o fuso horário correto

// Conectar ao banco de dados
require_once 'Assets/db/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_SESSION['usuario_id'];
    $depoimento = $_POST['depoimento'];
    $data_inclusao = date('Y-m-d H:i:s'); // Captura a data e hora corrente

    // Prepare e execute a inserção no banco de dados
    $stmt = $pdo->prepare("INSERT INTO depoimentos (usuario_id, depoimento, data_inclusao) VALUES (?, ?, ?)");
    if ($stmt->execute([$usuario_id, $depoimento, $data_inclusao])) {
        header('Location: sobre.php'); // Redireciona para a página 'Sobre' após a inclusão
        exit();
    } else {
        $erro = "Não foi possível adicionar o depoimento. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Depoimento - Ministério de Casais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/style.css">
</head>
<body>
    <?php include 'Assets/includes/header.php'; ?>

    <div class="container my-5">
        <h1>Incluir Depoimento</h1>
        
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($erro); ?>
            </div>
        <?php endif; ?>

        <form action="incluir_depoimento.php" method="POST">
            <div class="mb-3">
                <label for="depoimento" class="form-label">Seu Depoimento</label>
                <textarea id="depoimento" name="depoimento" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Depoimento</button>
        </form>
    </div>

    <?php include 'Assets/includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
