# Akademik - Academic Management System

A web-based academic/student management system built with **Laravel 6**, **PHP**, **MySQL**, and **Bootstrap**. 
Developed as a collaborative team project during my time in SMK Permata Harapan Batam (Vocational High School in Batam, Indonesia)

## Features
- Student enrollment and profile management
- Course registration and scheduling
- Grade recording and transcript generation
- Role-based access control (Admin / Teacher / Student)
- Responsive UI for desktop and mobile

## Tech Stack
- **Backend:** Laravel 6 (PHP 7.x), MySQL
- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap 4
- **Tools:** Git, Composer, XAMPP

## My Role
- Designed and implemented the database schema (ERD → MySQL)
- Built the backend routes and controllers for student/course modules
- Integrated frontend templates with Blade engine
- Collaborated with team members using Git for version control

## Screenshots
![Login Page](login.png)
![Dashboard Page](dashboard.png)
![profile Page](profile.png)
![Data View](view.png)

## Setup (Local)
1. Clone: `git clone https://github.com/MitanEXE/akademik.git`
2. Downgrade PHP to 7.4
3. Install: `composer install`
4. Install : `composer require barryvdh/laravel-dompdf` and `composer update consoletvs/charts`
5. Configure `.env` with your database credentials
6. Import SQL File: `sistem.sql`
7. Run: `php artisan key:generate`, `php artisan migrate`
9. Serve: `php artisan serve`

## Notes
This project was developed in 2024 as part of an academic assignment. 
The codebase reflects my understanding of MVC architecture, Routing, and relational database design at that stage of my studies.
