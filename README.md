# BykeApp

BykeApp is an online bike rental service web application built with Laravel. Users can browse bike stations on an interactive map, rent available bikes, track their rides, and earn points and achievements. Bike owners can register as investors and add their bikes to the platform.

This project was developed for a hackathon.

## Tech Stack

- **Backend:** Laravel 6 (PHP 7.2+)
- **Frontend:** Vue.js 2, Tailwind CSS, Bootstrap 4
- **Maps:** Mapbox GL JS
- **Database:** MySQL
- **Asset Compilation:** Laravel Mix (Webpack)

## Features

- **User Authentication** -- Registration, login, password reset, email verification
- **Interactive Map** -- Browse bike stations with Mapbox GL, see available bikes at each location
- **Bike Rental** -- Select a station, choose a duration, and rent a bike (30 PHP/hour)
- **Ride Tracking** -- Track distance traveled and rental duration
- **Points & Rewards** -- Earn points based on distance (0.1 points per km), redeem perks
- **Achievements** -- Unlock badges (e.g., "First 10 KM")
- **Investor System** -- Users can register their own bikes and become investors
- **Perks Marketplace** -- Create and browse redeemable rewards

## Prerequisites

- PHP 7.2 or higher
- Composer
- Node.js and npm
- MySQL

## Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/glenbenatiro/bykeapp.git
   cd bykeapp
   ```

2. **Install PHP dependencies**

   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**

   ```bash
   npm install
   ```

4. **Configure environment**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Then edit `.env` and set your database credentials:

   ```
   DB_DATABASE=bykeapp
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run database migrations and seeders**

   ```bash
   php artisan migrate --seed
   ```

6. **Compile frontend assets**

   ```bash
   npm run dev
   ```

7. **Start the development server**

   ```bash
   php artisan serve
   ```

   The application will be available at `http://localhost:8000`.

## Database Schema

| Table | Description |
|---|---|
| `users` | User accounts with auth, profile info, investor status, distance, and points |
| `bikes` | Bike inventory with owner, station assignment, and availability status |
| `bike_stations` | Station locations with latitude/longitude coordinates |
| `instances` | Bike rental records with duration, fare, distance, and points earned |
| `achievements` | User achievement badges |
| `perks` | Redeemable rewards with point costs |

## Known Limitations

- **Payment system** is a stub (PayMaya integration is incomplete)
- **Laravel 6 is end-of-life** (September 2022) and no longer receives security patches
- **`fzaninotto/faker`** is abandoned; the successor is `fakerphp/faker`
- Some controller methods contain `dd()` debugging calls

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
