# Zadok Hotel Management System

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)

A modern, full-featured Hotel & Restaurant Management System built with **Laravel 10** and **TailwindCSS**. This application blends luxury room reservations with an integrated dining experience, featuring a "Tripster" aesthetic design.

## 🌟 Key Features

*   🏨 **Room Booking Engine:** Browse available rooms with rich imagery, pricing, and details.
*   🍽️ **Restaurant & Dining:** Integrated ordering system for room service, dine-in, or take-away.
*   👤 **User Dashboard:** Profile management including booking history, personal details, and image uploads.
*   🛡️ **Admin Panel:** Complete control over rooms, menu items, users, and bookings.
*   🎨 **Modern UI:** Responsive design featuring glassmorphism effects, interactive elements, and premium typography.

## 🛠️ Technology Stack

*   **Framework:** Laravel 10
*   **Styling:** TailwindCSS (Vanilla)
*   **Database:** MySQL
*   **Frontend:** Blade Templates, JavaScript

## 🚀 Getting Started

Follow these steps to set up the project locally.

### Prerequisites
*   PHP >= 8.1
*   Composer
*   Node.js & NPM
*   MySQL

### Installation

1.  **Clone the repository**
    ```bash
    git clone https://github.com/yourusername/zadok-hms.git
    cd zadok-hms
    ```

2.  **Install PHP dependencies**
    ```bash
    composer install
    ```

3.  **Install NPM dependencies**
    ```bash
    npm install
    npm run build
    ```

4.  **Environment Setup**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    *Configure your database credentials in the `.env` file.*

5.  **Run Migrations & Seeders**
    ```bash
    php artisan migrate --seed
    ```

6.  **Run the Application**
    ```bash
    php artisan serve
    ```
    Visit `http://localhost:8000` to view the application.

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
