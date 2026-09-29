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
### Login Page 

<img width="506" height="213" alt="image" src="https://github.com/user-attachments/assets/d2bca0b1-2f24-4d7b-81b7-8232868de960" />

### User Registration Page

<img width="445" height="355" alt="image" src="https://github.com/user-attachments/assets/9fb64505-8ff9-4bf9-a7cb-b38db7f129ff" />

### Home Page 

<img width="517" height="381" alt="image" src="https://github.com/user-attachments/assets/51d6499f-4631-4d9d-8c85-4cbbb49f26b4" />


### Services Page 

<img width="509" height="275" alt="image" src="https://github.com/user-attachments/assets/5741edbb-f407-448f-b695-19135eb2fe72" />

### Technicians Page

<img width="380" height="346" alt="image" src="https://github.com/user-attachments/assets/e6f9f5f5-77a0-4d92-a9c5-cdf9b4d45a65" />

### Book Service Page 

<img width="497" height="339" alt="image" src="https://github.com/user-attachments/assets/9c5aa4cd-b748-4545-88f4-8023b3f89aff" />

### My Bookings Page 

<img width="689" height="396" alt="image" src="https://github.com/user-attachments/assets/ead53728-b88e-4de6-87ef-1540c8cdd613" />

### About Page

<img width="281" height="440" alt="image" src="https://github.com/user-attachments/assets/abe7b37f-cb60-4f74-9e39-256308dd8684" />

### Contact Page

<img width="673" height="308" alt="image" src="https://github.com/user-attachments/assets/62856641-70c7-4e65-9596-0c511e5f22b7" />

### Admin Login Page

<img width="666" height="284" alt="image" src="https://github.com/user-attachments/assets/75186850-ccd1-4302-b174-29e64ff5b6db" />

### Admin Dashboard Page

<img width="949" height="434" alt="image" src="https://github.com/user-attachments/assets/eb8b08e7-eef4-4f2f-80d3-0791e768d9ab" />

### Database

<img width="955" height="324" alt="image" src="https://github.com/user-attachments/assets/1b8871ce-5a6f-49c4-91a2-2b77a07f84fd" />


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
