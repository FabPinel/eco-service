<?php

namespace App\Services;

use App\Http\Controllers\OrderController;

class ReviewService
{
    public function sendReviewRequest($orderId)
    {
        $shopController = new OrderController();
        $shopController->sendReviewRequest($orderId);
    }
}
