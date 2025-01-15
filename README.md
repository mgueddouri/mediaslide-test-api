**Mediaslide API**
==================

This project is a modular API for managing a modeling agency. It provides CRUD operations for **models**, **categories**, and **bookings**, ensuring a clean architecture with services and repositories for scalability and maintainability.

**Features**
------------

-   **Model Management**: Manage model records, including relationships with categories.
-   **Category Management**: Create and manage hierarchical categories with parent and subcategories.
-   **Booking Management**: Create bookings, link models, and manage their relationships.

* * * * *

**Prerequisites**
-----------------

Before setting up the API, ensure you have the following installed:

-   PHP 8.3 or higher
-   Composer
-   MySQL 8.0 or higher
-   [Postman](https://www.postman.com/) (optional, for API testing)

* * * * *

**Setup Instructions**
----------------------

### **1\. Clone the repository**

bash

Copier le code

`git clone https://github.com/mgueddouri/mediaslide-test-api.git
cd mediaslide-test-api`

* * * * *

### **2\. Install dependencies**

Run the following command to install the required PHP dependencies:

bash

Copier le code

`composer install`

* * * * *

### **3\. Configure the environment**

Create a `.env` file in the root directory by copying the example file:

bash

Copier le code

`cp .env.example .env`

Update the `.env` file with your local configuration (e.g., database credentials):

dotenv

Copier le code

`DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mediaslide
DB_USERNAME=your_username
DB_PASSWORD=your_password
APP_KEY=base64:generated_app_key`

Generate the application key:

bash

Copier le code

`php artisan key:generate`

* * * * *

### **4\. Set up the database**

Run the following commands to create the database structure and seed initial data:

bash

Copier le code

`php artisan migrate --seed`

* * * * *

### **5\. Start the application**

Run the following command to start the Laravel development server:

bash

Copier le code

`php artisan serve`

The API will be accessible at: http://localhost:8000

* * * * *

**Testing the API**
-------------------

### **Postman Collection**

1.  Import the provided **Postman collection** located in the project directory (`postman/Mediaslide_API.postman_collection.json`).
2.  Set up the environment variables for the API base URL (ex: `http://localhost:8000`) and database details.
3.  Use the preconfigured requests to test the following functionalities:
    -   Models: `GET /models`, `POST /models`, etc.
    -   Categories: `GET /categories`, `POST /categories`, etc.
    -   Bookings: `GET /bookings`, `POST /bookings`, etc.

* * * * *

**Common Commands**
-------------------

### **Run the application locally**

bash

Copier le code

`php artisan serve`

### **Clear caches**

If changes are not reflected:

bash

Copier le code

`php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear`

### **Reset the database**

If you need to reset the database and start fresh:

bash

Copier le code

`php artisan migrate:fresh --seed`

* * * * *

**Troubleshooting**
-------------------

### **Database connection issues**

-   Verify your `.env` file settings.
-   Ensure that MySQL is running and accepting connections.

* * * * *

**Folder Structure**
--------------------

-   `app/Repositories`: Handles database queries for models, categories, and bookings.
-   `app/Services`: Contains business logic for each entity.
-   `app/Http/Controllers`: API endpoints and request handling.
-   `routes/web.php`: Defines all API routes.
