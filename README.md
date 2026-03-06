# YEB QRCodeAPI

PHP SDK for the YEB QR Code API. Generate QR codes and dynamic QR experiences.

Works standalone (plain PHP) or with Laravel (Facade + auto-discovery).

## Requirements

- PHP 8.1+
- cURL extension
- [YEB API Key](https://yeb.to) (free tier available)

## Installation

```bash
composer require yebto/qrcode-api
```

## Standalone Usage

```php
use Yebto\QRCodeAPI\QRCodeAPI;

$api = new QRCodeAPI(['key' => 'your-api-key']);
$result = $api->generate('example');
```

## Laravel Usage

Add your API key to `.env`:

```
YEB_KEY_ID=your-api-key
```

Use via Facade:

```php
use QRCodeAPI;

$result = QRCodeAPI::generate('example');
```

Or via dependency injection:

```php
use Yebto\QRCodeAPI\QRCodeAPI;

public function handle(QRCodeAPI $api)
{
    $result = $api->generate('example');
}
```

### Publish Config

```bash
php artisan vendor:publish --tag=yebto-qrcode-config
```

## Available Methods

| Method | Description |
|--------|-------------|
| `generate($data)` | Generate a QR code image |
| `generateExperience($type, $data)` | Generate a dynamic QR experience (text, url, vcard_plus, pdf, social, images, app, videos, event, mp3, coupon, feedback, rating) |


All methods accept an optional `$extra` array parameter for additional API options.

## Error Handling

```php
use Yebto\ApiClient\Exceptions\ApiException;
use Yebto\ApiClient\Exceptions\AuthenticationException;
use Yebto\ApiClient\Exceptions\RateLimitException;

try {
    $result = $api->generate('example');
} catch (AuthenticationException $e) {
    // Missing or invalid API key (401)
} catch (RateLimitException $e) {
    // Too many requests (429)
} catch (ApiException $e) {
    echo $e->getMessage();
    echo $e->getHttpCode();
}
```

## Free API Access

Register at [yeb.to](https://yeb.to) with Google OAuth to get a free API key.

## Support

- Documentation: [docs.yeb.to](https://docs.yeb.to)
- Email: support@yeb.to
- Issues: [GitHub Issues](https://github.com/yebto/qrcode-api/issues)

## License

MIT - NETOX Ltd.
