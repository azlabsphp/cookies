<?php

use Drewlabs\Cookies\Cookie;
use Drewlabs\Cookies\CookieInterface;
use Drewlabs\Cookies\Factory;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{

    public function test_factory_create_cookie()
    {
        // Initialize
        $factory = new Factory;

        // Act
        $cookie = $factory->create('jit', $value = random_int(10000, 100000) . time());

        // Assert
        $this->assertInstanceOf(CookieInterface::class, $cookie);
        $this->assertEquals($value, $cookie->getValue());
    }

    public function test_factory_create_cookie_throws_exception_if_expires_is_not_valid_date()
    {
        // Initialize
        $factory = new Factory;

        // Assert
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf('The string representation of the cookie expire time `%s` is not valid.', '20-32-2034'));

        // Act
        $factory->create('jit', $value = random_int(10000, 100000) . time(), '20-32-2034');
    }

    public function test_factory_create_cookie_from_string()
    {
        // Initialize
        $factory = new Factory;

        // Act
        $cookie = $factory->createFromString('sessionid=428461690891271; Path=/; Secure; HttpOnly; SameSite=Lax');

        $this->assertEquals('sessionid', $cookie->getName());
        $this->assertEquals('/', $cookie->getPath());
        $this->assertEquals('428461690891271', $cookie->getValue());
        $this->assertTrue($cookie->isHttpOnly());
        $this->assertEquals(Cookie::SAME_SITE_LAX, $cookie->getSameSite());
    }

    public function test_factory_create_from_string_throws_invalid_argument_exception_if_cookie_string_is_malformed()
    {
        $factory = new Factory;

        // Assert
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf('The cookie name cannot be empty'));

        // Act
        $factory->createFromString('=bar');
    }
}
