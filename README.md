# Scholarspace
[![Tests](https://github.com/Raccoon254/Scholarspace.io/actions/workflows/laravel.yml/badge.svg)](https://github.com/Raccoon254/Scholarspace.io/actions/workflows/laravel.yml)

Scholarspace is a web application designed to facilitate assignment help services. Built with Laravel, it offers a platform for clients to place orders and for writers to manage and fulfill these orders. The application includes features for real-time chat, payment processing, notifications, FAQs, and terms and conditions management.

## Tech Stack
- **Backend**: PHP (Laravel)
- **Frontend**: Blade, Tailwind CSS, Alpine.js, Livewire
- **Database**: MySQL
- **Real-Time Messaging**: Laravel Echo, Pusher
- **Payment Gateway**: PayPal, CashApp, Zelle
- **Deployment**: GitHub Actions, VPS (DigitalOcean)
- **CI/CD**: GitHub Actions
- **Version Control**: Git
- **Documentation**: Markdown

## Features

- **Writer**
    - Take orders
    - Support via chatbot

- **Client**
    - Make orders
    - View order history

- **System Features**
    - Real-time chat
    - Payments (15 USD per page) with support for discounts and referrals
    - Payment methods: PayPal, CashApp, Zelle
    - Notifications and alerts
    - FAQ management
    - Terms and conditions

## Installation

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL
- Node.js & npm
- Laravel CLI

### Setup Instructions

1. **Clone the Repository**

   ```sh
   git clone git@github.com:Raccoon254/Scholarspace.io.git scholarspace
   cd scholarspace
   ```

2. **Install Dependencies**

   ```sh
   composer install
   npm install
   npm run start
   ```

3. **Environment Configuration**

    - Copy the `.env.example` file to `.env`:

      ```sh
      cp .env.example .env
      ```

    - Update the `.env` file with your database and other configurations.

4. **Generate Application Key**

   ```sh
   php artisan key:generate
   ```

5. **Run Migrations**

    Update the `.env` file with your database credentials, then run the migrations:

   ```sh
   php artisan migrate
   ```

6. **Seed the Database (Optional)**

   ```sh
   php artisan db:seed
   ```

7. **Serve the Application**

   ```sh
   php artisan serve
   ```

   The application will be available at `http://localhost:8000`.

## Usage

### User Roles

- **Client**
    - Register and log in to place orders.
    - View order history and details.

- **Writer**
    - Register and log in to manage orders.
    - View and take available orders.

### Order Management

- Clients can create new orders specifying the assignment details.
- Writers can view and accept orders, then mark them as in-progress or completed.

### Real-Time Chat

- Integrated chat system for communication between clients and writers.
- Use Laravel Echo and Pusher for real-time messaging.

### Payments

- Payments are calculated at 15 USD per page.
- Clients can make payments using PayPal, CashApp, or Zelle.
- Support for discounts and referral bonuses.

### Notifications

- Users receive notifications for order updates, payment confirmations, and chat messages.

### FAQ and Terms & Conditions

- Static pages for FAQs and terms and conditions.
- Admin interface for managing FAQ entries.

## Contributing

Contributions are welcome! Please fork this repository and submit a pull request for any improvements or bug fixes.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

For any inquiries or support, please contact [dev@scholarspace.com](mailto:tomsteve187@gmail.com).

