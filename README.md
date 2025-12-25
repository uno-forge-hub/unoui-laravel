![Cover Image](/public/cover-image.webp)

# ⚡ Laravel + Livewire + Volt + UnoCSS

A **smart starter kit** to kickstart your next Laravel project with a modern frontend and component-driven development flow.

## ✨ What's Inside

- 🔑 **Authentication** (Login, Register, Password Reset, Email Verification)
- 📊 **Dashboard** layout with navigation and basic pages
- **[Laravel 12](https://laravel.com/)** – PHP framework for web artisans
- **[Livewire](https://livewire.laravel.com/)**
- **[Volt](https://livewire.laravel.com/docs/volt)** 
- **[UnoCSS](https://unocss.dev/)** – instant atomic CSS engine, zero runtime
- **[Flexilla](https://github.com/unoforge/flexilla)** – Interactive components (modal, dropdown, popover, accordion, tabs...)
- **[Preset UI](https://github.com/unoforge/unify-preset)** – Preset for UnoCSS with utility classes for buttons, forms, cards, etc... 


---

## 🛠️ Installation

```bash
# Clone the repo
git clone https://github.com/uno-forge-hub/unoui-laravel.git project-name

cd project-name

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Start development server
php artisan serve
npm run dev
