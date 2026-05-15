# 🚀 Simple PHP MVC + Repository Pattern

Um pequeno sistema estruturado em **MVC (Model-View-Controller)** desenvolvido em PHP puro, focado em simplicidade, organização e boas práticas. Este projeto implementa o **Repository Design Pattern** para isolar a lógica de acesso a dados, mantendo os controllers limpos e o código altamente testável e manutenível.

## 🎯 Funcionalidades

* **Arquitetura MVC:** Separação clara entre Lógica de Negócio (Model), Interface (View) e Controle de Requisições (Controller).
* **Repository Pattern:** Abstração das consultas ao banco de dados, facilitando a troca de ORMs ou drivers de banco no futuro.
* **Rotas Simples:** Ponto de entrada único (`public/index.php`) lidando com as requisições.
* **PDO Integrado:** Conexão segura com o banco de dados prevenindo SQL Injection.

## 📂 Estrutura de Diretórios

A estrutura do projeto foi pensada para ser intuitiva:

```text
├── app/
│   ├── Controllers/    # Lida com as requisições HTTP e retorna as Views
│   ├── Models/         # Entidades que representam as tabelas do banco
│   ├── Repositories/   # Lógica de acesso a dados (Consultas SQL)
│   └── Views/          # Arquivos HTML/PHP com a interface do usuário
├── config/
│   └── database.php    # Configurações de conexão com o banco (PDO)
├── public/
│   ├── index.php       # Entry point da aplicação (Front Controller)
│   └── assets/         # CSS, JS e Imagens
├── routes/
│   └── web.php         # Configurações de rotas
│   
└── README.md