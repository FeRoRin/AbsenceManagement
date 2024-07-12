# Absence Management System

A simple student absence management system.

## Description

This project is designed to manage student absences.


## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/FeRoRin/AbsenceManagement.git
    ```
2. Navigate to the project directory:
    ```bash
    cd AbsenceManagement
    ```
3. Set up the database:
    - Import the `db.sql` file into your MySQL database (database name is 'tpabsence'):
        ```sql
        mysql -u username -p database_name < db.sql
        ```
4. Configure your server settings in `index.php`.

## Database Schema

The database consists of the following tables:

### `absence`
| Column    | Type    | Description                      |
|-----------|---------|----------------------------------|
| semaine   | int(11) | Week number                      |
| cne       | int(11) | Student identification number    |
| nbr_abs   | int(11) | Number of absences               |

### `eleve`
| Column    | Type         | Description                      |
|-----------|--------------|----------------------------------|
| cne       | int(11)      | Student identification number    |
| nom       | varchar(30)  | Student's last name              |
| prenom    | varchar(30)  | Student's first name             |
| groupe    | varchar(30)  | Group                            |

### `user`
| Column    | Type         | Description                      |
|-----------|--------------|----------------------------------|
| cne       | int(11)      | User identification number       |
| password  | varchar(20)  | User's password                  |
| type      | varchar(30)  | User type (e.g., 'prof', 'eleve')|

## Usage

1. Open `index.php` in your web browser.
2. Follow the on-screen instructions to manage student absences.

## Contributing

Contributions are welcome! Please fork this repository and submit a pull request for any enhancements or bug fixes.
