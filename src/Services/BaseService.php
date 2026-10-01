<?php
namespace Hubmais\HSmartTef\Services;

use Hubmais\HClient\Client;
use Hubmais\HSmartTef\Support\EndpointBuilder;

abstract class BaseService
{
    public function __construct(protected Client $client)
    {
    }

    protected function command(string $action, string $terminalId, array $options = [])
    {
        return $this->client->post(EndpointBuilder::marketplacePath($this->client, 'terminals')."/{$terminalId}/command", [
            'action' => $action,
            'options' => $options
        ]);
    }
}