# 🎓 TechCrafters - Udemy Clone with Laravel, Livewire & Admin Panel

TechCrafters is a full-featured online course marketplace inspired by Udemy, built with Laravel. It includes a dynamic frontend using AJAX, a Livewire-powered backend for admin operations, and a responsive Admin Panel built on AdminLTE.

---

## 🚀 Features

- 🧑‍🏫 Course Management System (CRUD)
- 📂 Categories & Subcategories with Eloquent Relationships
- ⚡ AJAX-powered frontend course and category loading
- 📡 RESTful APIs for dynamic UI updates
- 🎛️ Admin Panel using AdminLTE
- ⚙️ Livewire Components for admin CRUD
- 🔍 AJAX Search bar functionality
- 🎨 Modern, responsive frontend design
---

## 🛡️ Admin Panel

TechCrafters includes a secure admin dashboard built using AdminLTE. It allows platform managers to create, update, and delete categories, subcategories, and courses.

📸 Screenshots
Public Frontend (Home Page)
<img width="1440" alt="Screenshot 2025-06-21 at 10 52 28 PM" src="https://github.com/user-attachments/assets/3c32a07e-524b-44d0-afe6-69e86b81b9ed" />


Admin Dashboard (Course Management)
<img width="1440" alt="Screenshot 2025-06-21 at 10 49 21 PM" src="https://github.com/user-attachments/assets/7b3869fc-cb2f-4bc2-86b7-eecd3e3602d2" />

### Admin Panel Features:

- Role-based authentication middleware
- Dashboard UI with sidebar and top nav
- Manage courses, categories, subcategories
- Upload course details and thumbnails
- Livewire-powered real-time forms
- Table views with action buttons

---

## 📲 API Endpoints

The platform exposes several AJAX-friendly endpoints for dynamic interaction.

| Method | Endpoint                | Description                     |
|--------|-------------------------|---------------------------------|
| GET    | /api/categories         | Get all categories              |
| GET    | /api/courses            | Get all courses                 |
| GET    | /api/course/{id}        | Get specific course detail      |
| POST   | /api/add-course         | Add course (admin)              |
| POST   | /api/delete-course/{id} | Delete course (admin)           |

You can integrate these endpoints into your frontend using `fetch` or `$.ajax`.

---

## 🔧 Installation Guide

```bash
# Clone the repository
git clone https://github.com/yourusername/laravel-skill-sphere.git
cd laravel-skill-sphere

# Install dependencies
composer install
npm install && npm run dev  # optional if you're using assets

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure database in .env
php artisan migrate
php artisan db:seed  # optional if seeders are provided

# Serve the application
php artisan serve

Visit http://127.0.0.1:8000 to see the frontend.
Admin panel typically runs on http://127.0.0.1:8000/admin (based on your route config).


## 🧰 Tech Stack
Backend: Laravel 10+, PHP 8.2

Frontend: Blade, jQuery, Bootstrap

Livewire: For dynamic backend interactions

AdminLTE: For the admin panel UI

Database: MySQL

 Testing & Dev Notes
Run php artisan tinker to play with models.

Run php artisan migrate:fresh --seed for a reset.

Livewire dev tools recommended (composer require livewire/livewire).

