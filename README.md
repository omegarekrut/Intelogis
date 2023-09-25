* Intelogis Delivery Cost Calculator

* A simple PHP application to calculate delivery costs and dates based on different delivery services.
Features

1. Supports multiple delivery services: Fast Delivery and Slow Delivery.
2. Provides a unified response format for all delivery services.
3. Easily extensible to support more delivery services in the future.

* Prerequisites

1. Docker and Docker Compose
2. Composer (for PHP dependency management)

* Setup and Installation

** Clone the Repository:

```bash
git clone [your-repository-url] Intelogis
cd Intelogis
```

** Install PHP Dependencies:

```bash
composer install
```

** Build and Start the Docker Containers:

```bash
docker-compose up -d
```
* Access the Application:
** Open your browser and navigate to http://localhost:8080.

* Usage

* Fill in the shipment details:
1. Source KLADR
2. Target KLADR
3. Weight (in kg)

Select a delivery service (Fast Delivery or Slow Delivery).

Click "Calculate" to get the delivery cost and estimated delivery date.