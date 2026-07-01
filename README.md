# Let's Learn Hardware (HTML Edition) - v2.0



An interactive, RTL (Persian) educational website that teaches computer hardware concepts through an interactive PC case explorer, dynamic articles, and smart calculators. This is a static port of the PHP Edition v2.0, built with Vanilla HTML, CSS, and JavaScript — designed specifically to run on GitHub Pages without requiring a server.



## Live Demo



Click [here](https://arashrostammazaheri-maker.github.io/Arash-Web/) to view the site.



## Project Evolution



This project evolved through several stages during its development:

- **HTML Edition v1.0** – Initial static prototype.

- **PHP Edition v1.0** – Direct migration of the HTML prototype to PHP.

- **PHP Edition v2.0** – Major redesign with dynamic content, authentication system, interactive tools, and UI improvements.

- **HTML Edition v2.0** – A static port of the PHP Edition created specifically for GitHub Pages, preserving the user experience without requiring a PHP server.



## Features



- **Interactive PC Case Explorer:** Hover or click on hardware components (CPU, GPU, Motherboard, RAM, Storage, PSU) inside a visual case mockup to view detailed, in-depth descriptions of each part.

- **Client-side Article System:** Browse and read hardware news and guides, with content persisted client-side via `localStorage`.

- **Smart Tools:**

  - **PSU Wattage Estimator:** Calculates a recommended power supply wattage based on selected CPU and GPU.

  - **Bottleneck Calculator:** Visually estimates the performance bottleneck between a chosen CPU and GPU pairing.

- **Authentication (Demo):** A client-side login/account/admin system using `localStorage`, including a dedicated Super Admin role for managing articles. *(since this is a static frontend-only demo, authentication is simulated client-side and is not intended for real-world security use.)*

- **Admin Panel:** Authorized users can publish and manage articles directly from the browser.

- **UI/UX:** Modern frosted-glass (Glassmorphism) design with a fully functional Dark/Light mode toggle, built fully right-to-left (RTL) for Persian content.



## Tech Stack



- **Frontend:** HTML5, CSS3 (Custom Variables & Glassmorphic UI), Vanilla JavaScript (ES6+)

- **Fonts & Icons:** Vazirmatn (Persian webfont), Font Awesome

- **Data Persistence:** Browser `localStorage` (no backend/database)

- **Hosting:** GitHub Pages (static hosting)



## How to Run Locally



No server or build step is required — this is a pure static site.



1. Clone or download this repository.

2. Open `index.html` directly in your browser, **or** serve the folder with any static file server (e.g. the VS Code "Live Server" extension) for the best experience.

3. That's it — no installation, dependencies, or backend setup needed.



## Notes

This edition uses client-side `localStorage` instead of a real backend, so user data is stored locally in the browser rather than on a server. For the complete experience, including secure authentication and persistent server-side data management, check out the [PHP Edition](https://github.com/arashrostammazaheri-maker/Arash-Web/tree/main).
