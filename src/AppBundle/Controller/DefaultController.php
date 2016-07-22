<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Subscription;
use AppBundle\Entity\SubscriptionPlan;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="subscription_payment_pay")
     */
    public function payAction()
    {
        $subscriptionPlan = new SubscriptionPlan();
        $subscriptionPlan->setMonthlyPrice(100);
        $subscriptionPlan->setYearsDuration(1);

        $user = new User();
        $user->setEmail('test@test.pl');

        $subscription = new Subscription();

        $subscription->setInvoiceNumber(uniqid());
        $subscription->setUser($user);
        $subscription->setSubscriptionPlan($subscriptionPlan);

        $postfinanceGateway = $this->get('postfinance.gateway');
        $formHtml = $postfinanceGateway->getFormHtml(
            $subscription,
            $this->get('translator')->trans('payment.pay.buttons.submit', [], 'forms')
        );

        return $this->render('default/index.html.twig', [
            'postfinanceFormHtml' => $formHtml,
        ]);
    }

    /**
     * @Route("/payment_success", name="subscription_payment_success")
     */
    public function paymentSuccessAction()
    {
    }
}
