create database empresa;

use empresa;

create table cliente (
	`id_cliente` int not null primary key auto_increment,
	`nome` varchar(50) not null,
    `endereco` varchar(80) not null,
    `telefone` varchar(20) not null,
    `email` varchar(50) not null
);

create table usuario (
	`nome` varchar(50) default null,
    `usuario` varchar(10) default null,
    `senha` varchar(32) default null,
    `nivel` int default null
);

-- Insert único para a tabela cliente
INSERT INTO cliente (nome, endereco, telefone, email) VALUES 
('João Silva', 'Rua das Flores, 123, Centro', '(11) 98765-4321', 'joao.silva@email.com'),
('Maria Santos', 'Av. Paulista, 1000, Bela Vista', '(11) 91234-5678', 'maria.santos@email.com'),
('Carlos Oliveira', 'Rua Augusta, 789, Consolação', '(11) 97777-8888', 'carlos.oliveira@email.com'),
('Ana Pereira', 'Av. Rebouças, 456, Pinheiros', '(11) 96666-7777', 'ana.pereira@email.com'),
('Roberto Costa', 'Rua Oscar Freire, 222, Jardins', '(11) 95555-4444', 'roberto.costa@email.com'),
('Fernanda Lima', 'Alameda Santos, 145, Jardim Paulista', '(11) 94444-3333', 'fernanda.lima@email.com'),
('Paulo Mendes', 'Rua Haddock Lobo, 595, Cerqueira César', '(11) 93333-2222', 'paulo.mendes@email.com'),
('Lúcia Ferreira', 'Av. Brigadeiro Faria Lima, 1500, Itaim Bibi', '(11) 92222-1111', 'lucia.ferreira@email.com'),
('Marcelo Souza', 'Rua dos Pinheiros, 320, Pinheiros', '(11) 91111-0000', 'marcelo.souza@email.com'),
('Juliana Almeida', 'Av. Nove de Julho, 850, Bela Vista', '(11) 90000-9999', 'juliana.almeida@email.com');

-- Insert único para a tabela usuario
INSERT INTO usuario (nome, usuario, senha, nivel) VALUES
('Administrador', 'admin', 'admin123', 1),
('Suporte', 'suporte', 'sup123', 2),
('Vendedor', 'vendas', 'vendas456', 3),
('Gerente', 'gerente', 'ger789', 1),
('Ana Operadora', 'ana', 'ana2023', 2),
('Carlos Técnico', 'carlos', 'carlos2023', 2),
('Paula Marketing', 'paula', 'paula2023', 3),
('Roberto Financeiro', 'roberto', 'roberto2023', 2),
('Marcia RH', 'marcia', 'marcia2023', 2),
('João Estagiário', 'joao', 'joao2023', 4);