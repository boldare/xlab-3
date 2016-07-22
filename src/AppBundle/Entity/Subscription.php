<?php

namespace AppBundle\Entity;

class Subscription
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
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTimeInterface
     */
    private $created;

    /**
     * @var \DateTimeInterface|null
     */
    private $paymentDate;

    /**
     * @var string|null
     */
    private $invoiceNumber;

    /**
     * @var User
     */
    private $user;

    /**
     * @var Company
     */
    private $company;

    /**
     * @var VoucherCard
     */
    private $voucherCard;

    /**
     * @var SubscriptionPlan
     */
    private $subscriptionPlan;

    public function __construct()
    {
        $this->created = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     *
     * @return Subscription
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $address
     *
     * @return Subscription
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $zip
     *
     * @return Subscription
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $city
     *
     * @return Subscription
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $country
     *
     * @return Subscription
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $status
     *
     * @return Subscription
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @return string|null
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @param string|null $invoiceNumber
     *
     * @return Subscription
     */
    public function setInvoiceNumber($invoiceNumber = null)
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return Subscription
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     *
     * @return Subscription
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return SubscriptionPlan
     */
    public function getSubscriptionPlan()
    {
        return $this->subscriptionPlan;
    }

    /**
     * @param SubscriptionPlan $subscriptionPlan
     *
     * @return Subscription
     */
    public function setSubscriptionPlan(SubscriptionPlan $subscriptionPlan)
    {
        $this->subscriptionPlan = $subscriptionPlan;

        return $this;
    }

    /**
     * @return VoucherCard|null
     */
    public function getVoucherCard()
    {
        return $this->voucherCard;
    }

    /**
     * @param VoucherCard|null $voucherCard
     *
     * @return Subscription
     */
    public function setVoucherCard(VoucherCard $voucherCard = null)
    {
        $this->voucherCard = $voucherCard;

        if ($voucherCard instanceof VoucherCard) {
            $voucherCard->setSubscription($this);
            $this->setSubscriptionPlan($voucherCard->getSubscriptionPlan());
        }

        return $this;
    }
}
