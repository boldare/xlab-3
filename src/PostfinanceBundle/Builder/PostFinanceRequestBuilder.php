<?php

namespace PostfinanceBundle\Builder;

use PostFinance\Passphrase;
use PostFinance\Ecommerce\EcommercePaymentRequest;
use PostFinance\ParameterFilter\ShaInParameterFilter;
use PostFinance\ShaComposer\AllParametersShaComposer;
use PostFinance\ShaComposer\ShaComposer;

class PostFinanceRequestBuilder
{
    /**
     * @var array
     */
    protected $postfinanceData;

    /**
     * @param array $postfinanceData
     */
    public function __construct(array $postfinanceData)
    {
        $this->postfinanceData = $postfinanceData;
    }

    /**
     * @return EcommercePaymentRequest
     */
    public function build()
    {
        $passphrase = $this->getPassphrase();
        $shaComposer = $this->getShaComposer($passphrase);
        $paymentRequest = $this->getPaymentRequest($shaComposer);

        if (false === $this->postfinanceData['sandbox']) {
            $paymentRequest->setPostFinanceUri(EcommercePaymentRequest::PRODUCTION);
        }

        $paymentRequest->setPspid($this->postfinanceData['pspid']);

        return $paymentRequest;
    }

    /**
     * @return Passphrase
     */
    private function getPassphrase()
    {
        return new Passphrase($this->postfinanceData['shasign']);
    }

    /**
     * @param Passphrase $passphrase
     *
     * @return AllParametersShaComposer
     */
    private function getShaComposer(Passphrase $passphrase)
    {
        $shaComposer = new AllParametersShaComposer($passphrase);
        $shaComposer->addParameterFilter($this->getParameterFilter());

        return $shaComposer;
    }

    /**
     * @return ParameterFilter
     */
    private function getParameterFilter()
    {
        return new ShaInParameterFilter();
    }

    /**
     * @param ShaComposer $shaComposer
     *
     * @return EcommercePaymentRequest
     */
    private function getPaymentRequest(ShaComposer $shaComposer)
    {
        return new EcommercePaymentRequest($shaComposer);
    }
}
