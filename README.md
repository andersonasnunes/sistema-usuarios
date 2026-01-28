<<<<<<< HEAD
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
## 📌 Sistema de Gerenciamento de Usuários

Aplicação web desenvolvida em Laravel 12 + Livewire + Tailwind CSS, com foco em CRUD de usuários, controle de status (ativo/inativo), filtros e interface moderna.
Projeto ideal para portfólio e estudos de boas práticas com Livewire.

## 🚀 Funcionalidades

✅ Cadastro, edição e exclusão de usuários  
🔁 Alternância de status (Ativo / Inativo)  
🔍 Filtro por status (Todos, Ativos, Inativos)  
🔐 Senhas criptografadas  
🎨 Interface moderna com Tailwind CSS  
⚡ Interatividade em tempo real com Livewire  

## 🛠️ Tecnologias Utilizadas

* PHP 8.3  
* Laravel 12  
* Livewire  
* MySQL  
* Tailwind CSS  
* Vite  
* Composer & NPM  

## 📋 Pré-requisitos

Antes de iniciar, você precisa ter instalado:

* PHP >= 8.2    
* Composer   
* Node.js e NPM    
* MySQL    
* Git    

## ⚙️ Instalação e Execução

### 1️⃣ Clone o repositório  
```
git clone https://github.com/seu-usuario/ sistema-usuarios.git
```  
```
cd sistema-usuarios
``` 

### 2️⃣ Instale as dependências PHP
```
composer install
``` 

### 3️⃣ Instale as dependências front-end
```
npm install
```

### 4️⃣ Configure o ambiente
##### Copie o arquivo .env.example:
```
cp .env.example .env
```

##### Gere a chave da aplicação:
```
php artisan key:generate
```

##### Configure o banco de dados no arquivo ```.env```:  

```
DB_DATABASE=sistema_usuarios  
DB_USERNAME=root  
DB_PASSWORD=
```  

##### *💡 Dica: Se estiver usando Laragon, o PHP e o MySQL já vêm configurados automaticamente.*  


### 5️⃣ Execute as migrations
```
php artisan migrate
```

### 6️⃣ Compile os assets  
```
npm run dev
```

### 7️⃣ Inicie o servidor  
```
php artisan serve
```

##### Acesse no navegador:  
```
http://127.0.0.1:8000
```   
`/dashboard`  
`/users`   
`/users/create` 

##### *💡 Será permitido o registro, mas um novo cadastro apenas se o usuário estiver logado* 

### 🗂️ Estrutura do Projeto (Resumo)

```
app/
 └── Livewire/
     └── Users.php

resources/
 └── views/
     └── livewire/
         └── users.blade.php

database/
 └── migrations/

routes/
 └── web.php
 ```

### 📄 Observações  

* Projeto desenvolvido com foco em boas práticas, organização de código e experiência do usuário

* Ideal para portfólio, estudos ou base para projetos maiores

* Interface totalmente responsiva

### 📄 Licença

*Este projeto foi desenvolvido para fins educacionais e de portfólio.*

### 📩 Contato

[![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/andersonasnunes/)
>>>>>>> e026f86beabcbf117832d0c542af49aee470b26d
