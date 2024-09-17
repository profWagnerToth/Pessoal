<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Ministério de Casais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Assets/css/style.css">
</head>
<body>
    <?php include 'Assets/includes/header.php'; ?>

    <div class="container my-5">
        <h1>Contato</h1>
        <p>Entre em contato conosco para dúvidas, sugestões ou qualquer outra informação.</p>

        <div class="row">
            <div class="col-md-6">
                <h2>Formulário de Contato</h2>
                <form action="processaContato.php" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensagem" class="form-label">Mensagem</label>
                        <textarea class="form-control" id="mensagem" name="mensagem" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Informações de Contato</h2>
                <p><strong>Email:</strong> <a href="mailto:contato@ministeriodecasais.com">contato@ministeriodecasais.com</a></p>
                <p><strong>Telefone:</strong> +55 (11) 99999-9999</p>
                <p><strong>Endereço:</strong> Rua Exemplo, 123, Bairro, Cidade, Estado, CEP</p>

                <!-- Se desejar, pode adicionar um mapa -->
                <h2>Localização</h2>
                <div class="embed-responsive embed-responsive-16by9 mb-3">
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1234567!2d-46.1234567!3d-23.4567890!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2z5YW_5YWx5bCP5p2N5Y-35Y-55a8!5e0!3m2!1spt-BR!2sbr!4v1637836898910!5m2!1spt-BR!2sbr" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <?php include 'Assets/includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="/Assets/js/main.js"></script>
</body>
</html>
