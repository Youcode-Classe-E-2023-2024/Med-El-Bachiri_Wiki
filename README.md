# Wiki Management System

## Project Overview

Wiki Management System is a web application designed to provide an efficient content management system with a user-friendly front end. It allows administrators to manage categories, tags, and wikis easily, while authors can create, edit, and delete their own content. The system aims to create a collaborative environment for users to work together, create, find, and share wikis effortlessly.

## Features

### Back Office (Admin Panel)

- **Category Management:**
    - Create, modify, and delete categories.
    - Associate multiple wikis with a category.

- **Tag Management:**
    - Create, modify, and delete tags for search and content grouping.
    - Associate tags with wikis.

- **Author Registration:**
    - Authors can register with basic information (name, email, secure password).

- **Wiki Management:**
    - Authors can create, modify, and delete their wikis.
    - Authors can associate a single category and multiple tags with their wikis.
    - Admins can archive inappropriate wikis for maintaining a safe environment.

- **Dashboard:**
    - Display entity statistics on the dashboard.

### Front Office (User Interface)

- **User Authentication:**
    - User login and registration.
    - Admins redirected to the dashboard upon login; others to the home page.

- **Search Bar:**
    - Implement a search bar for users to search wikis, categories, and tags without page reload (use AJAX).

- **Latest Wikis Display:**
    - Display the latest wikis on the homepage or in a dedicated section for quick access to recent content.

- **Latest Categories Display:**
    - Present the latest categories, allowing users to discover recently added themes.

- **Wiki Details Page:**
    - Redirect users to a dedicated page for each wiki, displaying comprehensive details such as content, associated categories, tags, and author information.

### Technologies Used

- **Frontend:**
    - HTML5, CSS Framework, JavaScript.

- **Backend:**
    - PHP 8 with MVC architecture.

- **Database:**
    - PDO driver.

### Bonus Features (Optional)

- **Image Upload:**
    - Allow image uploads to enrich content.

- **MVC Architecture:**
    - Implement MVC architecture with routing and autoloading.

## Clone the Repository

1. **HTTPS**
   ```bash
   git clone https://github.com/Youcode-Classe-E-2023-2024/Med-El-Bachiri_Wiki.git
   
2. **SSH**
   ```bash
   git clone git@github.com:Youcode-Classe-E-2023-2024/Med-El-Bachiri_Wiki.git