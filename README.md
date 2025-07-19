# Installation

### Download code

```bash
git clone https://github.com/nanodepo/initium.git
```

### Create .env

```bash
cp .env.example .env
```

### Rename DB_DATABASE in .env

```bash
DB_DATABASE=YOUR_DATABASE
```

### Install Dependencies

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

### Start Docker Containers

```bash
sail up -d
```

### Key Generate

```bash
sail art key:generate
```

### Storage Link
```bash
sail art storage:link
```

### Start Migrations and seed data

```bash
sail art migrate --seed
```

### Install NodeJS Dependencies

```bash
sail npm install
```

### Build Resource

```bash
sail npm run build
```

### Test users

| Name           | Email                             | Password       |
|----------------|-----------------------------------|----------------|
| Jason Walker   | ```jason.walker@nanodepo.net```   | ```1q2w3e4r``` |
| Sofia Martinez | ```sofia.martinez@nanodepo.net``` | ```1q2w3e4r``` |
| Frank Malcov   | ```frank.malcov@nanodepo.net```   | ```1q2w3e4r``` |
| Sally Taylor   | ```sally.taylor@nanodepo.net```   | ```1q2w3e4r``` |
| Katie Jackson  | ```katie.jackson@nanodepo.net```  | ```1q2w3e4r``` |
| Ray Carter     | ```ray.carter@nanodepo.net```     | ```1q2w3e4r``` |


Go to http://localhost
