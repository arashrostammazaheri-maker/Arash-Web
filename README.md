# Let's Learn Hardware (PHP Edition) - v2.0

An interactive, dynamic web application designed to teach computer hardware concepts, featuring dynamic data management and interactive web tools. This project was originally built using static HTML/CSS/JS and has been fully upgraded to a dynamic PHP backend.

## Live Demo
You can check out the static version of this project here: [View Live Demo](https://arashrostammazaheri-maker.github.io/Arash-Web/)
*(This demo is powered by the HTML Edition v2.0, a static port of the PHP version designed specifically for GitHub Pages. To experience the full PHP backend features, host it locally using XAMPP).*

## Project Evolution

This project evolved through several stages during its development:

- **HTML Edition v1.0** – Initial static prototype.

- **PHP Edition v2.0** – Major redesign with dynamic content, authentication system, interactive tools, and UI improvements.

- **HTML Edition v2.0** – A static port of the PHP Edition created specifically for GitHub Pages, preserving the user experience without requiring a PHP server.

## Features
- **Dynamic Content:** Articles and hardware details are dynamically generated from JSON data (`articles.json`).
- **Secure Authentication:** Features a custom flat-file user authentication system using secure `bcrypt` password hashing and `.htaccess` file protection.
- **Interactive Tools:** Includes a dynamic PC Bottleneck Calculator and Power Supply (PSU) Wattage Estimator.
- **UI/UX:** Modern frosted-glass (Glassmorphism) design with a fully functional Dark/Light mode toggle.

## Tech Stack
- **Backend:** PHP 8.x (Flat-file database)
- **Frontend:** HTML5, CSS3 (Custom Variables & Glassmorphic UI), Modern JavaScript
- **Security:** Bcrypt Hashing, Apache Configuration (`.htaccess`)

## How to Run Locally
1. Download and install [XAMPP](https://www.apachefriends.org/)
2. Clone or download this repository into your `htdocs` directory.
3. Start the **Apache** server from the XAMPP Control Panel.
4. Open your browser and navigate to `http://localhost/Let's Learn Hardware PHP Edition-Updated To V 2.0/`
