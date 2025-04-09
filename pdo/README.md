# Student Management System

This project is a **Student Management System** built using PHP and PDO for database interactions. It allows administrators and users to manage student data, including adding, editing, deleting, and filtering students. The system also includes features for exporting data and copying it to the clipboard.

## Features

### General Features
- **Student List**: Displays a list of students with their details (ID, name, birthday, section, and image).
- **Admin Actions**: Admins can add, edit, or delete student records.
- **Filtering**: Search and filter students by name, birthday, or section.
- **Export**: Export student data to an Excel file.
- **Clipboard Copy**: Copy student data to the clipboard.


## Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd <repository-folder>
   ```

2. Install dependencies using Composer:
   ```bash
   composer install
   ```

3. Set up the database:
    - Create a MySQL database named `studentsmanagersystem`.
    - Import the database schema and data (if provided).

4. Configure the database connection in `pdo/connexionBD.php`:
   ```php
   private static $host = 'localhost';
   private static $dbname = 'studentsmanagersystem';
   private static $username = 'root';
   private static $password = '';
   ```

5. Start a local PHP server:
   ```bash
   php -S localhost:8000
   ```

6. Access the application in your browser at `http://localhost:8000`.

## Usage

- **Admin**: Log in as an admin to manage student records (add, edit, delete).
- **User**: View the student list and export or copy data.


## Dependencies

- PHP 7.4 or higher
- Composer
- MySQL
