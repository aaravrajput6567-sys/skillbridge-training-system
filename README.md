# Personnel Training Management System

A simple but professional Laravel-based system for managing personnel training programs in an organization. This project is developed to fulfill the academic syllabus requirements for a full-stack Laravel MVC course.

## Features

- **Role-Based Access Control**: Separate dashboards and functionalities for Admin, Employee, and Trainer.
- **Training Management**: Create, view, update, and delete training programs.
- **Enrollment System**: Employees can browse and enroll in trainings. Admins can approve them.
- **Attendance & Certificates**: Track attendance and issue completion certificates.
- **Feedback Mechanism**: Employees can provide ratings and feedback after completion.
- **REST APIs**: Full suite of API endpoints for integrations.
- **Localization**: Supports English and Hindi through session and cookie management.
- **Email Notifications**: Automated emails on enrollment.

## Technology Stack

- **Framework**: Laravel 11 (PHP 8.2+)
- **Database**: SQLite (Configured for easy local testing; easily swappable to MySQL in `.env`)
- **Frontend**: Blade Templating Engine + Tailwind CSS (via Laravel Breeze)
- **Authentication**: Laravel Breeze scaffolding with custom Role Middleware.

## Installation Steps

1. **Clone or Extract the Repository**
2. **Install PHP Dependencies**:
   ```bash
   composer install
   ```
3. **Install Node Dependencies**:
   ```bash
   npm install
   npm run build
   ```
4. **Environment Setup**:
   Copy the example `.env` file and generate the application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. **Database Configuration**:
   The `.env` file is currently configured to use `sqlite` for immediate testing. If you wish to use MySQL, update the `DB_CONNECTION` to `mysql` and provide the credentials.
6. **Run Migrations and Seeders**:
   This will create the tables and populate the database with sample Admins, Trainers, Employees, and Training Programs.
   ```bash
   php artisan migrate:fresh --seed
   ```
7. **Run the Development Server**:
   ```bash
   php artisan serve
   ```

## Test Accounts

The seeders generate the following test accounts (Password for all is `password`):
- **Admin**: `admin@example.com`
- **Trainer**: `trainer@example.com`
- **Employee**: `employee@example.com`


