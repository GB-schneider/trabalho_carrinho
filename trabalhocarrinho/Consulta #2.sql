CREATE DATABASE mercadophp;

USE mercadophp;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);

INSERT INTO produtos (nome, descricao, preco) VALUES
('iphone16', 'iphone 16 muito bom.', 12249.99),
('iphone14', 'iphone 14 pior que o 15.', 4149.99),
('iphone15', 'iphone 15 e legal.', 5199.90);
ALTER TABLE produtos ADD COLUMN imagem VARCHAR(255) NOT NULL;

SELECT * FROM produtos;

UPDATE produtos SET imagem = 'imagem_produto1.png' WHERE id = 1;
UPDATE produtos SET imagem = 'imagem_produto2.png' WHERE id = 2;
UPDATE produtos SET imagem = 'imagem_produto3.png' WHERE id = 3;

