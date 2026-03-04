#!/bin/bash
# ============================================
# Portfolio Laravel — Quick Setup Script
# ============================================

set -e

echo "🚀 Setting up Laravel Portfolio CMS..."
echo ""

# 1. Check prerequisites
command -v php >/dev/null 2>&1 || { echo "❌ PHP is required but not installed. Aborting."; exit 1; }
command -v composer >/dev/null 2>&1 || { echo "❌ Composer is required. Install from https://getcomposer.org"; exit 1; }
command -v node >/dev/null 2>&1 || { echo "❌ Node.js is required. Install from https://nodejs.org"; exit 1; }

echo "✅ Prerequisites OK"
echo ""

# 2. Install PHP dependencies
echo "📦 Installing PHP dependencies..."
composer install

# 3. Environment
echo "⚙️  Setting up environment..."
cp .env.example .env
php artisan key:generate
echo ""

# 4. Database
echo "🗄️  Setting up SQLite database..."
touch database/portfolio.sqlite
php artisan migrate
php artisan db:seed
echo ""

# 5. Node dependencies + SASS build
echo "🎨 Installing Node.js dependencies and compiling SASS..."
npm install
npm run build
echo ""

# 6. Storage link
echo "🔗 Creating storage symlink..."
php artisan storage:link
echo ""

echo "============================================"
echo "✅ Setup complete!"
echo ""
echo "🌐 Portfolio:   http://localhost:8000"
echo "🔐 Admin CMS:  http://localhost:8000/admin"
echo ""
echo "Admin credentials:"
echo "  Email:    admin@portfolio.com"
echo "  Password: password123"
echo ""
echo "▶️  Run: php artisan serve"
echo "============================================"
