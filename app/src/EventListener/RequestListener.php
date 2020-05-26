<?php
namespace App\EventListener;

use App\Service\Auth;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Zend\Stdlib\ArrayObject;

class RequestListener
{
    private ?Auth $user;

    private ?ContainerInterface $container;

    public function __construct(Auth $user, ContainerInterface $container)
    {
        $this->user = $user;
        $this->container = $container;

    }

    public function authInit()
    {
        //вытаскиваем сессию с zend
        if(isset($_SESSION['activeUserData']) && $_SESSION['activeUserData'] instanceof ArrayObject) {
            $this->user->extractDataFromJson($_SESSION['activeUserData']->data);
        }
    }

    public function onKernelRequest(RequestEvent $event)
    {
        if (!$event->isMasterRequest()) {
            // don't do anything if it's not the master request
            return;
        }

        $session = $this->container->get('session');
        $session->start();
        $this->authInit();
    }
}