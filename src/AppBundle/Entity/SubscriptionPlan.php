<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class SubscriptionPlan
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $monthlyPrice;

    /**
     * @var int
     */
    private $yearsDuration;

    /**
     * @var int
     */
    private $freeDaysNumber;

    /**
     * @var Collection|Subscription[]
     */
    private $subscriptions;

    /**
     * @var Collection|SubscriptionPlanTranslation[]
     */
    private $translations;

    /**
     * @var Collection|VoucherCard[]
     */
    private $voucherCards;

    public function __construct()
    {
        $this->subscriptions = new ArrayCollection();
        $this->translations = new ArrayCollection();
        $this->voucherCards = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return SubscriptionPlan
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param int $monthlyPrice
     *
     * @return SubscriptionPlan
     */
    public function setMonthlyPrice($monthlyPrice)
    {
        $this->monthlyPrice = $monthlyPrice;

        return $this;
    }

    /**
     * @return int
     */
    public function getMonthlyPrice()
    {
        return $this->monthlyPrice;
    }

    /**
     * @param int $yearsDuration
     *
     * @return SubscriptionPlan
     */
    public function setYearsDuration($yearsDuration)
    {
        $this->yearsDuration = $yearsDuration;

        return $this;
    }

    /**
     * @return int
     */
    public function getYearsDuration()
    {
        return $this->yearsDuration;
    }

    /**
     * @return int
     */
    public function getFreeDaysNumber()
    {
        return $this->freeDaysNumber;
    }

    /**
     * @param int $freeDaysNumber
     *
     * @return SubscriptionPlan
     */
    public function setFreeDaysNumber($freeDaysNumber)
    {
        $this->freeDaysNumber = $freeDaysNumber;

        return $this;
    }

    /**
     * @param Subscription $subscription
     *
     * @return Company
     */
    public function addSubscription(Subscription $subscription)
    {
        $this->subscriptions[] = $subscription;

        return $this;
    }

    /**
     * @param Subscription $subscription
     */
    public function removeSubscription(Subscription $subscription)
    {
        $this->subscriptions->removeElement($subscription);
    }

    /**
     * @return Collection|Subscription[]
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * @param VoucherCard $voucherCard
     *
     * @return Company
     */
    public function addVoucherCard(VoucherCard $voucherCard)
    {
        $this->voucherCards[] = $voucherCard;

        return $this;
    }

    /**
     * @param VoucherCard $voucherCard
     */
    public function removeVoucherCard(VoucherCard $voucherCard)
    {
        $this->voucherCards->removeElement($voucherCard);
    }

    /**
     * @return Collection|VoucherCard[]
     */
    public function getVoucherCards()
    {
        return $this->voucherCards;
    }

    /**
     * @return Collection|SubscriptionPlanTranslation[]
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * @param SubscriptionPlanTranslation $subscriptionPlanTranslation
     */
    public function addTranslation(SubscriptionPlanTranslation $subscriptionPlanTranslation)
    {
        if (!$this->translations->contains($subscriptionPlanTranslation)) {
            $this->translations[] = $subscriptionPlanTranslation;
            $subscriptionPlanTranslation->setObject($this);
        }
    }
}
