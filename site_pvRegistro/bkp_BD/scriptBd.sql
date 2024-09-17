-- Criação da base de dados, se ainda não existir
CREATE DATABASE IF NOT EXISTS ministerio_casais;

-- Seleção da base de dados
USE ministerio_casais;

-- Cria a tabela se não existir
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    estado_civil ENUM('Casado', 'Solteiro') NOT NULL default 'Solteiro',
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    endereco VARCHAR(255) NOT NULL,
    receber_informacoes TINYINT(1) NOT NULL DEFAULT 0,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    nome_conjuge VARCHAR(255),
    foto VARCHAR(255),
	tipo ENUM('admin', 'usuario') DEFAULT 'usuario',
    ativo TINYINT(1) NOT NULL DEFAULT 1,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserção de um usuário admin para testes
INSERT INTO usuarios (nome, email, usuario, senha, tipo) VALUES
('Administrador','admin@ministeriocasais.com', 'admin', PASSWORD('admin123'), 'admin'),
('Usuario Comum','user@ministeriocasais.com', 'user', PASSWORD('user123'),'usuario');

select * from usuarios;

CREATE TABLE depoimentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id int,
    depoimento TEXT NOT NULL,
    data_inclusao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ativo TINYINT(1) NOT NULL DEFAULT 1,
    constraint fk_usuario_id foreign key(usuario_id) references usuarios(id)
);

select * from depoimentos;




