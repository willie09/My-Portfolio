# My Portfolio - Laravel + Inertia.js

## Local Development

### Prerequisites

- PHP 8.2+
- Composer
- Node.js 18+
- MySQL/MariaDB
- Git

### Installation

```bash
git clone https://github.com/willie09/My-Portfolio.git
cd My-Portfolio
cp .env.example .env
php artisan key:generate
composer install
npm install
npm run build
php artisan migrate
php artisan db:seed
php artisan serve
```

Visit `http://localhost:8000`

### SMTP for Contact Form

See `TODO_SMTP_FIX.md` for Gmail config.

## Production Deployment - Hostinger (Recommended)

### 1. Push Changes to GitHub

```bash
git add .
git commit -m "Your commit message"
git push origin main
```

### 2. Hostinger hPanel Git Deployment

- Login to hPanel > **Git** > **Create New Repository**
- **Clone Type**: Git
- **Repository URL**: `https://github.com/willie09/My-Portfolio.git`
- **Branch**: `main`
- **Deploy Path**: `public_html`
- **Deploy**: Automatic on push (recommended)
- Click **Clone**

### 3. Post-Deployment Setup (SSH or File Manager)

SSH to server: `ssh username@yourserver.hostinger.com`

```bash
cd public_html
composer install --no-dev --optimize-autoloader --no-interaction
npm ci --only=production
npm run build
php artisan key:generate --force
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache  # if possible
```

### 4. Configure .env (File Manager or SSH)

Edit `public_html/.env`:

```
APP_NAME="My Portfolio"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://willie.pacelib.online

DB_CONNECTION=mysql
DB_HOST=your-mysql-host.hostinger.com  # From hPanel > Databases
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_pass

# Mail (Gmail App Password)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your@gmail.com
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your@gmail.com
MAIL_FROM_NAME="Willie"
```

**Document Root**: Ensure domain points to `/public_html/public` in hPanel Domains.

### 5. Verify

- Visit https://willie.pacelib.online
- Check admin dashboard, contact form.
- Logs: `tail -f public_html/storage/logs/laravel.log`

## GitHub Actions (Optional)

`.github/workflows/main.yml` automates build on push.

## Troubleshooting

- 500 Error: Check permissions, `php artisan config:clear`
- Assets 404: Ensure `npm run build`
- DB Errors: Verify MySQL creds in hPanel.

**Repo**: https://github.com/willie09/My-Portfolio
