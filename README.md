# UICC Website

This project is a Laravel-based web application.

## Prerequisites

-   PHP >= 8.1
-   Composer
-   Node.js & npm
-   MySQL or compatible database

## Setup Instructions

1. **Clone the repository**

    ```sh
    git clone https://github.com/rossocheath/uicc-website.git
    cd uicc-website
    ```

2. **Install PHP dependencies**

    ```sh
    composer install
    ```

3. **Install Node.js dependencies**

    ```sh
    npm install
    ```

4. **Copy the example environment file and configure**

    ```sh
    cp .env.example .env
    # Edit .env to set your database and app configuration
    ```

5. **Generate application key**

    ```sh
    php artisan key:generate
    ```

6. **Run database migrations**

    ```sh
    php artisan migrate --seed
    ```
    
7. **Build frontend assets**

    ```sh
    npm run build
    ```

8. **Start the development server**
    ```sh
    php artisan serve
    ```

Visit [http://localhost:8000](http://localhost:8000) to view the application.

## Useful Commands

-   `php artisan migrate:fresh --seed` — Reset and seed the database
-   `npm run dev` — Start Vite development server for hot reloading

## Testing

Run tests with:

```sh
php artisan test
```

## License

See [LICENSE](LICENSE) for details.
