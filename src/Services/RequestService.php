<?php
namespace Hubmais\HSmartTef\Services;

class RequestService extends BaseService
{
    function doc(string $terminalId)
    {
        return $this->command(
            'request-doc',
            $terminalId,
        );
    }

    function phone(string $terminalId)
    {
        return $this->command(
            'request-phone',
            $terminalId,
        );
    }

    function ip(string $terminalId)
    {
        return $this->command(
            'request-ip',
            $terminalId,
        );
    }

    function serial(string $terminalId)
    {
        return $this->command(
            'request-serial',
            $terminalId,
        );
    }

    function appVersion(string $terminalId)
    {
        return $this->command(
            'request-app-version',
            $terminalId,
        );
    }

    /**
     * Abre uma janela no terminal para o usuario selecionar uma das opções
     * 
     * @param string $message Mensagem para a apresentação da opção, ex: 'Deseja informar seu CPF?'
     * @param array<string> $options Opções dinâmicas, ex: ['1:Sim','0:Não']
     */
    function options(string $terminalId, string $message, array $options)
    {
        return $this->command(
            'request-options',
            $terminalId,
            [
                'message' => $message,
                'options' => $options
            ]
        );
    }
}