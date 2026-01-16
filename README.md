# Rensa Katalog Web

A Laravel-based web application for managing product catalogs, including categories, banners, series, and products.

## Features

-   User authentication and management
-   Category management (Kategori)
-   Banner management
-   Series management
-   Product catalog management

## Requirements

-   PHP 8.1 or higher
-   Composer
-   Node.js and npm
-   MySQL or another supported database

## Installation

1. Clone the repository:

    ```
    git clone <repository-url>
    cd rensa-katalog-web
    ```

2. Install PHP dependencies:

    ```
    composer install
    ```

3. Install Node.js dependencies:

    ```
    npm install
    ```

4. Copy the environment file and configure it:

    ```
    cp .env.example .env
    ```

    Edit `.env` with your database credentials and other settings.

5. Generate application key:

    ```
    php artisan key:generate
    ```

6. Run database migrations:

    ```
    php artisan migrate
    ```

7. Seed the database (optional):

    ```
    php artisan db:seed
    ```

8. Build assets:

    ```
    npm run build
    ```

9. Start the development server:
    ```
    php artisan serve
    ```

## Usage

-   Access the application at `http://localhost:8000`
-   Use the web interface to manage categories, banners, series, and products.

## API

The application includes API routes defined in `routes/api.php` for programmatic access.

## Testing

Run the test suite with:

```
php artisan test
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## License

This project is licensed under the MIT License.
