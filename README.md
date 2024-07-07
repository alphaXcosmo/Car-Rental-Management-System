# Car Rental Management System

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [VideoDemo](#videodemo)

## Introduction

The **Car Rental Management System** is a web application designed to manage car rentals. Users can log in, select a car model, and specify rental and return dates. The system also displays previous rental selections for the logged-in user.

## Features

- **User Authentication:** Secure login system for users.
- **Car Selection:** Users can select from multiple car models (Toyota, Honda, Ford, BMW).
- **Rental Management:** Users can specify rental and return dates and see their previous rentals.
- **Dynamic Timetable:** Displays user's previous rental history fetched from the database.

## Installation

Follow these steps to install and set up the project:

1. Clone the repository:
    ```sh
    git clone https://github.com/alphaXcosmo/car-rental-management-system.git
    ```

2. Navigate to the project directory:
    ```sh
    cd car-rental-management-system
    ```

3. Set up your database:
    - Create a database named `car`.
    - Create a table `TB` with the following schema:
      ```sql
      CREATE TABLE TB (
          id INT AUTO_INCREMENT PRIMARY KEY,
          username VARCHAR(255) NOT NULL,
          car_model VARCHAR(255) NOT NULL,
          rental_date DATE NOT NULL,
          return_date DATE NOT NULL
      );
      ```

4. Ensure you have a local server running with PHP and MySQL.

## Usage

1. Open `index.html` in your web browser.
2. Log in with the username and password.
3. Select a car model, rental date, and return date.
4. Click the "RENT" button to save the rental information.
5. The dashboard will display previous rental selections.

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes and commit them (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Open a Pull Request.

## VideoDemo

https://github.com/alphaXcosmo/Car-Rental-Management-System/issues/1#issue-2394163175
