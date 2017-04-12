# Replace URL WordPress #

Quando migramos um site WordPress do ambiente de desenvolvimento (local) para o de produção ou vice-versa, sabemos que é um pouco chato alterar os URL's no banco de dados do WordPress usando plugins ou até mesmo SQL manual. Este script foi criado com intuíto de acabar de vez com essa chatisse utilizando apenas **um clique**. 

## Como Usar ##

1. Faça o upload desse script [replace-url.php] na raiz do seu host. (mesma pasta do arquivo wp-config.php)
2. Acesse o script diretamente do seu navegador (ex: dominio.com/replace-url.php)
3. Siga as instruções e clique no botão Executar.
4. Delete o script após o uso.

## Notas ##

* Backup: Antes começar, certifique-se de [fazer o backup do seu banco de dados](http://codex.wordpress.org/pt-br:Backups_do_Banco_de_Dados).
* Delete-me: É importante que, após utiliza-lo, você delete o script do servidor de produção.

## Changlog ##

#### v2.0.0 - 17/11/2014 ####
* Performace melhorada
* Feedback de linhas afetadas após o replace
* Design Bootstrap v3

#### v1.0.1 - 25/07/2013 ####
* Incluído substituição de URL's na tabela **postmeta**.
* Incluído substituição de URL's na tabela **options**.

#### v1.0.0 - 23/07/2013 ####
* Commit inicial.

## Suporte ##

Reporte bugs ou faça sugestões utilizando o [Issues/Fórum](https://github.com/adammacias/Replace-URL-WordPress/issues).
