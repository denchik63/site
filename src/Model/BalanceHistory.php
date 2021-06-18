<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;


class BalanceHistory
{
    /**
     * @var int
     *
     * @Serializer\Type("int")
     */
    private $id;

    /**
     * @var float

     * @Serializer\Type("float")
     */
    private $value;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     */
    private $balance;

    /**
     * @var int
     *
     * @Serializer\Type("int")
     * @Serializer\SerializedName("user_id")
     */
    private $userId;

    /**
     * @var \DateTime
     *
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("created_at")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(?float $value): void
    {
        $this->value = $value;
    }

    public function getBalance(): ?float
    {
        return $this->balance;
    }

    public function setBalance(?float $balance): void
    {
        $this->balance = $balance;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): void
    {
        $this->userId = $userId;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}