<?php
// Verifica se a sessão já está ativa antes de iniciar
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'Assets/db/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login']; // Nome de usuário ou e-mail
    $senha = $_POST['senha'];

    // Prepare e execute a consulta para verificar as credenciais
    $stmt = $pdo->prepare("SELECT id, senha FROM usuarios WHERE email = ? OR usuario = ?");
    $stmt->execute([$login, $login]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Credenciais corretas
        $_SESSION['usuario_id'] = $usuario['id'];
        header('Location: incluir_depoimento.php'); // Redireciona para a página 'Sobre' após o login
        exit();
    } else {
        $erro = "Nome de usuário, e-mail ou senha inválidos.";
    }
}
?>
<?php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ministério de Casais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/style.css">
    <style>
        /* Estilos personalizados para o card de login */
        .login-card {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            margin-top: 50px;
        }
        .login-card h1 {
            margin-bottom: 20px;
        }
        .login-card .form-control {
            border-radius: 50px;
        }
        .login-card .btn-primary {
            border-radius: 50px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <?php include 'Assets/includes/header.php'; ?>

    <div class="container">
        <div class="login-card">
            <h1 class="text-center">Login</h1>
            
            <?php if (isset($erro)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($erro); ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="login" class="form-label">Nome de Usuário ou E-mail</label>
                    <input type="text" id="login" name="login" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

            <div class="text-center mt-3">
                <p>Não tem uma conta? <a href="criar_usuario.php">Crie uma aqui</a></p>
            </div>
        </div>
    </div>

    <?php include 'Assets/includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
