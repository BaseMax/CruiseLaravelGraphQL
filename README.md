# CruiseGraphQL: Innovative Car Rental Platform

Welcome to CruiseGraphQL, an innovative car rental platform that harnesses the power of GraphQL. This project is developed using Laravel 10 and PHP 8.2, offering a streamlined approach to car reservations, real-time vehicle availability tracking, and optimized performance through Redis caching.

CruiseGraphQL is an innovative car rental platform leveraging GraphQL. Engineered using Laravel 10 and PHP 8.2, it streamlines car reservations, monitors vehicle availability, and employs Redis caching for enhanced performance.

## Features

- **Car Rental Simplified:** CruiseGraphQL provides a user-friendly experience for browsing and renting cars.
- **Effortless Booking Management:** Users can easily create, modify, and manage their car rental bookings.
- **Real-time Vehicle Availability:** The system ensures up-to-date information on car availability.
- **GraphQL API:** CruiseGraphQL exposes a GraphQL API for flexible queries and mutations.
- **Enhanced Performance:** Redis caching is implemented to optimize data retrieval and reduce database load.
- **Laravel 10 and PHP 8.2:** Built on the latest technologies to ensure a modern and robust foundation.

## Installation

Clone the repository from GitHub.

```bash
git clone https://github.com/BaseMax/CruiseLaravelGraphQL.git
```

Navigate to the project directory.

```bash
cd CruiseLaravelGraphQL
```

Install project dependencies using Composer.

```bash
composer install
```

Duplicate `.env.example` and rename the copy to `.env`.

```bash
cp .env.example .env
```

Configure `.env` with your database and Redis settings.

Generate the application key.

```bash
php artisan key:generate
```

Run database migrations and seeders to set up the initial database structure and sample data.

```bash
php artisan migrate --seed
```

Start the development server.

```bash
php artisan serve
```

Access the GraphQL Playground at `http://localhost:8000/graphql` in your web browser.

## GraphQL API

Explore and interact with the CruiseGraphQL API using the integrated GraphQL Playground. Test various queries and mutations to experience the platform's capabilities firsthand.

Here are some examples:

Query available cars:

```graphql
query {
  availableCars {
    id
    make
    model
    year
    ...
  }
}
```

Create a booking:

```graphql
mutation {
  createBooking(input: {
    userId: 1,
    carId: 3,
    pickupDate: "2023-08-20",
    returnDate: "2023-08-25"
  }) {
    id
    user {
      name
    }
    car {
      make
      model
    }
    ...
  }
}
```

## Caching with Redis

Redis caching is implemented to enhance the performance of CruiseGraphQL. Frequently accessed data, such as car details and availability status, are cached to minimize database queries and improve response times.

## License

CruiseGraphQL is open-source software licensed under the GPL-3.0 License.

## Acknowledgments

We extend our gratitude to the Laravel community for providing an exceptional framework for web application development.

Copyright 2023, Max Base
