<?php

use Drewlabs\Cookies\CookieInterface;
use Drewlabs\Cookies\FactoryProxy;
use PHPUnit\Framework\TestCase;

class FactoryProxyTest extends TestCase
{

    public function test_factory_proxy_call_factory_create_method_when_called_statically()
    {
        $cookie = FactoryProxy::create('jit', $value = random_int(10000, 100000) . time());
        $this->assertInstanceOf(CookieInterface::class, $cookie);
    }

    public function test_factory_proxy_call_factory_create_from_string_method_when_called_statically()
    {
        $cookie = FactoryProxy::createFromString('sessionid=428461690891271; Path=/; Secure; HttpOnly; SameSite=Lax');
        $this->assertInstanceOf(CookieInterface::class, $cookie);
    }
}