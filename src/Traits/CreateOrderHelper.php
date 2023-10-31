<?php

namespace NPA\PayRiff\Traits;

use NPA\PayRiff\Exceptions\RequestExceptionHandler;

trait CreateOrderHelper
{
    public ?string $sessionId;
    public ?string $transactionId;

    /**
     * @throws RequestExceptionHandler
     */
    public function createOrder(
        float|int $amount,
        string    $currencyType = 'AZN',
        string    $language = 'AZ',
        ?string   $description = null,
        ?string   $approveURL = null,
        ?string   $cancelURL = null,
        ?string   $declineURL = null
    ): array|bool
    {
        $response = $this->sendRequest('createOrder', [
            "amount" => $amount,
            "approveURL" => $approveURL,
            "cancelURL" => $cancelURL,
            "currencyType" => $currencyType,
            "declineURL" => $declineURL,
            "description" => $description,
            "language" => $language
        ]);

        if ($response['code'] == $this::SUCCESS) {

            $this->setSessionId($response['payload']['sessionId']);
            $this->setTransactionId($response['payload']['transactionId']);

            return $response['payload']['paymentUrl'];
        }

        return false;
    }

    private function setTransactionId($transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    private function setSessionId($sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }
}