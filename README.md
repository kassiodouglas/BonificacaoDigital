# Bonificação Digital V1.0.0

Esta aplicação tem por finalidade criar um painel administrativo, para controle da moeda digital de uma empresa, esta moeda será ganha quando os funcionários completarem metas ou tarefas especificas. Está moeda poderá ser trocada por produtos e serviços parceiros da empresa. Os administradores podem criar e editar usuários e suas movimentações. Usuários só podem ver seu saldo e suas movimentações.
<br>




## Instalação
---

Configure o arquivo '.env' com as informações do banco de dados.

Rode o comando para subir as tabelas
```
php artisan migrate
```


Rode o comando para subir os registros
```
php artisan db:seed
```

OBS: O comando de *seed* cria um usuário **admin** com a senha **admin**, outros 50 usuários e 150 movimentações para testes. A senha padrão de novos usuários é **123456**;
<br>




## Recursos utilizados
---
* **Laravel Breeze**: para controle de login e autenticação;
* **Notiflix**: biblioteca JS para criar notificações, loaders e confirmações de ações;
* **Bootstrap**: biblioteca frontend com componentes e designs prontos;
* **FontAwesome**: biblioteca de icones;

