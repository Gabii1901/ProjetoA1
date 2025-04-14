# Projeto A1 - Sistema de Cadastro de Usuários e Veículos (PHP)

## 📚 Sobre o projeto
Projeto desenvolvido para a atividade A1, com aplicação dos conteúdos aprendidos tanto em aula quanto com alguns tutoriais do youtube.

O sistema inclui:
- Cadastro e Login de Usuários
- Sessões para controle de acesso
- Segurança aplicada (validação de dados e criptografia de senha)
- Cadastro de Veículos atrelado ao usuário logado
- Estilização com CSS

---

## 🛠️ Tecnologias Utilizadas
- PHP 7.4+
- MySQL
- CSS3

---

## ⚙️ Como executar o projeto

1. Clone o repositório:
git clone https://github.com/seu-usuario/projeto-a1.git


2. Configure o banco de dados:
- Crie um banco `projeto_a1`.
- Execute o script `banco.sql` para criar as tabelas.

3. Configure a conexão:
- Ajuste o arquivo `db.php` com as suas credenciais de acesso ao banco de dados.

4. Rode o projeto em um servidor local (XAMPP, WAMP, Laragon, etc).

---

## 📋 Funcionalidades

- **Cadastro de Usuários: Cadastro de novos usuários com senha criptografada.**
- **Login e Sessões: Controle de login com manutenção de sessão segura.**
- **Cadastro de Veículos: Usuários podem cadastrar veículos no sistema.**
- ** Visualização Global de Veículos: Todos os veículos cadastrados ficam disponíveis para todos os usuários visualizarem.**
- **Proteção de Páginas: Apenas usuários logados têm acesso às áreas restritas.**
- **Logout: Encerramento seguro da sessão.**

## 🎨 Estilo Visual

- **Azul (#007BFF) para elementos principais.**
- **Verde (#28a745) para botões de sucesso.**
- **Branco para fundo e campos de entrada.**
- **Layout simples e responsivo.**


## 📚 Referências

Como conectar PHP ao banco de dados MYSQL - ATUALIZADO 2022 - Zero Bugs - Programação em Tutorial
Sistema de Cadastro/Login com PHP - Gustavo Neitzke
