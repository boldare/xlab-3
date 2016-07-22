<?php

namespace Tests\PostfinanceBundle\Service;

use AppBundle\Entity\Subscription;
use AppBundle\Entity\SubscriptionPlan;
use AppBundle\Entity\User;
use PostFinance\Ecommerce\EcommercePaymentRequest;
use PostfinanceBundle\Builder\PostFinanceRequestBuilder;
use PostfinanceBundle\DTO\SubscriptionPlanDTO;
use PostfinanceBundle\Factory\SubscriptionPlanDTOFactory;
use PostfinanceBundle\Service\Gateway;
use Symfony\Component\Routing\RouterInterface;

class GatewayTest extends \PHPUnit_Framework_TestCase
{
    private $gateway;

    public function setUp()
    {
        $paymentRequest = $this
            ->getMockBuilder(EcommercePaymentRequest::class)
            ->disableOriginalConstructor()
            ->getMock();

        $paymentRequest->expects($this->once())
            ->method('toArray')
            ->will($this->returnValue([]));

        $postFinanceRequestBuilder = $this
            ->getMockBuilder(PostFinanceRequestBuilder::class)
            ->disableOriginalConstructor()
            ->getMock();
        $postFinanceRequestBuilder->expects($this->once())
            ->method('build')
            ->will($this->returnValue($paymentRequest));

        $subscriptionPlanDTO = $this
            ->getMockBuilder(SubscriptionPlanDTO::class)
            ->disableOriginalConstructor()
            ->getMock();

        $subscriptionPlanDTO->expects($this->once())
            ->method('getPaymentCurrency')
            ->will($this->returnValue('CHF'));

        $subscriptionPlanDTO->expects($this->once())
            ->method('getTotalAmount')
            ->will($this->returnValue(100));

        $subscriptionPlanDTOFactory = $this
            ->getMockBuilder(SubscriptionPlanDTOFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $subscriptionPlanDTOFactory->expects($this->once())
            ->method('create')
            ->will($this->returnValue($subscriptionPlanDTO));

        $router = $this
            ->getMockBuilder(RouterInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->gateway = new Gateway(
            $postFinanceRequestBuilder,
            $subscriptionPlanDTOFactory,
            $router
        );
    }

    public function testGetFormHtml()
    {
        $user = new User();
        $subscriptionPlan = new SubscriptionPlan();
        $subscription = new Subscription();

        $subscription->setUser($user);
        $subscription->setSubscriptionPlan($subscriptionPlan);

        $this->assertContains('type="submit" value="TEST"', $this->gateway->getFormHtml($subscription, 'TEST'));
    }
}
