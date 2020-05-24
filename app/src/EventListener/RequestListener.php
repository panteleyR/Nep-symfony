<?php
namespace App\EventListener;

use App\Service\Auth;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpFoundation\Session\Attribute\NamespacedAttributeBag;
use Symfony\Component\DependencyInjection\ContainerInterface;
use \Memcached as Memcached;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;
use Zend\Stdlib\ArrayObject;

class RequestListener
{
    private ?Auth $user;

    private ?Memcached $memcached;
    private ?ContainerInterface $container;

    public function __construct(Auth $user, ContainerInterface $container)
    {
        $this->user = $user;
//        $this->memcached = $memcached;
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
//        $session->set('attribute-name', 5678);
//        print_r($_SESSION);
//                print_r($session->getId());
//                print_r("<pre>");
//        print_r(\json_decode($_SESSION['activeUserData']->data));
//        print_r("</pre>");
        $this->authInit();
//        $session = $event->getRequest()->getSession();
//
//        $session->start();
//        //$session->start();
//        print_r($session->getId());
//        //$session->set('attribute-name', 5678);
//        //$_SESSION = [];
//        print_r($_SESSION);
       // print_r($this->session->getId());
        //$this->session->start();
//        $session = $event->getRequest()->getSession();
//        $session->start();
        //print_r($session->getId());

//        exit;
//        //$memcached = $this->memcached;
////        $memcached = $this->container;
////        $session->start();
//        if (session_status() == PHP_SESSION_NONE) {
//            session_start();
//        }
//        $memcached = new \Memcached();
//        $memcached->addServer('sectionksmemcachedhost', '11211');
//        $key = "sectionks.sess." . session_id();
//        $data = $memcached->get($key);
//        //$keys = $memcached->getAllKeys();
//        print_r($key);
//        //print_r($keys);
//        $memcached->getDelayed([$key]);
//        $data = $memcached->fetch();
//        //$data = $memcached->;
//        print_r("<pre>");
//        print_r(unserialize(serialize($data)));
//        print_r("</pre>");
//        exit;
//        $bag = null;
    //   $session = $event->getRequest()->getSession();
//        //$session->registerBag($bag);
//        $session->start();


//
//        try
//        {
//            $bag = $session->getBag('zf');
//        }
//        catch (\InvalidArgumentException $e)
//        {
//            $bag = new NamespacedAttributeBag("__ZF");
//            $bag->setName("zf");
//            $session->registerBag($bag);
//
//            $session->start();
//        }
//        $bag->set('userId', isset($_SESSION['Zend_Auth']->storage) ? $_SESSION['Zend_Auth']->storage : null);

//        print_r("<pre>");
        //print_r($session->getBag('zf'));

        //$bag = new NamespacedAttributeBag("__ZF");
        //print_r($bag->get('_REQUEST_ACCESS_TIME'));
        //print_r($session->all());
        //print_r($bag->_REQUEST_ACCESS_TIME);
  //      print_r($_SESSION);
//        print_r("</pre>");
        // You get the exception object from the received event
//        print_r("Твоя сука настолько тупая");
    }
}