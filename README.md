# H+Http Client Api PHP

Esse plugin foi construído em PHP para a realização de ações na SmartPOS como um TEF via API Hubmais.
Aqui vamos mostrar como é facil a instalação e utilização.

## Requisitos

* php (versão 7.2 ou >=8.1)
* composer (mais recente)


## Instalação

O plugin pode ser adicionado a seu projeto com o comando abaixo:

```shell
composer require hubmais/h-smart-tef
```

## Laravel

Esse plugin pode ser usado em Laravel, a partir da versão 10.
Após a instalação é necessário executar o comando abaixo:

```shell
php artisan vendor:publish --provider="Hubmais\HSmartTef\Providers\HSmartTefServiceProvider"
```

Depois é necessário configurar o arquivo de configuração, presente em config/h-checkout.php com as credenciais fornecidas.

***

# Exemplos de uso

## Inicializando sem Facade

```php
<?php

use Hubmais\HClient\Client;
use Hubmais\HSmartTef\Services\Manager as HSmartTefManager;

$client = new Client('<endpoint>');
$client->setMarketplaceId('');
$client->setSellerId('');
$client->setToken('');

$HSmartTef = new HSmartTefManager($client);

```

## Criando venda PIX

```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

$transaction = HSmartTef::transactions()->charge(
    $terminal->id,
    amount: '100.00',
    paymentType: 'pix'
);
```

## Criando venda no Cartão

```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

$transaction = HSmartTef::transactions()->charge(
    $terminal->id,
    amount: '100.00',
    paymentType: 'card', 
    paymentTax: 'buyer', # buyer ou seller
    intallments: 2,
    brand: 'Visa',
    requestId: '123'
);
```