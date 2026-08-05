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

```text
HomeFix/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── ServiceController.php
│   │       ├── BookingController.php
│   │       ├── ReviewController.php
│   │       └── AuthController.php
│   │
│   └── Models/
│       ├── User.php
│       ├── Booking.php
│       ├── Service.php
│       ├── Technician.php
│       └── Review.php
│
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   ├── css/
│   ├── js/
│   └── images/
│
├── resources/
│   └── views/
│       ├── layouts/
│       ├── home.blade.php
│       ├── services.blade.php
│       ├── booking.blade.php
│       ├── technician.blade.php
│       └── reviews.blade.php
│
├── routes/
│   └── web.php
│
├── storage/
├── tests/
├── vendor/
├── .env
├── artisan
├── composer.json
└── README.md
```

# 📂 Database Tables
- users
- services
- technicians
- bookings
- reviews
- categories
- password_reset_tokens

# ▶️ How to Run the Project

## Prerequisites

Make sure the following software is installed on your system:

- PHP 8.x
- Composer
- XAMPP (Apache & MySQL)
- Git
- Laravel

## Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/Ankita-meshram/HomeFix.git
```

### 2. Navigate to the Project Folder

```bash
cd HomeFix
```

### 3. Install Dependencies

```bash
composer install
```

### 4. Create Environment File

```bash
copy .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Configure Database

Open the `.env` file and update the database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homefix
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Create Database

Create a MySQL database named:

```text
homefix
```

### 8. Run Migrations

```bash
php artisan migrate
```

### 9. Start the Development Server

```bash
php artisan serve
```

### 10. Open in Browser

```
http://127.0.0.1:8000
```

---

## Screenshots 
### Home Page 

<img width="746" height="440" alt="image" src="https://github.com/user-attachments/assets/a636b41e-0243-4593-8ba6-55b341aae5f6" />

### Book Service Page 

<img width="854" height="443" alt="image" src="https://github.com/user-attachments/assets/65cfa27a-9d64-43bd-9fd8-5a8952434333" />

### Contact Page 

<img width="926" height="404" alt="image" src="https://github.com/user-attachments/assets/4bb83644-9632-412c-995b-9922a798a223" />

### About Page

<img width="919" height="433" alt="image" src="https://github.com/user-attachments/assets/5e46e14d-64ea-4474-9359-b96d20c59c72" />

### Technicians Page

<img width="919" height="368" alt="image" src="https://github.com/user-attachments/assets/98497b1c-49db-4c7c-abdb-07eb64e64c0d" />


## 🚀 Future Enhancements

- Online Payment Integration
- Real-Time Booking Status Tracking
- Email Notifications
- SMS Notifications
- Technician Live Location Tracking
- Service History
- User Profile Management
- Admin Analytics Dashboard
- Search and Filter Services
- REST API Integration
- Mobile Application Support
- AI-based Technician Recommendation

#👩‍💻 Author

Ankita Meshram


# 📜 License

This project is created for educational purposes and learning Laravel framework.
