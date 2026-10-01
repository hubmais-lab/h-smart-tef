<?php
namespace Hubmais\HSmartTef\Services;

class NotificationService extends BaseService
{
    function send(string $terminalId, string $title, string $message)
    {
        return $this->command(
            'notification',
            $terminalId,
            [
                'title' => $title,
                'message' => $message,
            ]
        );
    }
}