<?php
namespace Hubmais\HSmartTef\Services;

use Hubmais\HClient\Client;

class Manager
{
    public function __construct(protected Client $client)
    {
    }
    

    public function transactions(): TransactionService
    {
        return new TransactionService($this->client);
    }

    public function print(): PrintService
    {
        return new PrintService($this->client);
    }

    public function notifictions(): NotificationService
    {
        return new NotificationService($this->client);
    }

    public function systems(): SystemService
    {
        return new SystemService($this->client);
    }

    public function requests(): RequestService
    {
        return new RequestService($this->client);
    }

    public function terminals(): TerminalService
    {
        return new TerminalService($this->client);
    }
}