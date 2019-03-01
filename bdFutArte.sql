create database bdfutarte;

use bdFutArte;

create table login (
	cod_Login INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	login VARCHAR (30) NOT NULL,
    senha VARCHAR (30) NOT NULL
);

create table Funcionario (
	cod_Func INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR (30) NOT NULL,
    idade INT NOT NULL,
    rg VARCHAR (30) NOT NULL,
    cpf VARCHAR (30) NOT NULL,
	endereco VARCHAR (60) NOT NULL,
    cargo VARCHAR (15) NOT NULL
);


create table Turma (
	cod_Turma INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR (30) NOT NULL,
    FUNCIONARIO_cod_Func INT,
    FOREIGN KEY (FUNCIONARIO_cod_Func) REFERENCES Funcionario (cod_Func)
);


create table Aluno (
	cod_Aluno INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR (30) NOT NULL,
    idade INT NOT NULL,
    rg VARCHAR (30) NOT NULL,
    cpf VARCHAR (30) NOT NULL,
    endereco VARCHAR (60) NOT NULL,
    statusMedico VARCHAR (10) NOT NULL,
    FUNCIONARIO_cod_Func INT,
    FOREIGN KEY (FUNCIONARIO_cod_Func) REFERENCES Funcionario (cod_Func),
    TURMA_cod_Turma INT,
    FOREIGN KEY (TURMA_cod_Turma) REFERENCES Turma (cod_Turma) 
);

create table Material (
	cod_Material INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR (30) NOT NULL,
    FUNCIONARIO_cod_Func INT,
    FOREIGN KEY (FUNCIONARIO_cod_Func) REFERENCES Funcionario (cod_Func)
);


create table Mensalidade (
	cod_Mensalidade INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	valor DECIMAL NOT NULL,
    dataEmisao VARCHAR (12) NOT NULL,
    dataVencimento VARCHAR (12) NOT NULL,
    descricao VARCHAR (50) NOT NULL,
    codigoBarras VARCHAR (15) NOT NULL,
    ALUNO_cod_Aluno INT,
    FUNCIONARIO_cod_Func INT,
    FOREIGN KEY (FUNCIONARIO_cod_Func) REFERENCES Funcionario (cod_Func),
    FOREIGN KEY (ALUNO_cod_Aluno) REFERENCES Aluno (cod_Aluno)
);


create table Jogo (
	cod_Jogo INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dia VARCHAR (15),
    hora VARCHAR (12),
    TURMA_cod_Turma INT,
    FOREIGN KEY (TURMA_cod_Turma) REFERENCES Turma (cod_Turma)
);


create table Presenca (
	cod_Presenca INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	statusPresenca VARCHAR (8) NOT NULL,
	TURMA_cod_Turma INT,
    FOREIGN KEY (TURMA_cod_Turma) REFERENCES Turma (cod_Turma),
    JOGO_cod_Jogo INT,
    FOREIGN KEY (JOGO_cod_Jogo) REFERENCES Jogo (cod_Jogo) 
);


INSERT INTO login (login, senha) VALUES ('admin','admin');



INSERT INTO FUNCIONARIO (nome, idade, rg,cpf,endereco,cargo)
 VALUES ('Diego Raimundo Antonio',22,54554545,06605444554,'Rua Francisco Silva ','SECRETÁRIO(A)');
 
 INSERT INTO FUNCIONARIO (nome, idade, rg,cpf,endereco,cargo)
 VALUES ('Lucas Almeida Antonio',25,545545,06554451400,'Rua Francisco Silva ','SECRETÁRIO(A)');
 
 INSERT INTO FUNCIONARIO (nome, idade, rg,cpf,endereco,cargo)
 VALUES ('Camila Silva',30,51114545,07602444554,'Rua Alameda ','TREINADOR');
 
 INSERT INTO FUNCIONARIO (nome, idade, rg,cpf,endereco,cargo)
 VALUES ('ADSON SOUZA ',22,125121,06605354504,'Rua Numero 1 ','ADMINISTRADOR');
 
  INSERT INTO FUNCIONARIO (nome, idade, rg,cpf,endereco,cargo)
 VALUES ('GUSTAVO HENRRIQUE ',19,100121,06615350704,'Rua Numero 2 ','ADMINISTRADOR');
 
  INSERT INTO FUNCIONARIO (nome, idade, rg,cpf,endereco,cargo)
 VALUES ('MATEUS CARVALHO ',22,12821,07705154504,'Rua Numero 1 ','ADMINISTRADOR');
 
 
 INSERT INTO TURMA (nome,FUNCIONARIO_cod_Func) VALUES('SEGUNDA/QUARTA',1);
  INSERT INTO TURMA (nome,FUNCIONARIO_cod_Func) VALUES('TERÇA/QUINTA',1);
   INSERT INTO TURMA (nome,FUNCIONARIO_cod_Func) VALUES('QUARTA/SEXTA',1);
   
   
   
    INSERT INTO MATERIAL (nome, FUNCIONARIO_cod_Func)
 VALUES ('BOLA ',1);
   INSERT INTO MATERIAL (nome, FUNCIONARIO_cod_Func)
 VALUES ('CONE ',1);
   INSERT INTO MATERIAL (nome, FUNCIONARIO_cod_Func)
 VALUES ('CHUTEIRA ',1);
   INSERT INTO MATERIAL (nome, FUNCIONARIO_cod_Func)
 VALUES ('ÁGUA ',1);
   INSERT INTO MATERIAL (nome, FUNCIONARIO_cod_Func)
 VALUES ('CANELEIRA ',1);
 
 
 INSERT INTO ALUNO (nome, idade, rg,cpf,endereco,statusMedico,FUNCIONARIO_cod_Func,TURMA_cod_Turma)
 VALUES ('Antonio Lucas Rodrigues',12,54554545,06605444554,'Rua Francisco Silva ','APROVADO',1,2);
 
 INSERT INTO ALUNO (nome, idade, rg,cpf,endereco,statusMedico,FUNCIONARIO_cod_Func,TURMA_cod_Turma)
 VALUES ('Luiz Almeida Antonio   ',15,545545,06554451400,'Rua Francisco Silva ','APROVADO',1,2);
 
 INSERT INTO ALUNO (nome, idade, rg,cpf,endereco,statusMedico,FUNCIONARIO_cod_Func,TURMA_cod_Turma)
 VALUES ('Charles Henrrique',15,51114545,07602444554,'Rua Alameda ','APROVADO',1,2);
 
 INSERT INTO ALUNO (nome, idade, rg,cpf,endereco,statusMedico,FUNCIONARIO_cod_Func,TURMA_cod_Turma)
 VALUES ('Wanderson Omar Novais ',17,125121,06605354504,'Rua Numero 1 ','APROVADO',1,3);
 
  INSERT INTO ALUNO (nome, idade, rg,cpf,endereco,statusMedico,FUNCIONARIO_cod_Func,TURMA_cod_Turma)
 VALUES ('Gabriel Da Silva ',18,100121,06615350704,'Rua Numero 2 ','APROVADO',1,3);
 
  INSERT INTO ALUNO (nome, idade, rg,cpf,endereco,statusMedico,FUNCIONARIO_cod_Func,TURMA_cod_Turma)
 VALUES ('Gustavo Rodrigues ',16,12821,07705154504,'Rua Numero 1 ','APROVADO',1,3);
 
 
 
   INSERT INTO MENSALIDADE (valor, dataEmisao, dataVencimento,descricao,codigoBarras,ALUNO_cod_Aluno ,FUNCIONARIO_cod_Func)
 VALUES ('80.00','26/09/2018','26/10/2018','MENSALIDADE 01',1682989721.1376,1,1);
 
  INSERT INTO MENSALIDADE (valor, dataEmisao, dataVencimento,descricao,codigoBarras,ALUNO_cod_Aluno ,FUNCIONARIO_cod_Func)
 VALUES ('80.00','26/09/2018','26/10/2018','MENSALIDADE 01',1682989721.1471,2,1);
 
  INSERT INTO MENSALIDADE (valor, dataEmisao, dataVencimento,descricao,codigoBarras,ALUNO_cod_Aluno ,FUNCIONARIO_cod_Func)
 VALUES ('80.00','26/09/2018','26/10/2018','MENSALIDADE 01',1682989721.1256,3,1);
 
  INSERT INTO MENSALIDADE (valor, dataEmisao, dataVencimento,descricao,codigoBarras,ALUNO_cod_Aluno ,FUNCIONARIO_cod_Func)
 VALUES ('80.00','26/09/2018','26/10/2018','MENSALIDADE 01',1682989721.1376,4,1);
 
  INSERT INTO MENSALIDADE (valor, dataEmisao, dataVencimento,descricao,codigoBarras,ALUNO_cod_Aluno ,FUNCIONARIO_cod_Func)
 VALUES ('80.00','26/09/2018','26/10/2018','MENSALIDADE 01',1682989721.1176,5,1);
 
  INSERT INTO MENSALIDADE (valor, dataEmisao, dataVencimento,descricao,codigoBarras,ALUNO_cod_Aluno ,FUNCIONARIO_cod_Func)
 VALUES ('80.00','26/09/2018','26/10/2018','MENSALIDADE 01',1682989721.1006,6,1);
 

 
 
 SELECT * FROM MENSALIDADE M INNER JOIN ALUNO A ON(M.ALUNO_cod_Aluno=A.cod_Aluno);
 
 SELECT * FROM Turma T INNER JOIN Aluno A ON A.TURMA_cod_Turma = T.cod_Turma where T.cod_Turma = 2;
SELECT T.cod_Turma, T.nome AS 'TurmaNome', T.FUNCIONARIO_cod_Func, A.cod_Aluno, A.nome, A.idade, A.rg, A.cpf, A.endereco, A.statusMedico, A.FUNCIONARIO_cod_Func, A.TURMA_cod_Turma FROM Turma T INNER JOIN Aluno A ON A.TURMA_cod_Turma = T.cod_Turma where T.cod_Turma = 2;

