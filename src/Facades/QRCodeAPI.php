<?php

namespace Yebto\QRCodeAPI\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array generate(string $data, array $extra = [])
 * @method static array generateExperience(string $type, array $data, array $extra = [])
 */
class QRCodeAPI extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'yebto-qrcode';
    }
}
