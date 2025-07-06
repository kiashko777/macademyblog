# Magento 2 Project

## Description

This is a Magento 2 Community Edition project, version 2.4.4. It is set up to run in a Dockerized environment.

## Prerequisites

- Docker
- Docker Compose

## Installation

1.  **Clone the repository:**

    ```bash
    git clone <repository-url>
    cd <repository-name>
    ```

2.  **Install dependencies using Composer:**

    ```bash
    composer install
    ```

3.  **Start the Docker containers:**

    There are two Docker Compose files available: `docker-compose.dev.linux.yml` for Linux and `docker-compose.dev.mac.yml` for macOS. Use the appropriate command for your operating system.

    For Linux:

    ```bash
    docker-compose -f docker-compose.dev.linux.yml up -d
    ```

    For macOS:

    ```bash
    docker-compose -f docker-compose.dev.mac.yml up -d
    ```

    If you want to use the default `docker-compose.yml`, you can run:

    ```bash
    docker-compose up -d
    ```

4.  **Install Magento:**

    After the containers are up and running, you need to run the Magento installation command. You can do this by executing the following command in the `phpfpm` container:

    ```bash
    docker-compose exec phpfpm bin/magento setup:install \
        --base-url=http://localhost:8080/ \
        --db-host=db \
        --db-name=magento \
        --db-user=magento \
        --db-password=magento \
        --admin-firstname=Admin \
        --admin-lastname=User \
        --admin-email=user@example.com \
        --admin-user=admin \
        --admin-password=password123 \
        --language=en_US \
        --currency=USD \
        --timezone=America/Chicago \
        --use-rewrites=1
    ```

## Running the application

Once the installation is complete, you can access the application at the following URLs:

-   **Frontend:** [http://localhost:8080](http://localhost:8080)
-   **Admin:** [http://localhost:8080/admin](http://localhost:8080/admin)

## Available Services

The `docker-compose.yml` file defines the following services:

-   **phpfpm:** The PHP-FPM container.
-   **phpfpm_xdebug:** The PHP-FPM container with Xdebug enabled.
-   **varnish:** The Varnish cache container.
-   **nginx:** The Nginx web server container.
-   **db:** The MySQL database container.
-   **node:** The Node.js container.
-   **redis:** The Redis container.
-   **adminer:** A database management tool, accessible at [http://localhost:8090](http://localhost:8090).
-   **mailhog:** A mail catcher, accessible at [http://localhost:8025](http://localhost:8025).
-   **elasticsearch:** The Elasticsearch container.
-   **kibana:** The Kibana container, accessible at [http://localhost:5601](http://localhost:5601).
-   **rabbitmq:** The RabbitMQ container.

## Custom Modules

This project contains the following custom modules and themes:

-   **Macademy/Blog:** A blog module.
-   **Macademy/FreeShippingPromo:** A free shipping promotion module.
-   **Macademy/JsFun:** A module for JavaScript-related functionality.
-   **Macademy/ProductCompare:** A module for product comparison.
-   **Macademyy/InventoryFulfillment:** A module for inventory fulfillment.
-   **Juno/Theme:** A custom theme.

To enable or disable these modules, you can use the following commands:

```bash
docker-compose exec phpfpm bin/magento module:enable <module-name>
docker-compose exec phpfpm bin/magento module:disable <module-name>
```

After enabling or disabling a module, you need to run the following command:

```bash
docker-compose exec phpfpm bin/magento setup:upgrade
```
