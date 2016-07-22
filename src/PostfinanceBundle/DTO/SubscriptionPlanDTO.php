<?php

namespace PostfinanceBundle\DTO;

use AppBundle\Entity\SubscriptionPlan;

class SubscriptionPlanDTO
{
    /**
     * @var SubscriptionPlan
     */
    private $subscriptionPlan;

    /**
     * @var string
     */
    private $paymentCurrency;

    /**
     * @var float
     */
    private $vatRate;

    /**
     * @param SubscriptionPlan $subscriptionPlan
     * @param sting            $paymentCurrency
     * @param float            $vatRate
     */
    public function __construct(
        SubscriptionPlan $subscriptionPlan,
        $paymentCurrency,
        $vatRate
    ) {
        $this->subscriptionPlan = $subscriptionPlan;
        $this->paymentCurrency = $paymentCurrency;
        $this->vatRate = $vatRate;
    }

    /**
     * @return string
     */
    public function getPaymentCurrency()
    {
        return $this->paymentCurrency;
    }

    /**
     * @return float
     */
    public function getVatRate()
    {
        return $this->vatRate;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->subscriptionPlan->getName();
    }

    /**
     * @return int
     */
    public function getMonthlyPrice()
    {
        return $this->subscriptionPlan->getMonthlyPrice();
    }

    /**
     * @return int
     */
    public function getTotalPerYear()
    {
        return $this->getMonthlyPrice() * 12;
    }

    /**
     * @return int
     */
    public function getTotalHT()
    {
        return $this->getTotalPerYear() * $this->subscriptionPlan->getYearsDuration();
    }

    /**
     * @return int
     */
    public function getTotalVat()
    {
        return (int) round($this->getTotalHT() * $this->vatRate);
    }

    /**
     * @return int
     */
    public function getTotalAmount()
    {
        return $this->getTotalHT() + $this->getTotalVat();
    }
}
