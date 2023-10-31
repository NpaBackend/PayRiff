<?php

namespace NPA\PayRiff;

use NPA\PayRiff\Contracts\CreateOrder;
use NPA\PayRiff\Traits\{
    SendRequest,
    CreateOrderHelper
};

class PayRiff implements CreateOrder
{
    use SendRequest;
    use CreateOrderHelper;

    /**
     * Merchant secret key
     *
     * @var string
     */
    protected string $secretKey;

    /**
     * Merchant number
     *
     * @var string
     */
    public string $merchant;

    /**
     * Base url
     *
     * @var string
     */
    public string $baseUrl = 'https://api.payriff.com/api/v1/';

    public const SUCCESS = "00000";
    public const WARNING = "01000";
    public const ERROR = "15000";
    public const INVALID_PARAMETERS = "15400";
    public const UNAUTHORIZED = "14010";
    public const TOKEN_NOT_PRESENT = "14013";
    public const INVALID_TOKEN = "14014";

    /**
     * Encryption token
     *
     * @var string
     */
    public string $encryptionToken;

    public function __construct()
    {
        $this->setEncryptionToken( time() . rand());
    }

    /**
     * Set the value of secret key
     *
     * @param string $secretKey
     * @return void
     */
    public function setSecretKey(string $secretKey): void
    {
        $this->secretKey = $secretKey;
    }

    /**
     * Set the value of merchant number
     *
     * @param string $merchant
     * @return void
     */
    public function setMerchantNo(string $merchant): void
    {
        $this->merchant = $merchant;
    }

    /**
     * Set the value of encryption token
     *
     * @param string $token
     * @return void
     */
    public function setEncryptionToken(string $token): void
    {
        $this->encryptionToken = $token;
    }

    /**
     * Get the value of secret key
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    /**
     * Get the value of merchant number
     * @return string
     */
    public function getMerchant(): string
    {
        return $this->merchant;
    }

    /**
     * Get the value of base url
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * Get the value of encryption token
     * @return string
     */
    public function getEncryptionToken(): string
    {
        return $this->encryptionToken;
    }

    /**
     * Get the value of authorization
     * @return string
     */
    public function getAuthorization(): string
    {
        return sha1($this->getSecretKey() . $this->getEncryptionToken());
    }
}
