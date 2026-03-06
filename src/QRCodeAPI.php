<?php

namespace Yebto\QRCodeAPI;

use Yebto\ApiClient\YebtoClient;

class QRCodeAPI extends YebtoClient
{
    protected function module(): string
    {
        return 'qr-code';
    }

    protected function defaults(): array
    {
        return [
            'base_url' => 'https://api.yeb.to/v1',
            'key'      => null,
            'curl'     => [
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
                CURLOPT_USERAGENT      => 'yebto-qrcode-api-php',
            ],
        ];
    }

    /**
     * Generate a QR code image
     */
    public function generate(string $data, array $extra = []): array
    {
        return $this->post('generate', array_merge(compact('data'), $extra));
    }

    /**
     * Generate a dynamic QR experience (text, url, vcard_plus, pdf, social, images, app, videos, event, mp3, coupon, feedback, rating)
     */
    public function generateExperience(string $type, array $data, array $extra = []): array
    {
        $payload = array_merge(['data' => $data], $extra);
        return $this->post('generate/' . $type, $payload);
    }
}
