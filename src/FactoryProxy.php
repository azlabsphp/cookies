<?php

namespace Drewlabs\Cookies;

/**
 * @method static CookieInterface create(string $name, string $value = '', $expire = null, ?string $domain = null, ?string $path = '/', ?bool $secure = true, ?bool $httpOnly = true, ?string $sameSite = Cookie::SAME_SITE_LAX)
 * @method static CookieInterface createFromString(string $string)
 */
class FactoryProxy
{

    /**
     * Proxy method calls to `Factory` instance
     * 
     * @param string $name 
     * @param array $arguments
     * 
     * @return mixed 
     */
    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([new Factory, $name], $arguments);
    }

}