<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use JsonMapper;

class JsonMapperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): JsonMapper
    {
        $jsonMapper = new JsonMapper();

        $jsonMapper->undefinedPropertyHandler = function (object $object, string $propName, $jsonValue) {
            $fixedPropName = Str::camel($propName);

            if (property_exists($object, $fixedPropName)) {
                $object->{$fixedPropName} = $jsonValue;
            }
        };

        return $jsonMapper;
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
