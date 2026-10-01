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

Depois é necessário configurar o arquivo de configuração, presente em config/h-client.php com as credenciais fornecidas.

***

# Inicializando sem Facade

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

# Listando terminais

```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

$response = HSmartTef::terminals()->list();

foreach($reponse['data'] as $terminal)
{
    ...
}
```

<br>

# Vendas

## Criando venda PIX

```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

$transaction = HSmartTef::transactions()->charge(
    $terminal['id'],
    amount: '100.00',
    paymentType: 'pix'
);
```

## Criando venda no Cartão

```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

$transaction = HSmartTef::transactions()->charge(
    $terminal['id'],
    amount: '100.00',
    paymentType: 'card', 
    paymentTax: 'buyer', # buyer ou seller
    intallments: 2,
    brand: 'Visa',
    requestId: '123'
);
```
<br>

# Opções de gerenciamento

## Desligar terminal

```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

HSmartTef::system()->shutdown();
```

## Reiniciar terminal

```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

HSmartTef::system()->reboot();
```

## Resetar senha administrativa

```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

HSmartTef::system()->adminPassordReset();
```

## Atualizar tabelas

```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

HSmartTef::system()->syncTable();
```
<br>

# Enviar notificação

```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

HSmartTef::notifications()->send($terminal['id'], 'Atenção', 'Atualizaremos seu terminal em alguns instantes.');
```

<br>

# Requisitando dados

## Requisitar CPF/CNPJ
```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

HSmartTef::requests()->doc($terminal['id']);
```

## Requisitar Celular
```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

HSmartTef::requests()->phone($terminal['id']);
```

## Requisitar IP
```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

HSmartTef::requests()->ip($terminal['id']);
```

## Requisitar Serial
```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

HSmartTef::requests()->serial($terminal['id']);
```

## Requisitar Versão do App
```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

HSmartTef::requests()->appVersion($terminal['id']);
```

## Requisitar com Opções
```php
<?php

use Hubmais\HSmartTef\Facades\HSmartTef;

HSmartTef::requests()->options(
    $terminal['id'],
    'Deseja CPF na nota?',
    [
        '1:Sim',
        '0:Não',
    ]
);
```