<?php
namespace Hubmais\HSmartTef\Services;

class SystemService extends BaseService
{
    function reboot(string $terminalId)
    {
        return $this->command(
            'reboot',
            $terminalId,
        );
    }

    function shutdown(string $terminalId)
    {
        return $this->command(
            'shutdown',
            $terminalId,
        );
    }

    function adminPassordReset(string $terminalId)
    {
        return $this->command(
            'admin-password-reset',
            $terminalId,
        );
    }

    function syncTable(string $terminalId)
    {
        return $this->command(
            'sync-table',
            $terminalId,
        );
    }

    function authRevoke(string $terminalId)
    {
        return $this->command(
            'auth-revoke',
            $terminalId,
        );
    }

    function authUpdate(string $terminalId)
    {
        return $this->command(
            'auth-update',
            $terminalId,
        );
    }
}