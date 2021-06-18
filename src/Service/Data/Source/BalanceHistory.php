<?php

namespace App\Service\Data\Source;

use App\Model\BalanceHistories;
use App\Service\Api\Client;

class BalanceHistory
{
    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getBalance(int $userId): ?float
    {
        return $this->client->call('balance.userBalance', ['user' => ['id' => $userId]]);
    }

    public function getHistory(int $limit): BalanceHistories
    {
        return $this->client->call('balance.history', ['limit' => $limit], BalanceHistories::class);
    }
}