# 🌿 PlantLife - Full-Stack Web Application

This project is a dynamic and responsive website for "PlantLife," a conceptual environmental organization. It began as a static frontend project and was later upgraded to a full-stack application featuring a complete, secure user authentication system.

The core of this project is the backend, which uses **PHP** and **MySQL** to handle user registration, login, and session management, all powered by **AJAX** for a seamless, modern user experience.



*(Note: You'll need to add your own screenshots here. Just drag and drop them onto the GitHub web editor.)*

---

## ✨ Features

* **Responsive Homepage:** A clean, multi-section homepage built with HTML5 and CSS3 (Flexbox/Grid).
* **Mobile-First Design:** Includes a fully functional JavaScript-powered "burger" menu for mobile navigation.
* **Secure User Registration:** A `signup.php` page with real-time validation.
* **Secure User Login:** A `login.php` page to authenticate existing users.
* **AJAX-Powered Forms:**
    * Login and signup forms **do not reload the page**.
    * Users get instant feedback directly on the form (e.g., "Login successful!" or "This email is already registered.").
* **Dynamic UI:** The header navigation bar dynamically changes, showing a "Login" button to visitors and a "Logout" button to authenticated users.
* **Session Management:** PHP sessions are used to keep users logged in as they navigate the site.

---

## 🚀 Tech Stack

This project was built using a full "MAMP/XAMPP" stack:

* **Frontend (Client-Side):**
    * **HTML5**
    * **CSS3** (with CSS Variables for theming)
    * **JavaScript (ES6+)**: Used for DOM manipulation (mobile menu) and API calls.
    * **Fetch API (AJAX)**: Used to send and receive data from the backend.
    * **JSON**: Used as the data format for AJAX requests and responses.

* **Backend (Server-Side):**
    * **PHP**: Used for all server-side logic, including session management and database communication.
    * **Apache**: The web server used (via XAMPP).

* **Database:**
    * **MySQL**: Used to store and retrieve user data.

* **Security:**
    * **Password Hashing**: Passwords are securely hashed using PHP's `password_hash()` and `password_verify()` functions.
    * **Prepared Statements**: All SQL queries are parameterized to **prevent SQL injection attacks**.

---

## 🔧 How to Run This Project Locally

To run this project on your local machine, you'll need a server environment like XAMPP or MAMP.

### 1. Prerequisites

* **XAMPP** (or MAMP, WAMP) installed on your computer.

### 2. Installation Steps

1.  **Clone or Download the Code:**
    ```bash
    git clone [your-github-repo-url]
    ```
    Or download the ZIP file and unzip it.

2.  **Move to `htdocs`:**
    * Move the entire project folder (`Plant_care_web`) into the `htdocs` folder in your XAMPP installation directory.
    * *(Default on Windows: `C:\xampp\htdocs`)*
    * *(Default on Mac: `/Applications/XAMPP/htdocs`)*

3.  **Start Your Server:**
    * Open the **XAMPP Control Panel** and start the **Apache** and **MySQL** services.

4.  **Create the Database:**
    * Open your browser and go to `http://localhost/phpmyadmin`.
    * Click on the **Databases** tab.
    * Create a new database named **`plantlife`**.
    * Click on the new `plantlife` database and go to the **SQL** tab.
    * Copy and paste the following SQL code and click **Go** to create the `users` table:

    ```sql
    CREATE TABLE `users` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `fullname` varchar(100) NOT NULL,
      `email` varchar(100) NOT NULL,
      `password_hash` varchar(255) NOT NULL,
      `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY (`id`),
      UNIQUE KEY `email` (`email`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ```

5.  **Run the Project:**
    * You're all set! Open your browser and go to:
    * **`http://localhost/Plant_care_web/`**

### 3. Image Placeholders

