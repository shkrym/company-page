## Overview

This repository provides a development environment for WordPress using Vite. Theme development is done using Vite for improved efficiency.

## Operating wp-env

- Start: Run `npm run start` to start the wp-env Docker container.
- Stop: Run `npm run stop` to stop wp-env Docker container.
- Remove: Run `npm run remove` to remove wp-env Docker container.

## Accessing in a Browser

Access WordPress at http://127.0.0.1  
Log in to the admin panel at http://127.0.0.1/wp-login.php

Username: admin  
Password: password

## Editing Themes

Theme files are located in the themes folder.
`themes/smiron-hp` is the main theme folder.

## Building CSS and JS

Place CSS files in `src/css` and JS files in `src/js`.

`app.css` is the main CSS file. Tailwind CSS is used.

`app.js` is the main JS file.

`app-fa.css` is the CSS file for FontAwesome.

For using Bootstrap, use `src/scss/app-bs.scss`.

### Build

- `npm run build`: Build for production.
- `npm run dev`: Build for development (with auto-reload).

Editing files in the `src` and `themes` folders will automatically refresh the browser.

## Database

### Import

Place the SQL dump file in `sql/db.sql`.  
Run `npm run db:import` to import.

### Execute SQL statements

Edit `sql/update.sql` and run `npm run db:update`.

### PhpMyAdmin

Access at http://1247.0.0.1:4040

Username: root  
Password: password