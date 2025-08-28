# 📚 Sistema de Gestão de Livros

Este projeto foi desenvolvido em **Laravel 10** como parte de um **teste técnico**.  
O sistema permite o gerenciamento de **Autores, Assuntos e Livros**, incluindo seus relacionamentos, oferecendo endpoints **RESTful** e relatórios baseados em uma **view SQL**.

---

## 🚀 Tecnologias Utilizadas

-   [Laravel 10](https://laravel.com)
-   [PHP 8+](https://www.php.net/)
-   [MySQL 8+](https://www.mysql.com/)
-   [Composer](https://getcomposer.org/)
-   [PHPUnit](https://phpunit.de/) – Testes automatizados
-   [Blade](https://laravel.com/docs/10.x/blade) – Templates e relatórios

---

## ⚙️ Pré-requisitos

Antes de rodar o projeto, verifique se possui instalado:

-   PHP 8.1+
-   Composer
-   MySQL 8.0+
-   Extensões do PHP habilitadas: `mbstring`, `pdo`, `pdo_mysql`, `openssl`, `tokenizer`, `xml`, `ctype`

---

## 🔧 Instalação e Configuração

### 1. Clonar o repositório

```bash
git clone https://github.com/leandro-web/spassu.git
cd spassu
```

### 2. Instalar as dependências

```bash
composer install
```

### 3. Criar o arquivo de ambiente

```bash
cp .env.example .env
```

### 4. Configurar o banco de dados

No arquivo `.env`, configure as credenciais do MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_livros
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

### 5. Gerar a chave da aplicação

```bash
php artisan key:generate
```

### 6. Criar o banco de dados no MySQL

```sql
CREATE DATABASE sistema_livros;
```

### 7. Rodar as migrations

```bash
php artisan migrate
```

### 8. Rodar o servidor local

```bash
php artisan serve
```

➡️ Acesse em: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📌 Endpoints Principais

### Autores

-   `GET /api/autores` → Listar autores
-   `POST /api/autores` → Criar autor
-   `GET /api/autores/{id}` → Detalhar autor
-   `PUT /api/autores/{id}` → Atualizar autor
-   `DELETE /api/autores/{id}` → Remover autor

### Assuntos

-   `GET /api/assuntos` → Listar assuntos
-   `POST /api/assuntos` → Criar assunto
-   `GET /api/assuntos/{id}` → Detalhar assunto
-   `PUT /api/assuntos/{id}` → Atualizar assunto
-   `DELETE /api/assuntos/{id}` → Remover assunto

### Livros

-   `GET /api/livros` → Listar livros
-   `POST /api/livros` → Criar livro
-   `GET /api/livros/{id}` → Detalhar livro
-   `PUT /api/livros/{id}` → Atualizar livro
-   `DELETE /api/livros/{id}` → Remover livro

---

## 📊 Relatórios

O sistema gera relatórios a partir da **view SQL `vw_livros_relatorio`**, que retorna os livros agrupados por autor, incluindo seus respectivos assuntos.

Acesse o relatório em:  
[http://127.0.0.1:8000/relatorios](http://127.0.0.1:8000/relatorios)

---

## ✅ Testes Automatizados

Os testes cobrem:

-   CRUD de Autores, Assuntos e Livros
-   Relacionamentos entre as entidades
-   Regras de validação

### Rodar todos os testes

```bash
php artisan test
```

---

## 👨‍💻 Autor

Desenvolvido por **Leandro Rafael de Oliveira**  
📎 [LinkedIn](https://www.linkedin.com/in/leandrorafaelo/)  
📧 leandro-web@hotmail.com

---
