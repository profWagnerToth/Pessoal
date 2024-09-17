<?php
session_start();
require_once 'Assets/db/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta e validação dos dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $estado_civil = htmlspecialchars($_POST['estado_civil']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $email = htmlspecialchars($_POST['email']);
    $endereco = htmlspecialchars($_POST['endereco']);
    $receber_informacoes = isset($_POST['receber_informacoes']) ? 1 : 0;
    $usuario = htmlspecialchars($_POST['usuario']);
    $senha = $_POST['senha'];
    $senha_confirmacao = $_POST['senha_confirmacao'];
    $nome_conjuge = isset($_POST['nome_conjuge']) ? htmlspecialchars($_POST['nome_conjuge']) : null;
    $foto = isset($_FILES['foto']) ? $_FILES['foto'] : null;

    // Verifica se as senhas coincidem
    if ($senha !== $senha_confirmacao) {
        $erro = "As senhas não coincidem.";
    } else {
        // Verifica se o e-mail ou nome de usuário já estão cadastrados
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ? OR usuario = ?");
        $stmt->execute([$email, $usuario]);
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            $erro = "E-mail ou nome de usuário já cadastrado.";
        } else {
            // Processa a foto do usuário, se fornecida
            $foto_url = null;
            if ($foto && $foto['error'] === UPLOAD_ERR_OK) {
                // Verifica se o diretório de upload existe e cria se necessário
                $upload_dir = 'Assets/img/usuarios/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }

                // Gera um nome único para a foto
                $foto_nome = uniqid() . '-' . basename($foto['name']);
                $foto_destino = $upload_dir . $foto_nome;

                // Move o arquivo para o diretório de upload
                if (move_uploaded_file($foto['tmp_name'], $foto_destino)) {
                    $foto_url = 'Assets/img/usuarios/' . $foto_nome;
                } else {
                    $erro = "Erro ao fazer upload da foto. Verifique as permissões do diretório.";
                }
            }

            // Cadastra o novo usuário
            $senha_hash = password_hash($senha, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (nome, estado_civil, telefone, email, endereco, receber_informacoes, usuario, senha, nome_conjuge, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if ($stmt->execute([$nome, $estado_civil, $telefone, $email, $endereco, $receber_informacoes, $usuario, $senha_hash, $nome_conjuge, $foto_url])) {
                header('Location: login.php'); // Redireciona para a página de login após o cadastro
                exit();
            } else {
                $erro = "Erro ao criar a conta. Tente novamente.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta - Ministério de Casais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Assets/css/style.css">
    <style>
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .card-title {
            font-size: 1.5rem;
            color: #0056b3;
        }
        .btn-modern {
            background-color: #0056b3;
            color: white;
            border-radius: 50px;
            padding: 12px 25px;
            font-size: 1.1rem;
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .btn-modern:hover {
            background-color: #003f7f;
            color: #fff;
            transform: translateY(-2px);
        }
        .btn-modern:active {
            background-color: #002b5c;
            transform: translateY(1px);
        }
    </style>
    <script>
        function toggleConjugeField() {
            var estadoCivil = document.getElementById('estado_civil').value;
            var conjugeField = document.getElementById('conjuge_field');
            if (estadoCivil === 'Casado') {
                conjugeField.style.display = 'block';
            } else {
                conjugeField.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <?php include 'Assets/includes/header.php'; ?>

    <div class="container my-5">
        <h1>Criar Conta</h1>

        <?php if (isset($erro)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($erro); ?>
            </div>
        <?php endif; ?>

        <div class="card mx-auto" style="max-width: 800px;">
            <h2 class="card-title">Preencha seus dados</h2>
            <form action="criar_usuario.php" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" id="nome" name="nome" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="estado_civil" class="form-label">Estado Civil</label>
                        <select id="estado_civil" name="estado_civil" class="form-select" required onchange="toggleConjugeField()">
                            <option value="Casado">Casado</option>
                            <option value="Solteiro" selected>Solteiro</option>
                        </select>
                    </div>
                </div>
                <div id="conjuge_field" class="row mb-3" style="display: none;">
                    <div class="col-md-12">
                        <label for="nome_conjuge" class="form-label">Nome do Cônjuge</label>
                        <input type="text" id="nome_conjuge" name="nome_conjuge" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="telefone" class="form-label">Telefone / WhatsApp</label>
                        <input type="tel" id="telefone" name="telefone" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" id="endereco" name="endereco" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="usuario" class="form-label">Nome de Usuário</label>
                        <input type="text" id="usuario" name="usuario" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" id="senha" name="senha" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="senha_confirmacao" class="form-label">Confirme a Senha</label>
                        <input type="password" id="senha_confirmacao" name="senha_confirmacao" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto de Perfil (Opcional)</label>
                    <input type="file" id="foto" name="foto" class="form-control">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" id="receber_informacoes" name="receber_informacoes" class="form-check-input">
                    <label for="receber_informacoes" class="form-check-label">Desejo receber informações sobre eventos e novidades da Igreja Palavra de Vida Registro</label>
                </div>
                <button type="submit" class="btn btn-modern">Cadastrar</button>
            </form>
        </div>
    </div>

    <?php include 'Assets/includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
