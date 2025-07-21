# Laravel Project implemented using some of  DDD (Domain-Driven Design) concepts while maintaining Laravel's simplicity and staying true to its conventions.

## 🚀 Setup

### Prerequisites
- PHP 8.2+
- Node.js 18+
- Database (MySQL 8.0+/PostgreSQL 13+)

### Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/DBawazir2002/myblog-laravel-ddd.git
   cd myblog-laravel-ddd

2. **Install PHP dependencies:**:
   ```bash
   composer i

3. **Install JavaScript dependencies:**:
   ```bash
   npm install
   # or if using yarn
   yarn install

4. **Environment setup:**:
   ```bash
    cp .env.example .env
    php artisan key:generate
    ```
   Edit .env file with your:
   Database credentials (DB_* variables)
   App URL (APP_URL)
 
5. **Database setup:**
    ```bash
   php artisan migrate --seed
    ```

6. **Build frontend assets:**
    ```bash
   npm run build
    ``` 
7. **Storage link**
    ```bash
   php artisan storage:link
    ```

*Default Credentials:*
1. *email: ```test@example.com```*
2. *password: ```password```*
