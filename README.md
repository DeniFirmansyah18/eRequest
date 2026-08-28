# eRequest — Application Request Management System

> A web-based application built with **Laravel 10** that enables government departments (OPD) to submit digital application development requests and allows administrators to review, verify, and track them in real time — with Telegram notifications for instant alerts.

---

## 📋 Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Requirements](#requirements)
- [Installation](#installation)
- [Environment Configuration](#environment-configuration)
- [Telegram Notification Setup](#telegram-notification-setup)
- [Default Credentials](#default-credentials)
- [Project Structure](#project-structure)
- [Changelog](#changelog)
- [License](#license)

---

## Overview

**eRequest** is a digital request management platform designed for government institutions. It streamlines the process of submitting, reviewing, and tracking application development proposals from regional work units (OPD — *Organisasi Perangkat Daerah*).

The system provides two main user roles:

| Role | Description |
|------|-------------|
| **Admin** | Reviews and verifies incoming application requests, manages progress, and archives completed submissions. |
| **OPD User** | Submits new application development requests, tracks the status of existing submissions, and receives notifications. |

---

## Features

### Admin
- 📊 Dashboard with pending request count summary
- 📋 Application request list with search and pagination
- ✅ Approve or reject submissions with reviewer notes
- 📈 Real-time progress tracking per submission
- 📁 Submission history archive
- 🖨️ Print submission details

### OPD User
- 📝 Submit new application development requests (with file attachment support: `.doc`, `.docx`, `.pdf`)
- 🔍 View and search personal submission history
- ✏️ Edit pending submissions
- 🗑️ Delete submissions
- 🔔 Telegram notification upon submission

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| **Backend** | [Laravel 10](https://laravel.com/) (PHP ^8.1) |
| **Frontend** | [Livewire 3](https://livewire.laravel.com/), [Alpine.js 3](https://alpinejs.dev/) |
| **Styling** | [Tailwind CSS 3](https://tailwindcss.com/) |
| **Auth & Teams** | [Laravel Jetstream 4](https://jetstream.laravel.com/) + [Laravel Sanctum](https://laravel.com/docs/sanctum) |
| **Roles & Permissions** | [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission) |
| **Notifications** | [Laravel Telegram Notification Channel](https://github.com/laravel-notification-channels/telegram) |
| **Charts** | [Chart.js](https://www.chartjs.org/) + [Moment.js](https://momentjs.com/) |
| **Build Tool** | [Vite](https://vitejs.dev/) |
| **Database** | MySQL |

---

## Requirements

Before getting started, make sure the following are installed on your machine:

- PHP >= 8.1
- Composer
- Node.js >= 16 & npm
- MySQL (XAMPP, Laragon, or any compatible stack)
- Git

---

## Installation

Follow these steps to set up the project locally:

**1. Clone the repository**
```bash
git clone https://github.com/DeniFirmansyah18/eRequest.git
cd eRequest
```

**2. Install PHP dependencies**
```bash
composer install
```

> If you encounter issues with the Telegram notification package, reinstall it:
> ```bash
> composer remove laravel-notification-channels/telegram
> composer require laravel-notification-channels/telegram
> ```

**3. Install Node.js dependencies**
```bash
npm install
```

**4. Copy the environment file**
```bash
cp .env.example .env
```

**5. Generate the application key**
```bash
php artisan key:generate
```

**6. Configure your database** (see [Environment Configuration](#environment-configuration))

**7. Run database migrations and seeders**
```bash
php artisan migrate
php artisan db:seed
```

**8. Create the storage symlink**
```bash
php artisan storage:link
```

**9. Start the development servers**

Open two terminal windows and run:

```bash
# Terminal 1 — Vite dev server
npm run dev

# Terminal 2 — Laravel application server
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`.

---

## Environment Configuration

Open the `.env` file and update the following values:

```dotenv
APP_NAME=eRequest
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=erequest
DB_USERNAME=root
DB_PASSWORD=

TELEGRAM_BOT_TOKEN=your_telegram_bot_token_here
```

> **Note:** Make sure your MySQL server is running before running migrations.

---

## Telegram Notification Setup

eRequest sends real-time Telegram alerts to the admin whenever a new submission is created. Follow these steps to configure it:

**Step 1 — Retrieve your Telegram Chat ID**

Visit the following URL (replace with your bot token) to get your user's chat ID:

```
https://api.telegram.org/bot<YOUR_BOT_TOKEN>/getUpdates
```

<img src="https://github.com/user-attachments/assets/55b89fd0-aa6f-4034-bb4b-9111796b4539" width="512" alt="Get Telegram Updates">

**Step 2 — Start a conversation with the bot**

Open Telegram and send a message to the bot:

👉 [t.me/Permohonan_Aplikasi_Bot](https://t.me/Permohonan_Aplikasi_Bot)

<img src="https://github.com/user-attachments/assets/8b362f2d-75a5-4c81-841c-9bf657e8d7fe" width="512" alt="Telegram Bot Chat">

**Step 3 — Confirm the Chat ID appears in the response**

Refresh the `getUpdates` URL and confirm your `chat.id` is visible in the JSON response.

<img src="https://github.com/user-attachments/assets/0e84e4a8-0aed-4ab8-96d0-43fa52351f1d" width="512" alt="Telegram Chat ID Response">

**Step 4 — Set the Chat ID in the notification file**

Open `app/Notifications/SendTelegramNotification.php` and replace the placeholder with your actual Telegram Chat ID.

<img src="https://github.com/user-attachments/assets/4efa61a3-dab4-41a7-ab91-e87ca10d1653" width="812" alt="SendTelegramNotification File">

**Step 5 — Test the integration**

Submit a new application request as an OPD user. You should receive a Telegram notification confirming the new submission.

<img src="https://github.com/user-attachments/assets/a27f8660-c553-45cb-8e9f-440d4f13f408" width="512" alt="Telegram Notification Example">

---

## Default Credentials

The database seeder provides the following default accounts for testing:

| Role | Email | Password |
|------|-------|----------|
| **Admin** | `admin@gmail.com` | `admin12345` |
| **OPD User** | `user@gmail.com` | `user12345` |

> ⚠️ **Important:** Change these credentials immediately in any staging or production environment.

---

## Project Structure

```
eRequest/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AdminController.php       # Admin submission management
│   │       └── UserOPDController.php     # OPD user submission management
│   ├── Models/
│   │   ├── Pengajuan.php                 # Submission model
│   │   └── User.php
│   └── Notifications/
│       ├── PengajuanNotification.php
│       ├── SendTelegramNotification.php  # Telegram alert on new submission
│       └── StatusPengajuanNotification.php
├── database/
│   ├── migrations/                       # Database schema definitions
│   └── seeders/                          # Default data seeders
├── resources/
│   └── views/                            # Blade templates
├── routes/
│   └── web.php                           # Application routes
└── erequest.sql                          # Database dump (optional import)
```

---

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for a full list of version history and notable changes.

---

## License

This project is open-sourced under the [MIT License](https://opensource.org/licenses/MIT).
