<?php

namespace PostfinanceBundle\Service;

use AppBundle\Entity\Subscription;
use AppBundle\Entity\SubscriptionPlan;
use AppBundle\Entity\User;
use PostfinanceBundle\Factory\SubscriptionPlanDTOFactory;
use PostfinanceBundle\Builder\PostFinanceRequestBuilder;
use PostFinance\Ecommerce\EcommercePaymentRequest;
use PostFinance\FormGenerator\SimpleFormGenerator;
use PostFinance\FormGenerator\FormGenerator;
use Symfony\Component\Intl\Intl;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

class Gateway
{
    /**
     * @var RouterInterface
     */
    protected $router;

    /**
     * @var SubscriptionPlanDTOFactory
     */
    protected $subscriptionPlanDTOFactory;

    /**
     * @var PostFinanceRequestBuilder
     */
    protected $postFinanceRequestBuilder;

    /**
     * @param PostFinanceRequestBuilder  $postFinanceRequestBuilder
     * @param SubscriptionPlanDTOFactory $subscriptionPlanDTOFactory
     * @param RouterInterface            $router
     */
    public function __construct(
        PostFinanceRequestBuilder $postFinanceRequestBuilder,
        SubscriptionPlanDTOFactory $subscriptionPlanDTOFactory,
        RouterInterface $router
    ) {
        $this->postFinanceRequestBuilder = $postFinanceRequestBuilder;
        $this->subscriptionPlanDTOFactory = $subscriptionPlanDTOFactory;
        $this->router = $router;
        $this->regionBundle = Intl::getRegionBundle();
    }

    /**
     * @param Subscription $subscription
     * @param string $submitButtonTitle
     *
     * @return string
     */
    public function getFormHtml(Subscription $subscription, $submitButtonTitle = 'Submit')
    {
        $paymentRequest = $this->postFinanceRequestBuilder->build();

        $this->fillSubscriptionData($paymentRequest, $subscription);
        $this->fillUserData($paymentRequest, $subscription->getUser());
        $this->fillRoutingData($paymentRequest, $subscription->getId());

        $paymentRequest->validate();

        $formGenerator = $this->getFormGenerator();
        $formGenerator->setSubmitButtonTitle($submitButtonTitle);

        return $formGenerator->render($paymentRequest);
    }

    /**
     * @return FormGenerator
     */
    private function getFormGenerator()
    {
        return new SimpleFormGenerator();
    }

    /**
     * @param string $route
     * @param array  $parameters
     *
     * @return string
     */
    private function generateUrl($route, array $parameters)
    {
        return $this->router->generate($route, $parameters, UrlGeneratorInterface::ABSOLUTE_URL);
    }

    /**
     * @param EcommercePaymentRequest $paymentRequest
     * @param Subscription            $subscription
     */
    private function fillSubscriptionData(EcommercePaymentRequest $paymentRequest, Subscription $subscription)
    {
        $paymentRequest->setOrderid($subscription->getInvoiceNumber());

        $subscriptionPlanDTO = $this->subscriptionPlanDTOFactory->create($subscription->getSubscriptionPlan());
        $paymentRequest->setCurrency($subscriptionPlanDTO->getPaymentCurrency());
        $paymentRequest->setAmount($subscriptionPlanDTO->getTotalAmount()); // in cents
    }

    /**
     * @param EcommercePaymentRequest $paymentRequest
     * @param User                    $user
     */
    private function fillUserData(EcommercePaymentRequest $paymentRequest, User $user)
    {
        $paymentRequest->setEmail($user->getEmail());
        $paymentRequest->setOwnerZip($user->getZipCode());
        $paymentRequest->setOwnerTown($user->getCity());

        $countryCode = $this->getCountryCode($user->getCountry());
        if ($countryCode) {
            $paymentRequest->setOwnerCountry($countryCode);
        }
    }

    /**
     * get country code from users country.
     *
     * @see http://www.iso.org/iso/country_codes/iso_3166_code_lists/english_country_names_and_code_elements.htm
     *
     * @param string $country
     *
     * @return string|null
     */
    private function getCountryCode($country)
    {
        $countries = $this->regionBundle->getCountryNames();

        return array_search($country, $countries);
    }

    /**
     * @param EcommercePaymentRequest $paymentRequest
     * @param int                     $subscriptionId
     */
    private function fillRoutingData(EcommercePaymentRequest $paymentRequest, $subscriptionId)
    {
        $params = ['id' => $subscriptionId];
        $paymentRequest->setAccepturl(
            $this->generateUrl('subscription_payment_success', $params)
        );
        $paymentRequest->setDeclineurl(
            $this->generateUrl('subscription_payment_success', $params)
        );
        $paymentRequest->setExceptionurl(
            $this->generateUrl('subscription_payment_success', $params)
        );
        $paymentRequest->setCancelurl(
            $this->generateUrl('subscription_payment_success', $params)
        );
        $paymentRequest->setBackurl(
            $this->generateUrl('subscription_payment_pay', $params)
        );
    }
}
