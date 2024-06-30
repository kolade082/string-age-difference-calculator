# Age Difference Calculator

This project calculates the age difference between two users based on their provided strings, fetching data from the Random User API. The application is built with PHP and uses a MySQL database.

## Prerequisites

- Docker
- Docker Compose

## Getting Started

### Clone the Repository

```sh
git clone https://github.com/kolade082/string-age-difference-calculator.git
cd agedifferencecalculator
```

Set Up the Environment
Ensure you have Docker and Docker Compose installed on your machine. Then, follow these steps to set up the environment:

1. Build and Start the Containers
   docker-compose up --build
   This command will build the Docker containers and start the services defined in the docker-compose.yml file.

2. Access the Application
   Open your web browser and navigate to http://localhost:80 to access the Age Difference Calculator application.

Project Structure

index.php: The main page where users input their strings.
process.php: The script that processes the input, fetches data from the Random User API, calculates the age difference, and stores the data in the database.
db.php: The database connection script.
tests/AgeDifferenceTest.php: PHPUnit test for the application.
Dockerfile: Dockerfile to build the PHP/Apache container.
docker-compose.yml: Docker Compose file to manage the multi-container application.
Database Configuration
The database configuration is managed in db.php. By default, it connects to a MySQL database with the following credentials:

Host: db
Database: xtremepush
User: root
Password: root
These settings are defined in the docker-compose.yml file.

Running Tests
To run the PHPUnit tests, use the following command:
docker-compose run phpunit tests/AgeDifferenceTest.php

This command will run the tests defined in tests/AgeDifferenceTest.php inside the Docker container.

Example Usage
Calculate Age Difference

Enter two strings (e.g., names) in the input fields on the main page.
Click the "Calculate" button.
The application will fetch the date of birth for the users associated with the strings from the Random User API, calculate their ages, and display the age difference.
Viewing Results

The results will be displayed on the same page, showing the date of birth, age, and age difference for the entered strings.
