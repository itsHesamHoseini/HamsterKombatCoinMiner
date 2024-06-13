# Hamster Kombat Bot

**Version:** 1.0

**Coded By:** [ItsHesamHoseini](https://t.me/ItsHesamHoseini) - [LinuxTV_ir](https://t.me/LinuxTV_ir)

This project includes a bot for interacting with the Hamster Kombat game API, providing various functionalities including automatic clicking, user information retrieval, task list retrieval, and card optimization using the `Hamster` class.

## Features

- **Automatic Clicking**: To bypass the 3-hour limit and increase card profits.
- **User Information Retrieval**: Retrieving user information from the API.
- **Task List**: Retrieving and displaying task lists.
- **Card Optimization**: Finding the best cards for more profit.
- **Daily Coins Retrieval**: Retrieving daily coins from the API.

## Prerequisites

- **PHP 8.0.0 or higher**: This script requires PHP version 8.0.0 or higher.
- **cURL**: This script uses the cURL library for sending HTTP requests.

## Installation and Setup

1. Clone the repository:
    ```bash
    git clone https://github.com/itsHesamHoseini/HamsterKombatBot.git
    cd HamsterKombatBot
    ```

2. Make sure PHP 8.0.0 or higher is installed:
    ```bash
    php -v
    ```

3. Put your token in the `$token` variable in the `example.php` file.

## Usage

### Direct Execution

You can execute the script directly from the command line:

```bash
php example.php YOUR_TOKEN
```

### Web Usage

You can request the script via the web:

#### GET Request

```url
https://YOUR_DOMAIN/hamster/example.php?token=YOUR_TOKEN
```

#### POST Request

```url
POST https://YOUR_DOMAIN/hamster/example.php
Payload: {'token': 'YOUR_TOKEN'}
```

## `Hamster` Class Documentation

### `__construct($token)`

- **Parameters**:
  - `$token` (string): Authentication token for accessing the API.

### `getme()`

Retrieves user information from the API.

### `_Click($rand = 0, $param = "")`

Automatic clicking to increase profits.

- **Parameters**:
  - `$rand` (int): Number of random clicks (default: 0).
  - `$param` (string): Additional parameter for the request.

### `get_list_task()`

Retrieves task list from the API.

### `get_best_cart_for_profit($upgraded)`

Finds the best cards for more profit.

- **Parameters**:
  - `$upgraded` (bool): Whether cards should be upgraded or not.

### `get_daily_coins()`

Retrieves daily coins from the API.

### `UpgradeCarts($task_id)`

Upgrades cards using the task ID.

- **Parameters**:
  - `$task_id` (string): Task ID for upgrade.

### `get_carts()`

Retrieves available cards for purchase from the API.

### `AutomaticMiner()`

Automatically runs clicks and displays profits.

## Contributing

We're always looking to improve the project! If you have any ideas or want to contribute to improving the code, please submit a pull request or open an issue.

## License

This project is licensed under the [MIT License](LICENSE).

## Contact Us

You can contact us through the following links:
- **ItsHesamHoseini:** [Telegram](https://t.me/ItsHesamHoseini)
- **LinuxTV_ir:** [Telegram](https://t.me/LinuxTV_ir)

---

**Enjoy and maximize your gaming experience!**
