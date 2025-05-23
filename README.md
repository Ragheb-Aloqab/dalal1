<p align="center"><a href="https://yourwebsite.com" target="_blank"><img src="logo.png" width="300" height="300" alt="Dalal Logo"></a></p>

<p >
<a href="https://packagist.org/packages/yourpackage"><img src="https://img.shields.io/packagist/dt/yourpackage" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/yourpackage"><img src="https://img.shields.io/packagist/v/yourpackage" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/yourpackage"><img src="https://img.shields.io/packagist/l/yourpackage" alt="License"></a>
</p>

## About Dalal

**Dalal** is a comprehensive web application designed for renting and selling real estate properties. It offers a user-friendly interface for browsing property listings, managing transactions, and interacting with buyers and sellers.

## Features

- **Property Listings**: Detailed information on properties, including images, descriptions, and pricing.
- **Search and Filters**: Search properties by criteria and use filters to refine results.
- **User Accounts**: Register and manage user profiles, including personal details and contact information.
- **Admin Dashboard**: Manage properties, users, and transactions through an intuitive admin interface.
- **Responsive Design**: Mobile-friendly design accessible on various devices.

## Installation

To set up Dalal on your local machine, follow these steps:

### Prerequisites

- PHP (8.2 or higher)
- Composer
- MySQL or Sqlite
- Laravel (11.x or higher)
- Node.js and npm (for frontend assets)
- tailwind
- Js library for dashbaord tables and charts and filtering 

### Clone the Repository

Clone the repository from GitHub:



### Install Dependencies

Install PHP and JavaScript dependencies:

```bash
composer install
npm install
```

### Configure Environment

Create a copy of the example environment file and configure your settings:

```bash
cp .env.example .env
```

Edit the `.env` file to set up your database and other environment variables:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dalal
DB_USERNAME=root
DB_PASSWORD=
```

### Run Migrations and Seeders

Run database migrations and seed the database with initial data:

```bash
php artisan migrate
php artisan db:seed
```

### Build Frontend Assets

Compile the frontend assets:

```bash
npm run dev
```

### Serve the Application

Start the Laravel development server:

```bash
php artisan serve
```

You can access the application at `http://localhost:8000`.

## Usage

- **Navigate to the Website**: Open `http://localhost:8000` in your web browser.
- **Register/Login**: Create a new account or log in to an existing account.
- **Browse Properties**: Use search and filters to find properties.
- **Manage Listings**: Admin users can manage properties and user accounts via the admin dashboard.

## Contributing

To contribute to the project:

1. Fork the repository on GitHub.
2. Create a new branch for your changes.
3. Make changes and commit them with descriptive messages.
4. Push changes to your forked repository.
5. Submit a pull request to the main repository.

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).

## Contact

For questions or issues, contact [saherqaid2020@gmail.com](mailto:saherqaid2020@gmail.com) or open an issue on the GitHub repository.
