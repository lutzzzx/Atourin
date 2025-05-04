# 🌍 Atourin - Travel Itinerary Website Application

**Atourin** is a web-based travel itinerary application that allows users to create, manage, and explore travel agendas. Designed with user experience in mind, Atourin simplifies travel planning through intuitive interfaces and powerful features. The system is built using **Laravel** (PHP framework), **MySQL** as the relational database, and **Bootstrap** for responsive frontend styling.

---

## 📌 Table of Contents

-   [Features](#-features)
-   [Use Case Overview](#-use-case-overview)
-   [Technology Stack](#-technology-stack)
-   [System Architecture](#-system-architecture)
-   [Installation Guide](#-installation-guide)
-   [Usage](#-usage)
-   [Screenshots](#-screenshots)
-   [Contributing](#-contributing)
-   [License](#-license)
-   [Contact](#-contact)

---

## ✨ Features

### 🔐 User Authentication

-   **Registration**: Create an account using name, email, and password.
-   **Login**: Secure login using email and password.
-   **Profile Management**: Edit personal profile including name, address, birth date, phone number, and profile picture.

### 🧭 Itinerary Management

-   **View Agendas**: Browse and view detailed travel itineraries.
-   **Create/Edit/Delete Agendas**: Full CRUD operations on travel plans including title, dates, location, activities, and budget estimates.

### 🚗 Transportation Management

-   **Add/Edit/Delete Transport Options**: Manage transport details such as type (car, flight, train), departure and arrival times, and locations.

### 🗺️ Destination Management

-   **Add/Edit/Delete Destinations**: Manage destination details including name, location, and estimated cost.

### 💬 Social Interactions

-   **Comment System**: Leave or remove comments on travel agendas.
-   **Bookmarking**: Mark favorite agendas for quick access later.
-   **Likes**: Like or unlike agenda posts.

### 🔧 Admin Dashboard

-   **User Management**: Admins can view, edit roles, and delete users through the dashboard.

---

## 📘 Use Case Overview

| Use Case           | Actor | Description                                                   |
| ------------------ | ----- | ------------------------------------------------------------- |
| Register           | User  | Sign up by entering name, email, and password.                |
| Login              | User  | Authenticate using registered email and password.             |
| View Itinerary     | User  | View detailed itinerary information.                          |
| Manage Itinerary   | User  | Create, update, and delete travel agendas.                    |
| Manage Transport   | User  | Add, modify, or delete transportation for an itinerary.       |
| Manage Destination | User  | Add, edit, or remove destinations from an itinerary.          |
| Manage Comments    | User  | Post or delete comments on itinerary pages.                   |
| Manage Bookmarks   | User  | Add or remove bookmarks for itineraries.                      |
| Manage Likes       | User  | Like or unlike itinerary posts.                               |
| Edit Profile       | User  | Update user personal profile and settings.                    |
| Manage Users       | Admin | Administer user roles and delete accounts from the dashboard. |

---

## 🧱 Technology Stack

| Layer          | Technology                               |
| -------------- | ---------------------------------------- |
| Backend        | Laravel (PHP)                            |
| Frontend       | Bootstrap, Blade                         |
| Database       | MySQL                                    |
| Authentication | Laravel Sanctum (or native Laravel Auth) |
| Server         | Apache/Nginx                             |

---

## 🏗️ System Architecture

```text
+------------------+         +----------------+        +----------------+
|     Frontend     | <-----> |    Laravel     | <----> |     MySQL      |
|  (Bootstrap +    |         |   Controller   |        |  Relational DB |
|   Blade Views)   |         |    & Models    |        +----------------+
+------------------+         +----------------+

- MVC Pattern used (Model-View-Controller)
- RESTful Routing
- Session-based or token-based authentication
```

---

## 🧰 Installation Guide

1. **Clone the Repository**

    ```bash
    git clone https://github.com/lutzzzx/Atourin.git
    cd atourin-main
    ```

2. **Install PHP Dependencies**

    ```bash
    composer install
    ```

3. **Environment Configuration**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configure Database**
   Update the `.env` file with your local database credentials:

    ```
    DB_DATABASE=your_database
    DB_USERNAME=root
    DB_PASSWORD=secret
    ```

5. **Run Migrations**

    ```bash
    php artisan migrate
    ```

6. **Run the Application**

    ```bash
    php artisan serve
    ```

    Open your browser and go to `http://localhost:8000`

---

## ▶️ Usage

-   **User Dashboard**: Access and manage your itineraries, comments, bookmarks, and likes.
-   **Admin Panel**: Admins can monitor and manage all user activities.
-   **Responsive Design**: Fully functional across desktops, tablets, and mobile devices.

---

## 🤝 Contributing

Contributions are welcome! Please fork the repository and submit a pull request for review. Ensure your code follows the Laravel and PSR-12 standards.

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).

---

## 📬 Contact

-   **Email**: [luthfizulfikri1@gmail.com](mailto:luthfizulfikri1@gmail.com)
-   **Project Maintainer**: Atourin Team
-   **GitHub**: [https://github.com/lutzzzx/Atourin](https://github.com/lutzzzx/Atourin)
