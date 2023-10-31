# PROJECTS OF AZERBAIJAN

Azerbaijan PayRiff payment gateway for the Laravel framework.

## Installation

Use the [composer](https://getcomposer.org/download/) to install npa/payriff.

```bash
composer require npa/payriff
```

Use the [composer](https://getcomposer.org/download/) to update npa/payriff.

```bash
composer update npa/payriff
```

## Usage/Examples

```php
use NPA\PayRiff;
use Illuminate\Support\Str;

$payRiff = new PayRiff();

$payRiff->setEncryptionToken(time() . Str::uuid());
$payRiff->setMerchantNo('merchant');
$payRiff->setSecretKey('secret');

$response = $payRiff->createOrder(amount:1, description:'New order');
```

## Authors

- [Projects of Azerbaiijan](https://npa.az/)
- [@JavaDLE](https://t.me/HJavaDle)

## License

[MIT](https://choosealicense.com/licenses/mit/)# PROJECTS OF AZERBAIJAN

