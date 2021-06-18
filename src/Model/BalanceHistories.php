<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class BalanceHistories
{
    /**
     * @var array
     *
     * @Serializer\Type("array<App\Model\BalanceHistory>")
     * @Serializer\SerializedName("result")
     */
    private $histories = [];

    /**
     * @return array
     */
    public function getHistories(): ?array
    {
        return $this->histories;
    }

    /**
     * @param array $histories
     */
    public function setHistories(?array $histories): void
    {
        $this->histories = $histories;
    }
}