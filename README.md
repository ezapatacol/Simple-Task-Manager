# 📝 Simple Task Manager MVP (Starter Tier)

A lightweight Laravel-based MVP demonstrating **essential SaaS features**:  
- User Authentication
- Role-based Access (optional)
- Basic Task CRUD Operations
- Responsive Dashboard UI  

This project is part of my **SaaS MVP Upwork Project Catalog** offering, designed for clients who need a fast, functional prototype to validate their idea.

---

## Features
- **User Registration & Login** (Laravel Breeze)
- **Secure Dashboard** for authenticated users
- **Task Management** (Create, Read, Update, Delete)
- **Responsive UI** with Bootstrap
- **Clean, extendable code** ready for scaling

---

## Preview
![Dashboard Preview](screenshot.png)  
*(Example: Welcome screen with task list)*

---

## Tech Stack
- **Backend:** Laravel 10
- **Frontend:** Blade Templates + Bootstrap 5
- **Database:** MySQL (SQLite optional for local dev)
- **Auth:** Laravel Breeze

---

## Installation

```bash
# 1️ Clone the repository
git clone https://github.com/yourusername/simple-task-manager-mvp.git
cd simple-task-manager-mvp

# 2️ Install dependencies
composer install
npm install && npm run build

# 3️ Set up environment variables
cp .env.example .env
php artisan key:generate

# 4️ Configure your database in .env and migrate
php artisan migrate

# 5️⃣ Serve the app
php artisan serve
