# Leave Management System 👩‍💻

A simple web-based Leave Management System built using Laravel.

## About the Project 

This system helps employees apply for leave and allows managers to manage leave requests easily.

## Features

### 1. Employee
- Register and login
- View dashboard
- Apply for leave
- Select leave type
- View my leave requests
- Cancel pending leave
- View leave status
- Update profile
- Change password
- Reset password

### 2. Manager
- Manager login
- View dashboard
- View employees
- View employee leave history
- Approve or reject leave requests
- Add manager comments
- Manage leave types
- Add, edit and delete leave types

## 3. Leave Types

The manager can create different leave types and set the maximum number of days allowed for each type.

## Technologies Used

- Laravel
- PHP
- MySQL
- HTML
- CSS
- JavaScript
- Blade

## ⚙️ Installation
### 1. Clone the Repository
```bash
git clone https://github.com/Ankita-meshram/LeaveManagement_Laravel.git
```

### 2. Open the Project
```bash
cd LeaveManagement_Laravel
```

### 3. Install PHP Dependencies
```bash
composer install
```

### 4. Install Frontend Dependencies
```bash
npm install
```

### 5. Create Environment File
```bash
copy .env.example .env
```

### 6. Generate Application Key
```bash
php artisan key:generate
```

### 7. Configure Database
Open the .env file and add your MySQL database details:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=leave_management
DB_USERNAME=root
DB_PASSWORD=
```

### 8. Run Database Migrations
```bash
php artisan migrate
```

### 9. Start Laravel Server
```bash
php artisan serve
```

### 10. Start Vite
Open another terminal and run:
```bash
npm run dev
```

The application will be available at:
```bash
http://127.0.0.1:8000
```

## 📂 Project Structure

```text
LeaveManagement_Laravel/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   ├── DashboardController.php
│   │   │   ├── LeaveController.php
│   │   │   ├── ManagerController.php
│   │   │   └── ProfileController.php
│   │   │
│   │   ├── Middleware/
│   │   │   └── RoleMiddleware.php
│   │   │
│   │   └── Requests/
│   │
│   └── Models/
│       ├── User.php
│       ├── Leave.php
│       └── LeaveType.php
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── migrations/
│   │   ├── create_users_table.php
│   │   ├── create_leave_types_table.php
│   │   └── create_leaves_table.php
│   │
│   └── seeders/
│
├── public/
│   ├── css/
│   ├── js/
│   └── images/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── auth/
│       │   ├── login.blade.php
│       │   ├── forgot-password.blade.php
│       │   ├── reset-password.blade.php
│       │   ├── verify-email.blade.php
│       │   └── confirm-password.blade.php
│       │
│       ├── employee/
│       │   ├── dashboard.blade.php
│       │   ├── apply-leave.blade.php
│       │   └── leaves.blade.php
│       │
│       ├── manager/
│       │   ├── dashboard.blade.php
│       │   ├── employees.blade.php
│       │   ├── employee-details.blade.php
│       │   └── leave-types.blade.php
│       │
│       ├── profile/
│       │   ├── edit.blade.php
│       │   └── partials/
│       │
│       └── layouts/
│
├── routes/
│   ├── web.php
│   └── auth.php
│
├── storage/
│
├── tests/
│
├── .env.example
├── artisan
├── composer.json
├── package.json
├── vite.config.js
└── README.md
```
## Screenshots 
### 1. Login Page
<img width="761" height="467" alt="image" src="https://github.com/user-attachments/assets/b35a4331-7868-4564-aaef-f7dd8261f2e9" />

### 2. Register Page
<img width="782" height="467" alt="image" src="https://github.com/user-attachments/assets/960a5760-6dea-4477-b721-fd09dc8c371a" />

### 3. Employee Dashboard
<img width="959" height="472" alt="image" src="https://github.com/user-attachments/assets/a7e8efbd-71c2-49c9-a687-e77afa4a5866" />

### 4. Manager Dashboard
<img width="929" height="441" alt="image" src="https://github.com/user-attachments/assets/327af8c9-65d5-4f14-a275-469cb8dc169e" />

## How to Run the Project
- Clone the repository.
- git clone https://github.com/Ankita-meshram/LeaveManagement_Laravel.git
- Go to the project folder.
- cd LeaveManagement_Laravel
- Install dependencies.
- composer install
- npm install
- Create the .env file.
- copy .env.example .env
- Generate the application key.
- php artisan key:generate
- Set your database details in .env.
- Run migrations.
- php artisan migrate
- Start the Laravel server.
- php artisan serve
- Open the project in your browser.
- http://127.0.0.1:8000

## 🚀 Future Enhancements
- Email notifications for leave status
- Leave balance management
- Holiday calendar
- Monthly and yearly leave reports
- Attendance integration
- Export reports to PDF/Excel
- Advanced manager analytics
- Mobile-friendly improvements

### Author👩‍💻

Ankita Meshram
MCA Student
