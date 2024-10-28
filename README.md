# Atomic WordPress Dev

A Docker-based local development environment for WordPress projects.

## Features

- WordPress with MySQL
- Easy setup with Docker Compose
- Persistent database storage

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/atomic-wordpress-dev.git
   cd atomic-wordpress-dev
   ```

2. **Start the Docker containers**:
   ```bash
   docker-compose up -d
   ```

3. **Access WordPress**:
   Open your browser and go to `http://localhost:8000`.

## Usage

- **Stopping the environment**:
  ```bash
  docker-compose down
  ```

- **Restarting the environment**:
  ```bash
  docker-compose up -d
  ```

- **Accessing the MySQL database**:
  ```bash
  docker exec -it <mysql-container-name> mysql -u root -p
  ```

## Profiling Tools

### Using Profiling Tools

To identify performance bottlenecks, you can use the profiling tools integrated into this project.

### Running the Profiling Service

1. **Start the profiling service**:
   ```bash
   docker-compose up -d profiler
   ```

2. **Access the profiling results**:
   The profiling results will be saved in the `profiler` directory as `profile.svg`.

## Contributing

We welcome contributions! Please follow these guidelines:

1. **Fork the repository**.
2. **Create a new branch** for your feature or bugfix.
3. **Commit your changes** with clear and descriptive messages.
4. **Push your changes** to your fork.
5. **Create a pull request** to the main repository.

For more details, please refer to `CONTRIBUTING.md`.
