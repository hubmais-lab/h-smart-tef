<?php
namespace Hubmais\HSmartTef\Services;

use Hubmais\HClient\Client;
use Hubmais\HSmartTef\Support\EndpointBuilder;

abstract class BaseService
{
    public function __construct(protected Client $client)
    {
    }

    private function getBasePath(): string
    {
        return EndpointBuilder::marketplacePath($this->client, 'terminals');
    }

    protected function command(string $action, string $terminalId, array $options = [])
    {
        return $this->client->post($this->getBasePath()."/terminals/{$terminalId}/command", [
            'action' => $action,
            'options' => $options
        ]);
    }
}