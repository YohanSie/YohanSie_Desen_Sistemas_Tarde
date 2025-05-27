create database armazena_imagem;

use armazena_imagem;

create table tabela_imagem (
	codigo int auto_increment primary key,
    evento varchar(50) not null,
    descricao varchar(255) not null,
    nome_imagem varchar(40) not null,
    tamanho_imagem varchar(25) not null,
    tipo_imagem varchar(25) not null,
    imagem longblob
);

