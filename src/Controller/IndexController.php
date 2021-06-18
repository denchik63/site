<?php

namespace App\Controller;

use App\Service\Data\Source\BalanceHistory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    private $balanceHistory;

    public function __construct(BalanceHistory $balanceHistory)
    {
        $this->balanceHistory = $balanceHistory;
    }

    public function index()
    {
        $userId = random_int(1, 20);

        return $this->render('index/index.html.twig', [
            'userId' => $userId,
            'balance' => $this->balanceHistory->getBalance($userId),
            'histories' => $this->balanceHistory->getHistory(60)->getHistories(),
        ]);
    }
}