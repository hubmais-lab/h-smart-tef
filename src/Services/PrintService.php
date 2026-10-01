<?php
namespace Hubmais\HSmartTef\Services;

class PrintService extends BaseService
{
    function text(string $terminalId, string $message)
    {
        return $this->command(
            'print-text',
            $terminalId,
            [
                'message' => $message
            ]
        );
    }

    function image(string $terminalId, string $url)
    {
        return $this->command(
            'print-image',
            $terminalId,
            [
                'url' => $url
            ]
        );
    }
}