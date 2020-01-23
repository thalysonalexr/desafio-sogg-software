CREATE TABLE IF NOT EXISTS clientes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  cpf VARCHAR(11) NOT NULL,
  data_nasc DATE NOT NULL,
  sexo ENUM("M", "F"),
  civil ENUM("Solteiro", "Casado", "Divorciado", "Viuvo"),
  email VARCHAR(100) NOT NULL,
  telefone VARCHAR(11),
  endereco VARCHAR(255),
  cep VARCHAR(8),
  PRIMARY KEY(id),
  UNIQUE KEY email (email),
  UNIQUE KEY cpf (cpf)
);

INSERT INTO clientes(nome, cpf, data_nasc, sexo, civil, email, telefone, endereco, cep)
VALUES ("Thalyson Rodrigues", "00011155577", "1997-02-24", "M", "Solteiro", "tha.motog@gmail.com", "67998535410", "Av. Foo Bar, 5555", "78418000");

INSERT INTO clientes(nome, cpf, data_nasc, sexo, civil, email, telefone, endereco, cep)
VALUES ("Wllian", "10011155577", "1999-02-24", "M", "Solteiro", "tha1.motog@gmail.com", "67998535410", "Av. Foo Bar, 5555", "78418000");

INSERT INTO clientes(nome, cpf, data_nasc, sexo, civil, email, telefone, endereco, cep)
VALUES ("Thalyson Rodrigues", "20011155577", "1967-02-24", "M", "Solteiro", "tha2.motog@gmail.com", "67998535410", "Av. Foo Bar, 5555", "78418000");
