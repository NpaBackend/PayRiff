<?php

namespace NPA\PayRiff\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use NPA\PayRiff\Exceptions\RequestExceptionHandler;

trait SendRequest
{
    /**
     * @throws RequestExceptionHandler
     */
    public function sendRequest($method, $body): array
    {
        try {
            $response =  $this->client()->post($method, [
                'body' => json_encode([
                    'body' => $body,
                    'encryptionToken' => $this->getEncryptionToken(),
                    'merchant' => $this->getMerchant(),
                ])
            ]);

            return json_decode($response->getBody()->getContents(), true);
        }catch (GuzzleException $exception){
            throw new RequestExceptionHandler($exception->getMessage());
        }
    }

    public function client(): Client
    {
        return new Client([
            'base_uri' => $this->getBaseUrl(),
            'headers'  => [
                'content-type' => 'application/json',
                'Authorization' => $this->getAuthorization(),
            ],
        ]);
    }
}