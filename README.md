Event Management System (Laravel Project)

A basic event management system built with Laravel.

Features

Admin can create events with title, description, date, time, and capacity.

Users can view upcoming events and book them.

Bookings respect maximum capacity.

Admin can manage attendees and bookings.

Installation

Clone the repository:

git clone https://github.com/sujinkumar1025/event-management.git
cd event-management

Install dependencies:

composer install

Setup environment:

cp .env.example .env
php artisan key:generate

Configure .env for your database, then run:

php artisan migrate
php artisan serve

Access the project in your browser:

http://127.0.0.1:8000/

Admin URL:

http://127.0.0.1:8000/admin/events

