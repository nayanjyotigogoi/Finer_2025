# FINER Project

## About FINER

The FINER (Federation of Industry & Commerce of North Eastern Region) project is a web platform designed to foster business growth, collaboration, and strategic initiatives across the North Eastern Region. Built with Laravel, this application provides tools for effective event management, press release dissemination, and membership promotion.

## Key Features

### Dynamic Banner Section
- Fetch and display banners dynamically from the database.
- Easy management through the admin panel.

### Board of Directors Section
- Showcases active members of the Board of Directors.
- Fetches data dynamically from the `director_profiles` table.

### Event Management
- Organizes events into "Upcoming" and "Past" categories based on their status.
- Admins can control the order and visibility of events.

### Press Release Management
- Add, edit, and manage press releases dynamically.
- Supports images and PDFs for each press release.

### Membership and Initiatives
- Highlights FINER membership benefits and strategic pillars.
- Displays interactive charts and descriptive content.

## Learning Resources

The FINER project is built with Laravel, which offers extensive [documentation](https://laravel.com/docs) and tutorials. Additionally, [Laracasts](https://laracasts.com) provides a wide range of video tutorials on Laravel and modern web development techniques.

## Technology Stack

- **Backend**: Laravel 8
- **Frontend**: HTML, CSS, JavaScript, TailwindCSS
- **Database**: MySQL

## Installation

### Prerequisites
- PHP >= 7.4
- Composer
- Node.js & npm
- MySQL

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/finer-project.git
   cd finer-project
   ```
2. Install dependencies:
   ```bash
   composer install
   npm install
   ```
3. Set up the `.env` file:
   - Copy the `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Configure database and other environment variables in `.env`.

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```
5. Run migrations:
   ```bash
   php artisan migrate
   ```
6. Seed the database (if applicable):
   ```bash
   php artisan db:seed
   ```
7. Start the development server:
   ```bash
   php artisan serve
   ```

## Contributing

Contributions are welcome! Please follow the [contribution guide](https://laravel.com/docs/contributions) to get started.

## Code of Conduct

We are committed to fostering an open and welcoming environment. Please review and adhere to our [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover any security vulnerabilities, please email [taylor@laravel.com](mailto:taylor@laravel.com) or open an issue on GitHub. All vulnerabilities will be promptly addressed.

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
