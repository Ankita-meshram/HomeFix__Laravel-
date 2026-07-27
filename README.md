# 🏠 HomeFix – Home Repair Service Booking & Technician Rating Portal
📌 Project Overview

HomeFix is a web-based home repair service booking platform developed using the Laravel Framework. It allows users to book home repair services such as plumbing, electrical work, carpentry, painting, and more. Customers can view technician profiles, book appointments, and submit ratings and reviews after the service is completed.

The project follows the MVC (Model-View-Controller) architecture provided by Laravel and uses MySQL as the database.

## ✨ Features
- User Registration & Login
- Technician Listing
- View Technician Profile
- Book Home Repair Services
- Service Categories
- Booking Form Validation
- Customer Rating & Review System
- Responsive Design
- Admin Dashboard
- Booking Management
- Technician Management
- MySQL Database
- Secure Authentication
- Mobile Friendly Interface

# 🛠 Technologies Used
- Technology	Purpose
- HTML5	Website Structure
- CSS3	Styling
- Bootstrap 5	Responsive Design
- JavaScript	Client-side Interaction
- PHP 8.x	Backend Programming
- Laravel 10/11	PHP Framework
- MySQL	Database
- Eloquent ORM	Database Operations
- Blade Template Engine	Dynamic Views
- Composer	Dependency Management
- XAMPP	Apache & MySQL Server

# 📁 Project Folder Structure
HomeFix/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │      ServiceController.php
│   │   │      BookingController.php
│   │   │      ReviewController.php
│   │   │      AuthController.php
│   │
│   ├── Models/
│          User.php
│          Booking.php
│          Service.php
│          Technician.php
│          Review.php
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── migrations/
│   ├── seeders/
│
├── public/
│   ├── css/
│   ├── js/
│   ├── images/
│
├── resources/
│   ├── views/
│       ├── layouts/
│       ├── home.blade.php
│       ├── services.blade.php
│       ├── booking.blade.php
│       ├── technician.blade.php
│       ├── reviews.blade.php
│
├── routes/
│     web.php
│
├── storage/
│
├── tests/
│
├── vendor/
│
├── .env
├── artisan
├── composer.json
└── README.md

# 📂 Database Tables
- users
- services
- technicians
- bookings
- reviews
- categories
- password_reset_tokens

# 📌 MVC Architecture
## Model

Responsible for database operations.

Example

- User.php

- Booking.php

- Technician.php

- Review.php
  
## View

User Interface using Blade Templates.

Example

- home.blade.php

- booking.blade.php

- technician.blade.php

## Controller

Handles user requests.

Example

- ServiceController

- BookingController

- ReviewController

#👩‍💻 Author

Ankita Meshram

Course: Master of Computer Applications (MCA)

Project: HomeFix – Home Repair Service Booking & Technician Rating Portal

Framework: Laravel

Database: MySQL

# 📜 License

This project is created for educational purposes and learning Laravel framework.
