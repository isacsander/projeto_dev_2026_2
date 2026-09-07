# Decisões Arquiteturais e Uso de IA

# 1. Stack Tecnológica e Tema
**Stack:** Laravel 11, MySQL, Docker (Sail) e CSS Puro (Vanilla).
Optei pelo Laravel por sua robustez no backend (ORM, validações e autenticação via Breeze). O Docker foi escolhido para garantir um ambiente isolado e padronizado. Ao decidir remover o framework de CSS padrão e trabalhar com CSS puro, meu ganho foi ter um controle absoluto sobre a semântica do HTML e a organização dos arquivos de estilo (`public/css`), facilitando a manutenção e provando domínio sobre a base da web.

# 2. O Uso de Inteligência Artificial (IA)
Assumi a IA como uma parceira de *pair programming*, atuando como desenvolvedor principal do produto. 

* **O que deleguei e o que fiz à mão:** Toda a concepção visual e o design da interface foram idealizados e desenhados por mim previamente no Figma. O que deleguei para a IA foi apenas a "mão de obra pesada" de traduzir o meu design visual do Figma para código HTML e CSS puro. A arquitetura do projeto, a modelagem de banco, o fluxo dos controllers e as regras de negócio (como o disparo de e-mails via Mailpit) foram escritos totalmente à mão por mim. Nesse backend, utilizei a IA estritamente como um "revisor de código", pedindo para ela analisar a minha lógica estrutural em busca de melhorias de sintaxe ou correções pontuais. O motivo: a criatividade visual e a inteligência do sistema precisam ser minhas; a IA entrou apenas para acelerar a codificação do CSS e atuar como um revisor para garantir a qualidade do que eu já havia criado.

* **Onde a IA errou e eu corrigi:** Na hora de finalizar o projeto, pedi ajuda à IA para enviar o código para o GitHub. Ela me deu os comandos padrão para fazer um `git push` direto para o repositório original. Eu percebi na hora que isso estava errado em relação ao teste, pois a especificação exigia explicitamente a criação de um "Fork" e a abertura de um "Pull Request". Recusei a sugestão dela, fui ler a documentação do Git e configurei manualmente o controle de versão para apontar para o meu Fork, garantindo a entrega via PR conforme o exigido.

* **Uma decisão contra a IA:** Ao me ajudar a montar o código das telas, a IA sugeriu fortemente que eu usasse o Tailwind CSS (que já vem no Laravel Breeze) para "ganhar tempo". Decidi ir contra essa sugestão. Exigi que ela gerasse a interface em CSS puro para que eu pudesse separar as responsabilidades visual e estrutural. Fiz isso porque não queria depender de centenas de classes utilitárias no HTML; queria um código limpo que eu mesmo pudesse ler, revisar e explicar linha por linha.