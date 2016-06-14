-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.


CREATE TABLE cidade (
id serial PRIMARY KEY,
cidade varchar(500)
);

CREATE TABLE usuario (
id serial PRIMARY KEY,
usuario varchar(500),
email varchar(500),
senha varchar(500),
idtipo integer,
idcidade integer,
FOREIGN KEY(idcidade) REFERENCES cidade (id)
);

CREATE TABLE tipo (
id serial PRIMARY KEY,
tipo varchar(500)
);
 
CREATE TABLE cliente (
id serial PRIMARY KEY,
nome varchar(500),
idcidade integer,
telefone varchar(500),
FOREIGN KEY(idcidade) REFERENCES cidade (id)
);


-- drop table ordem
CREATE TABLE ordem (
id serial PRIMARY KEY,
idcliente integer,
idusuario integer,
data_abertura date,
data_termino date,
descricao_problema varchar(500),
descricao_solucao varchar(500),
status boolean,
FOREIGN KEY(idcliente) REFERENCES cliente (id),
FOREIGN KEY(idusuario) REFERENCES usuario (id)
);

ALTER TABLE usuario ADD FOREIGN KEY(idtipo) REFERENCES tipo (id);

---------------- INSERÇÃO DOS DADOS ------------

--------------------Cidades--------------------
insert into cidade (cidade) values ('Passo Fundo');
insert into cidade (cidade) values ('Carazinho');
insert into cidade (cidade) values ('Marau');
insert into cidade (cidade) values ('Casa');
insert into cidade (cidade) values ('Parai');
insert into cidade (cidade) values ('Nova Araca');
insert into cidade (cidade) values ('Nova Bassano');

-- select * from cidade

--------------------TIPO-----------------------
insert into tipo (tipo) values ('Tecnico');
insert into tipo (tipo) values ('Atendente');
insert into tipo (tipo) values ('ADM');

-- select * from tipo
--------------------Usuario--------------------

insert into usuario (usuario, email, senha, idtipo, idcidade) values ('BDB', 'bdb@bdb.com.br', md5('senha'),3,1);
insert into usuario (usuario, email, senha, idtipo, idcidade) values ('MA', 'ma@ma.com.br', md5('senha'),2,2);
insert into usuario (usuario, email, senha, idtipo, idcidade) values ('BR', 'br@br.com.br', md5('senha'),1,3);

-- select * from usuario
--------------------Cliente--------------------

insert into cliente (nome, idcidade, telefone) values('Roberto',1,'(54)9966-1008');
insert into cliente (nome, idcidade, telefone) values('Guilherme',2,'(54)8166-1008');
insert into cliente (nome, idcidade, telefone) values('Antonio',3,'(54)9666-1008');

-- select * from cliente
--------------------Ordem----------------------

insert into ordem (idcliente, idusuario, data_abertura, data_termino, descricao_problema,descricao_solucao,status) values(1,1,'12-05-2016','15-05-2016','Não Liga','Fonte queimada','TRUE');
insert into ordem (idcliente, idusuario, data_abertura, data_termino, descricao_problema,descricao_solucao,status) values(2,2,'13-05-2016','14-05-2016','Não da tela ','Cabo desconectado','FALSE');
insert into ordem (idcliente, idusuario, data_abertura, data_termino, descricao_problema,descricao_solucao,status) values(3,3,'15-05-2016','20-05-2016','Não desliga','Virus','FALSE');
-- select * from ordem
