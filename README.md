# Leave Management System

## 📌 Introduction

The Leave Management System is a web-based application developed using Laravel. It helps employees apply for leave and allows managers to manage, approve, or reject leave requests easily.

## 🎯 Project Objective

- To simplify the leave application process.
- To manage employee leave records digitally.
- To help managers review leave requests efficiently.
- To maintain leave status and records in one place.

## ✨ Features

- User Registration and Login
- Forgot and Reset Password
- Employee Dashboard
- Manager Dashboard
- Apply for Leave
- Select Leave Type
- View Leave History
- Cancel Pending Leave Requests
- Approve or Reject Leave Requests
- Manage Employees and Leave Types
- Track Pending, Approved, and Rejected Requests
- Form Validation and Authentication

## 👤 Employee Module

Employees can:

- Register and log in to their accounts.
- View their dashboard.
- Apply for leave by selecting the leave type and dates.
- Enter a reason for leave.
- View their leave application history.
- Check leave request status.
- Cancel pending leave requests.

## 👨‍💼 Manager/Admin Module

Managers can:

- Log in to the manager dashboard.
- View registered employees.
- View all leave requests.
- Approve or reject leave applications.
- Manage leave types.
- Monitor pending, approved, and rejected requests.

## 🔐 Authentication

The system provides registration, login, logout, and password recovery features through Laravel authentication functionality.

Access to employee and manager features depends on the user's role and permissions.

## 🛠️ Technologies Used

- Backend: Laravel 12
- Programming Language: PHP 8.2
- Database: MySQL
- Frontend: HTML, CSS, JavaScript, Blade
- Build Tool: Vite
- Package Managers: Composer and npm
- Version Control: Git and GitHub

## 📂 Project Structure
```
LeaveManagement/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
│   ├── web.php
│   └── auth.php
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```
Note: The structure above is a general overview. Actual folders may vary depending on the current project files.

## ⚙️ Installation and Setup

### 1. Clone the Repository
```
git clone https://github.com/Ankita-meshram/LeaveManagement_Laravel.git
```

### 2. Open the Project Folder
```
cd LeaveManagement_Laravel
```

### 3. Install PHP Dependencies
```
composer install
```

### 4. Create the Environment File
```
copy .env.example .env
```

### 5. Generate the Application Key
```
php artisan key:generate
```

### 6. Configure the Database
Open the ".env" file and configure your MySQL database details:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=leave_management
DB_USERNAME=root
DB_PASSWORD=
```
Create the "leave_management" database in MySQL before running migrations. Update the username and password according to your setup.

### 7. Run Database Migrations
```
php artisan migrate
```

### 8. Install Frontend Dependencies
```
npm install
```

### 9. Build Frontend Assets
```
npm run build
```

### 10. Start the Application
```
php artisan serve
```

Open the local URL displayed in the terminal, usually:
```
http://127.0.0.1:8000
```

## 🔄 Application Workflow

1. An employee registers or logs in.
2. The employee opens the dashboard and submits a leave application.
3. The leave request is saved with a pending status.
4. The manager reviews the request.
5. The manager approves or rejects the request.
6. The employee checks the updated status on the dashboard or leave history page.

## 🔒 Security

- Authentication for registered users.
- Role-based access to employee and manager sections.
- Server-side validation of submitted information.
- Database configuration through environment variables.
- Password management through Laravel authentication features.

Important: Never upload your actual ".env" file, database credentials, or application secrets to GitHub.

## 🚀 Future Enhancements

- Email notifications for leave status updates.
- Leave balance calculation.
- Calendar-based leave tracking.
- Reports and analytics.
- Improved mobile-responsive interface.

## 👩‍💻 Developer

Ankita Meshram

MCA Student | Laravel Web Development Project

GitHub: "Ankita-meshram" (https://github.com/Ankita-meshram)

## 📄 License

This project was developed for academic and learning purposes.
