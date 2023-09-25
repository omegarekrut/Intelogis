Intelogis Delivery Cost Calculator

A simple PHP application to calculate delivery costs and dates based on different delivery services.
Features

    Supports multiple delivery services: Fast Delivery and Slow Delivery.
    Provides a unified response format for all delivery services.
    Easily extensible to support more delivery services in the future.

Prerequisites

    Docker and Docker Compose
    Composer (for PHP dependency management)

Setup and Installation

    Clone the Repository:

```bash
git clone [your-repository-url] Intelogis
cd Intelogis
```

Install PHP Dependencies:

```bash
composer install
```

Build and Start the Docker Containers:

```bash
docker-compose up -d
```
Access the Application:
    Open your browser and navigate to http://localhost:8080.

Usage

Fill in the shipment details:
    Source KLADR
    Target KLADR
    Weight (in kg)

Select a delivery service (Fast Delivery or Slow Delivery).

Click "Calculate" to get the delivery cost and estimated delivery date.