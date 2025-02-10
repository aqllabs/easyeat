# EasyEat

A modern restaurant discovery platform built with Laravel and real-time search capabilities.

## 🚀 Tech Stack

- **Backend Framework:** Laravel 11
- **Database:** PostgreSQL
- **Frontend:**
  - Livewire 3.0
  - Mingle.js
  - React Components
  - InstantSearch.js
- **Search Engine:** MeiliSearch
- **Authentication:** Laravel Jetstream
- **UI Framework:** Tailwind CSS

## ✨ Features

- Real-time search functionality
- Restaurant discovery and filtering
- Location-based services
- Interactive maps
- Dietary preference filtering
- Venue management system
- Chain restaurant support
- Contact form management
- Coming soon email collection

## 🛠 Prerequisites

- PHP 8.2+
- Composer
- Node.js & npm
- PostgreSQL
- MeiliSearch server
- Docker (optional)

## 📦 Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd easy-eat
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install Node.js dependencies:
```bash
npm install
```

4. Set up environment variables:
```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your database in `.env`:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Run migrations and seeders:
```bash
php artisan migrate
php artisan db:seed
```

7. Set up MeiliSearch:
```bash
# Configure MeiliSearch in .env
MEILISEARCH_HOST=http://127.0.0.1:7700
MEILISEARCH_KEY=your_master_key
```

8. Build assets:
```bash
npm run dev
```

## 🚀 Development

To start the development server:

```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Vite development server
npm run dev
```

## 🔧 Available Commands

- `php artisan serve` - Start the Laravel development server
- `npm run dev` - Start Vite development server
- `npm run build` - Build assets for production
- `php artisan test` - Run tests
- `php artisan scout:import` - Index models in MeiliSearch

## 🌐 Deployment

The project includes configuration files for:
- Docker deployment
- Fly.io deployment
- GitHub Actions CI/CD

## 📝 License

This project is open-sourced software licensed under the MIT license.
