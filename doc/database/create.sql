CREATE TABLE usuario(
  id_usuario INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(150) NOT NULL,
  email VARCHAR(150) NOT NULL,
  senha VARCHAR(150) NOT NULL,
  PRIMARY KEY (id_usuario)
);


CREATE TABLE categoria(
  id_categoria INT NOT NULL AUTO_INCREMENT,
  id_categoria_mae INT NULL DEFAULT NULL,
  nome VARCHAR(150) NOT NULL,
  imagem VARCHAR(100) NULL DEFAULT NULL,
  slug VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (id_categoria),
  FOREIGN KEY (id_categoria_mae) REFERENCES categoria(id_categoria)
);


CREATE TABLE produto(
  id_produto INT NOT NULL AUTO_INCREMENT,
  id_categoria INT NOT NULL,
  nome VARCHAR(100) NOT NULL,
  descricao TEXT NOT NULL,
  slug VARCHAR(150) NOT NULL,
  PRIMARY KEY (id_produto),
  FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);


CREATE TABLE imagem(
  id_imagem INT NOT NULL AUTO_INCREMENT,
  id_produto INT NOT NULL,
  imagem VARCHAR(150) NOT NULL,
  capa BOOLEAN NOT NULL DEFAULT false,
  PRIMARY KEY (id_imagem),
  FOREIGN KEY (id_produto) REFERENCES produto(id_produto)
);


CREATE TABLE noticia(
  id_noticia INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  imagem VARCHAR(100) NOT NULL,
  data TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  texto LONGBLOB NOT NULL,
  resumo TEXT NOT NULL,
  palavras_chave VARCHAR(150) NOT NULL,
  status BOOLEAN NOT NULL DEFAULT true,
  PRIMARY KEY (id_noticia)
);