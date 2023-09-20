# Library Management System

This is my web development 2 end of semester assignment in year 2. It features HTML, CSS, PHP, and SQL to create a working library website.

## Assignment Brief

The assignment brief is as follows:

### Library Functionality

The users should be allowed to:

- Search for a book
- Reserve a book
- View all the books that they have reserved

### User Authentication

- **Login**: The user must identify themselves to the system in order to use the system and throughout the whole site. If they have not previously used the system, they must register their details.

- **Registration**: This allows a user to enter their details on the system. The registration process should validate that all details are entered. Mobile phone numbers should be numeric and 10 characters in length. Passwords should be six characters and have a password confirmation function. The system should ensure that each user can be identified using a unique username.

### Book Search

The system should allow the user to search in a number of ways:

- By book title and/or author (including partial search on both)
- By book category description in a dropdown menu (book categories should be retrieved from the database)

The results of the search should display as a list from which the user can then reserve a book if available. If the book is already reserved, the user should not be allowed to reserve the book.

### Reserve a Book

The system should allow a user to reserve a book provided that no one else has reserved the book yet. The reservation functionality should capture the date on which the reservation was made.

### View Reserved Books

The system should allow the user to see a list of the book(s) currently reserved by that user. Users should also be able to remove the reservation if desired.

## Project Structure

The project follows a typical web development structure with the following components:

- **HTML**: Front-end web pages for user interaction.
- **CSS**: Styling for the web pages.
- **PHP**: Backend scripting for server-side logic and database interaction.
- **SQL**: Database scripts and schema for managing books, users, and reservations.
- **Images**: Image assets used in the website (e.g., book cover images).
- **README.md**: This file, providing an overview of the project.

## Getting Started

To run this project locally, follow these steps:

1. **Clone the Repository**: Clone this repository to your local machine.

```bash
git clone https://github.com/your-username/library-management.git
```

**Database Setup:**

- Set up a database to store user and book information.
- Use the SQL scripts provided in the `sql` folder to create the necessary tables and populate them with sample data.

**Configure Database Connection:**

- In the PHP files (e.g., `config.php`, `db.php`), update the database connection details to match your local database setup.

**Web Server:**

- Use a web server (e.g., Apache, Nginx) to host the project.
- Ensure that PHP is installed and configured on your server.

**Access the Website:**

- Open a web browser and navigate to the project's URL (e.g., `http://localhost/library-management`).

**Project Contributors:**

- Your Name - Developer

**License:**

This project is licensed under the MIT License - see the `LICENSE` file for details.

**Acknowledgments:**

- This project was created as an assignment for the web development course in year 2.

Feel free to contribute to the project, report issues, or suggest improvements. Happy coding!
