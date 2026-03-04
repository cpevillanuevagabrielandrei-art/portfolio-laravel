# 🎨 Laravel Portfolio CMS

A fully dynamic, Laravel-powered personal portfolio website with a built-in CMS backend. Built from the HTML/CSS/JS portfolio tutorial, upgraded with:

- **Laravel 10** backend (MVC, Eloquent ORM, Blade templates)
- **SASS** styling (variables, mixins, responsive breakpoints)
- **Full CMS** admin panel to manage all content
- **Contact form** with database storage
- **Image uploads** for projects and profile pictures
- **SQLite** (default) or MySQL support

---

## 📁 Project Structure

```
portfolio-laravel/
├── app/
│   ├── Http/Controllers/
│   │   ├── PortfolioController.php       # Public frontend
│   │   └── Admin/
│   │       ├── AdminController.php       # CMS - all admin actions
│   │       └── AuthController.php        # Admin login/logout
│   └── Models/
│       ├── User.php
│       ├── Setting.php                   # Key-value site settings
│       ├── SkillCategory.php
│       ├── Skill.php
│       ├── Project.php
│       └── ContactMessage.php
│
├── database/
│   ├── migrations/                       # DB schema
│   └── seeders/DatabaseSeeder.php        # Sample data + admin user
│
├── resources/
│   ├── sass/
│   │   ├── _variables.scss               # Colors, fonts, breakpoints
│   │   ├── _mixins.scss                  # Reusable SASS mixins
│   │   ├── app.scss                      # Portfolio frontend styles
│   │   └── admin.scss                    # CMS admin styles
│   ├── js/
│   │   ├── app.js                        # Portfolio JS
│   │   └── admin.js                      # Admin panel JS
│   └── views/
│       ├── layouts/
│       │   ├── portfolio.blade.php       # Public layout
│       │   └── admin.blade.php           # Admin layout with sidebar
│       ├── portfolio/
│       │   └── index.blade.php           # Main portfolio page
│       └── admin/
│           ├── login.blade.php
│           ├── dashboard.blade.php
│           ├── settings.blade.php
│           ├── messages.blade.php
│           ├── message-show.blade.php
│           ├── skills/index.blade.php
│           └── projects/
│               ├── index.blade.php
│               ├── create.blade.php
│               └── edit.blade.php
│
└── routes/web.php                        # All routes
```

---

## 🚀 Setup Instructions

### Prerequisites
- PHP 8.1+
- Composer
- Node.js 16+ & npm

### 1. Install PHP Dependencies
```bash
composer install
```

### 2. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Database Setup (SQLite by default)
```bash
touch database/portfolio.sqlite
php artisan migrate
php artisan db:seed
```

### 4. Install & Compile Assets (SASS)
```bash
npm install
npm run build
# or for development with hot-reload:
npm run dev
```

### 5. Storage Link (for image uploads)
```bash
php artisan storage:link
```

### 6. Start the Server
```bash
php artisan serve
```

Visit:
- **Portfolio:** http://localhost:8000
- **Admin CMS:** http://localhost:8000/admin

### Default Admin Credentials
```
Email:    admin@portfolio.com
Password: password123
```
> ⚠️ Change these in `.env` before deployment!

---

## 🎛️ CMS Admin Features

| Section | Features |
|---------|----------|
| **Dashboard** | Stats overview, recent messages, quick actions |
| **Profile & Settings** | Name, title, bio, links, profile photos |
| **Projects** | Add/edit/delete projects, image upload, live/GitHub links, visibility toggle |
| **Skills** | Manage skill categories and individual skills with proficiency levels |
| **Messages** | View contact form submissions, mark read/unread, reply via email |

---

## 🎨 SASS Architecture

The styles use a modular SASS structure:

```scss
// _variables.scss — all design tokens
$color-dark:     #353535;
$font-family:    'Poppins', sans-serif;
$border-radius:  2rem;

// _mixins.scss — reusable patterns
@mixin flex-center { ... }
@mixin button-filled { ... }
@mixin respond-to('mobile') { ... }

// app.scss — portfolio styles using variables + mixins
// admin.scss — admin panel styles
```

---

## 🗄️ Database Schema

```
settings          (key, value)
users             (name, email, password)
skill_categories  (name, sort_order)
skills            (category_id, name, level, sort_order, is_active)
projects          (title, description, image, github_url, live_url, sort_order, is_active)
contact_messages  (name, email, subject, message, is_read)
```

---

## 🔧 MySQL Setup (Optional)

Edit `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=your_password
```

Then run migrations as usual.

---

## 📦 Production Deployment

```bash
composer install --no-dev --optimize-autoloader
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
```

Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`.

---

## 📝 License

MIT
