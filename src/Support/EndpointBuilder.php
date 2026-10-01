<?php

declare(strict_types=1);

namespace Hubmais\HSmartTef\Support;

use Hubmais\HClient\Client;
use Hubmais\HClient\Exceptions\ClientException;

class EndpointBuilder
{
    public static function marketplacePath(
        Client $client,
        string $resource
    ): string
    {
        if (empty($client->marketplaceId))
            throw new ClientException('Marketplace ID is not configured.', 400);

        $resource = ltrim($resource, '/');

        return "/v1/marketplaces/{$client->marketplaceId}/{$resource}";
    }
}