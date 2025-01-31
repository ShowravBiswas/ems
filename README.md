# Event Management System

## Project Overview

The **Event Management System** is a web-based application built with pure PHP and MySQL that allows users to create, manage, and view events. It also enables attendees to register for events and provides administrators with downloadable event reports.

## Features

### **User Authentication**

- Secure user registration and login.
- Password hashing using `password_hash()`.
- Session management for authentication.

### **Event Management**

- Create, update, view, and delete events.
- Event details include name, description, date, location, and capacity.
- Pagination and filtering options.

### **Attendee Registration**

- Users can register for events through a form.
- Registration is restricted based on event capacity.
- Confirmation message upon successful registration.

### **Event Dashboard**

- Paginated and sortable event listings.
- Admin panel for event management.

### **Event Reports**

- Downloadable attendee list in CSV format.
- Filter attendees based on event selection.

## Installation Instructions

### **Requirements**

- PHP 8.0 or later
- MySQL database
- Apache or Nginx server
- Composer (for dependency management)

### **Setup Steps**

1. **Clone the Repository**
   ```sh
   git clone https://github.com/ShowravBiswas/ems.git
   cd ems
   ```
2. **Configure the Database**
   - When the system is run for the first time, a Database Setup Wizard will appear.
   - Enter the database name, user, and password in the provided form.
   - The system will automatically create the database and populate it with seed data.
   - An initial admin user will be created:
     Email: admin@example.com
     Password: admin123
     ```
3. **Start the Server**
   - If using Apache, place the project in `htdocs` and start Apache.
   - If using PHP's built-in server, run:
     ```sh
     php -S localhost:8000
     ```
4. **Access the Application**
   - Open [http://localhost:8000](http://localhost:8000) in a browser.

## Usage Instructions

### **Admin Panel**

- Log in as an admin to manage events and view attendees.
- Download attendee lists in CSV format.

### **User Registration & Event Signup**

- Register as a user and log in.
- Browse available events and register.

## Login Credentials for Testing

### **Admin Account**

- **Email:** [admin@example.com]
- **Password:** admin123

## Deployment & Hosting

- The project is hosted at: **[Live Demo](http://69.30.247.59:8880/)**
- The full source code is available at: **[GitHub Repo](https://github.com/ShowravBiswas/ems)**

## License

This project is open-source and available under the MIT License.
