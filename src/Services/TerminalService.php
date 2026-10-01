<?php
namespace Hubmais\HSmartTef\Services;

use Hubmais\HSmartTef\Support\EndpointBuilder;

class TerminalService extends BaseService
{
    protected function getBasePathSeller(string $sellerId): string
    {
        return EndpointBuilder::marketplaceSellerPath($this->client, 'terminals', $sellerId);
    }
    
    function list(
        string $sellerId,
        int $page = 1,
        int $limit = 12,
        ?string $search = null,
        ?bool $smart = null
    )
    {
        return $this->client->get($this->getBasePathSeller($sellerId), array_filter(compact('page','limit', 'search', 'smart')));
    }
}