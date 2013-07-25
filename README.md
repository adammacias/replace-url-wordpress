# Replace URL WordPress #

Quando migramos um site em WordPress do ambiente de desenvolvimento para o de produção ou vice-versa, sabemos que é um pouco chato alterar os URL's no banco de dados do WordPress usando plugins ou até mesmo SQL. Este script foi criado com intuíto de acabar de vez com essa chatisse utilizando apenas **um clique**.

## Como Usar ##

1. Faça o upload desse script [replace-url.php] na raiz do seu host. (mesma pasta do arquivo wp-config.php)
2. Acesse o script diretamente do seu navegador (ex: dominio.com/replace-url.php)
3. Siga as instruções e clique no botão Salvar.
4. Delete o script após o uso.

## Notas ##

* Backup - Certifique-se de ter um backup do seu banco de dados antes, isto é sempre bom!
* Delete-me - É muito importante que você delete este script do seu servidor após o uso. Caso contrário, se algum vilão descobrir esta página, isso pode ocasionar uma grande dor de cabeça! :(

## Changlog ##

#### v1.0.1 - 25/07/2013 ####
* Incluído substituição de URL's na tabela **postmeta**.
* Incluído substituição de URL's na tabela **options**.

#### v1.0.0 - 23/07/2013 ####
* Commit inicial.

## Contribua com o Projeto ##

Caso queira contribuir, basta usar o botão **Fork**, criar um *Branch*, arrumar o código e enviá-lo com um **Pull Request**.

Reporte bugs ou faça sugestões utilizando o [Issues/Fórum](https://github.com/adammacias/Replace-URL-WordPress/issues).