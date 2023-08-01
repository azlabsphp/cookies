# cookies

Provides HTTP cookie object implementation. It provides a factory class and a proxy class for creating cookie instance.

## Usage

To create a cookie instance simply use the factory class or the factory proxy class:

```php

use Drewlabs\Cookies\Factory;

$factory = new Factory;

$cookie = $factory->create('sessionid', random_int(10000, 100000) . time()); // CookieInterface

// API

$cookie->getName(); // sessionid -> Returns the cookie name

$cookie->getValue(); // -> Returns cookie value

$cookie->isHttpOnly(); // Check if the cookie is http only

$cookie->isSecure(); // Check if the cookie is secure

// etc...
```

using the factory proxy class:

```php

use Drewlabs\Cookies\FactoryProxy as Factory;

$cookie = Factory::create('sessionid', random_int(10000, 100000) . time()); // CookieInterface

```

**Note** The cookie instance provide is a `Stringable` instance that easily allows developpers to convert the cookie instance into an http cookie string:

```php

use Drewlabs\Cookies\FactoryProxy as Factory;

$cookie = Factory::create('sessionid', random_int(10000, 100000) . time()); // CookieInterface

printf("%s\n", (string)$cookie); // sessionid=428461690891271; Path=/; Secure; HttpOnly; SameSite=Lax
```