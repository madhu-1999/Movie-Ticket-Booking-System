# Movie Ticket Booking System
A web-based application that allows users to browse ongoing movies by genre and language, book tickets, and view their booking history.

## Features
1. **Browse Movies**: View a list of current movies filtered by genre and language.​
2. **Book Tickets**: Select seats and book tickets for available shows.​
3. **Booking History**: Review past ticket bookings.​

## ER diagram
![er-diagram](https://github.com/madhu-1999/Movie-Ticket-Booking-System/blob/main/er-diagram.png)
## Technologies Used
+ **Frontend**:
 + HTML​
 + CSS​
 + JavaScript​
+ jQuery (including jQuery Seat Charts plugin)​
+ **Backend**:
 + PHP​
+ **Database**:
 + MySQL

## Setup Instructions
Run `docker-compose.yml` file to setup mysql database and php environment
```bash

docker-compose up --build

```
Access the application through your web browser at `http://localhost:8080/php/home.php`
