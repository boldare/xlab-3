<?php

namespace PostfinanceBundle\Service;

use PostFinance\Passphrase;
use PostFinance\Ecommerce\EcommercePaymentResponse;
use PostFinance\ParameterFilter\ShaOutParameterFilter;
use PostFinance\ShaComposer\AllParametersShaComposer;
use Symfony\Component\HttpFoundation\Request;

class GatewayValidator
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
     * @param Request $request
     *
     * @return bool
     */
    public function isValid(Request $request)
    {
        $passphrase = $this->getPassphrase();
        $shaComposer = $this->getShaComposer($passphrase);

        $ecommercePaymentResponse = $this->getPaymentResponse($request->query->all());

        return $ecommercePaymentResponse->isValid($shaComposer) && $ecommercePaymentResponse->isSuccessful();
    }

    /**
     * @return Passphrase
     */
    private function getPassphrase()
    {
        return new Passphrase($this->postfinanceData['shaout']);
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
        return new ShaOutParameterFilter();
    }

    /**
     * @param array $paymentResponse
     *
     * @return EcommercePaymentResponse
     */
    private function getPaymentResponse(array $paymentResponse)
    {
        return new EcommercePaymentResponse($paymentResponse);
    }

    /**
     * @return FormGenerator
     */
    private function getFormGenerator()
    {
        return new SimpleFormGenerator();
    }
}
