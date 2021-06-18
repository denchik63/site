<?php

namespace App\Service\Api;

use App\Exception\RpcErrorException;
use JMS\Serializer\SerializerInterface;

class Client
{
    private const DEFAULT_ID = 1;

    /** @var \Graze\GuzzleHttp\JsonRpc\Client */
    private $client;

    /** @var SerializerInterface */
    private $serializer;

    public function __construct(string $uri, SerializerInterface $serializer)
    {
        $this->client = \Graze\GuzzleHttp\JsonRpc\Client::factory($uri);
        $this->serializer = $serializer;
    }

    public function call(string $method, $data, ?string $class = null, int $id = self::DEFAULT_ID)
    {
        $request = $this->client->request($id, $method, $data);
        $response = $this->client->send($request);

        if ($response->getRpcErrorCode()) {
            throw new RpcErrorException($response);
        }

        if ($id !== $response->getRpcId()) {
            throw new \RuntimeException(sprintf('Invalid response id "%s", "%s" provided', $response->getRpcId(), $id));
        }

        if (null !== $class) {
            return $this->serializer->deserialize($response->getBody(), $class, 'json');
        }

        return $response->getRpcResult();
    }
}