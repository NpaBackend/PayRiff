<?php

namespace NPA\PayRiff\Contracts;

use NPA\PayRiff\Exceptions\RequestExceptionHandler;

interface CreateOrder
{
    /**
     * @param float|int $amount
     * @param string $currencyType
     * @param string $language
     * @param string|null $description
     * @param string|null $approveURL
     * @param string|null $cancelURL
     * @param string|null $declineURL
     *
     * @throws RequestExceptionHandler
     */
    public function createOrder(
        float|int $amount,
        string $currencyType = 'AZN',
        string $language = 'AZ',
        ?string $description = null,
        ?string $approveURL = null,
        ?string $cancelURL = null,
        ?string $declineURL = null
    ): string|bool;
}