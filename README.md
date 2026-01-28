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
