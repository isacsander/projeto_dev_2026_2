# Missão Espacial - Centro de Comando

Sistema completo de recrutamento e gestão de candidatos para missões espaciais. 

# Como executar o projeto (Instruções Docker)

Este projeto foi construído utilizando o Laravel Sail (Docker). Certifique-se de ter o Docker Desktop instalado e rodando em sua máquina.

1. **Clone este repositório:**
   `git clone https://github.com/isacsander/projeto_dev_2026_2.git`
   `cd projeto_dev_2026_2`

2. **Configure o arquivo de ambiente:**
   `cp .env.example .env`

3. **Instale as dependências (via container temporário):**
   `docker run --rm -v $(pwd):/var/www/html -w /var/www/html laravelsail/php83-composer:latest composer install`

4. **Suba os containers do projeto:**
   `./vendor/bin/sail up -d`

5. **Gere a chave da aplicação e crie o banco de dados (já com os dados iniciais):**
   `./vendor/bin/sail artisan key:generate`
   `./vendor/bin/sail artisan migrate:fresh --seed`

# Acesso ao Sistema

* **Página de Inscrição (Pública):** http://localhost
* **Painel do Comandante:** http://localhost/login
  * **E-mail:** admin@missao.com
  * **Senha:** senha123

# Teste de E-mails Transacionais

O sistema possui disparo automatizado de e-mails quando um recruta é **Aprovado**. Para visualizar os e-mails interceptados localmente (sem precisar de um servidor real), acesse a interface do Mailpit acoplada ao Docker em: http://localhost:8025