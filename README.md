# Nebula Sports - Sports Management System

## Overview
Nebula Sports is a fully developed sports management system designed to streamline athlete, coach, and sponsor management. This project was developed as part of an internship, and I was the sole developer responsible for its implementation.

The system includes features for user authentication, athlete and coach registration, data modification, and sponsorship management.

## Features
- **User Authentication**: Secure login and logout functionality.
- **Athlete Management**: Register, modify, and delete athlete records.
- **Coach Management**: Register, modify, and delete coach records.
- **User Management**: Manage users with registration and modification capabilities.
- **Sponsorship Management**: Display sponsorship details.
- **Image Uploads**: Support for uploading images.
- **Database Integration**: Uses a relational database to store all system data.

## Folder Structure
```
├── database/         # Contains database-related scripts and configuration
├── img/             # Stores general images used in the project
├── js/              # JavaScript files for client-side functionality
├── upload_img/      # Stores uploaded images
├── about.php        # About page
├── ath_form.php     # Athlete registration form
├── ath_form_insert.php # Handles athlete form submissions
├── career.php       # Career-related information page
├── check_login.php  # Handles login authentication
├── coach_form.php   # Coach registration form
├── coach_form_insert.php # Handles coach form submissions
├── connection.php   # Database connection file
├── delete_ath.php   # Delete athlete record
├── delete_coach.php # Delete coach record
├── delete_user.php  # Delete user record
├── footer.php       # Footer section
├── home.php         # Homepage
├── logout.php       # Logout functionality
├── modify_ath.php   # Modify athlete details
├── modify_coach.php # Modify coach details
├── modify_user.php  # Modify user details
├── navbar.php       # Navigation bar
├── sponsor.php      # Sponsorship details
├── thankyou.php     # Thank you page
├── user_form.php    # User registration form
├── user_insert.php  # Handles user registration submissions
```

## Installation
1. Clone the repository:
   ```sh
   git clone https://github.com/your-username/nebula-sports.git
   ```
2. Set up the database using the provided SQL script in the `database/` folder.
3. Configure the database connection in `connection.php`.
4. Start a local server (e.g., XAMPP, WAMP, or MAMP) and place the project files in the `htdocs` folder (for XAMPP).
5. Open `home.php` in a browser.

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL

## Contributions
As this was an internship project and I was the sole developer, external contributions are not currently accepted. However, feel free to fork the repository and modify it as needed.

## License
This project is for learning purposes and is not under any open-source license.

---
Feel free to reach out for any queries or improvements!
