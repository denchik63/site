<?php

namespace App\Exception;

use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use Throwable;

class RpcErrorException extends \Exception
{
    public function __construct(ResponseInterface $response, Throwable $previous = null)
    {
        parent::__construct((string)$response->getRpcErrorData(), $response->getRpcErrorCode(), $previous);
    }
}