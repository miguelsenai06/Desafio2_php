# Desafio 2 - Cadastro de Produtos em PHP

Projeto desenvolvido para praticar PHP, HTML e MySQL.

## Requisitos

- PHP
- MySQL
- XAMPP, WAMP ou outro servidor local compatível

## Banco de dados

Execute o arquivo `banco.sql` no MySQL ou phpMyAdmin.

Ele cria:

- Banco `exercicio`
- Tabela `produtos`

## Como executar no XAMPP

1. Coloque a pasta `desafio2_produtos` dentro de `C:\xampp\htdocs`.
2. Abra o XAMPP.
3. Inicie Apache e MySQL.
4. Abra o phpMyAdmin e execute o arquivo `banco.sql`.
5. No navegador, acesse:

```text
http://localhost/desafio2_produtos/10a_desafio2.php
```

## Funcionalidades

- Formulário com Nome do Produto e Preço
- Validação do nome
- Validação de preço maior que zero
- Cadastro no banco MySQL
- Mensagem de sucesso ou erro
