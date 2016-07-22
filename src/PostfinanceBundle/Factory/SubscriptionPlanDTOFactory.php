<?php

namespace PostfinanceBundle\Factory;

use AppBundle\Entity\SubscriptionPlan;
use PostfinanceBundle\DTO\SubscriptionPlanDTO;

class SubscriptionPlanDTOFactory
{
    /**
     * @var string
     */
    protected $subscriptionDefaultCurrency;

    /**
     * @var string
     */
    protected $subscriptionVatRate;

    /**
     * @param string $subscriptionDefaultCurrency
     * @param float  $subscriptionVatRate
     */
    public function __construct(
        $subscriptionDefaultCurrency,
        $subscriptionVatRate
    ) {
        $this->subscriptionDefaultCurrency = $subscriptionDefaultCurrency;
        $this->subscriptionVatRate = $subscriptionVatRate;
    }

    /**
     * @param SubscriptionPlan $subscriptionPlan
     *
     * @return SubscriptionPlanDTO
     */
    public function create(SubscriptionPlan $subscriptionPlan)
    {
        return new SubscriptionPlanDTO(
            $subscriptionPlan,
            $this->subscriptionDefaultCurrency,
            $this->subscriptionVatRate
        );
    }
}
