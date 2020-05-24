<?php
namespace App\Controller\Catalog;

use App\Entity\Contract;
use App\Service\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use \Memcached;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\MemcachedSessionHandler;

use Zend\Stdlib\ArrayObject;

class ProcedureController extends AbstractController
{
    public function index(string $tab, Auth $user, Session $session)
    {
        print_r($user->user());
//$session->start();
//print_r("<br>");
//        print_r($session->getId());
//        print_r($_SESSION);
//        //$session->start();
//      $session->set('attribute-name', 5678);
//        //$_SESSION = [];
//        print_r($session->all());
       // print_r($session->all());
//        $cache = new \Memcached();
//        $cache->addServer('sectionksmemcachedhost', '11211');
//        $keys = $cache->getAllKeys();
//        $cache->getDelayed($keys);
//        $store = $cache->fetchAll();
//        print_r("<pre>");
//        print_r($store);
//        print_r("</pre>");
//        //print_r($asd->fetchAll());
//        exit;
        //$connection = $this->getDoctrine()->getConnection('catalog_223');
        //$result = $connection->fetchAll('SELECT price FROM contract');
        //print_r($result);
        //return new Response('Hello!');

        $contracts = $this->getDoctrine()
            ->getRepository(Contract::class, 'catalog_223')
            ->findBy([], null, 20);

        return $this->render('index.html.twig', [
            'name' => $tab,
            'contracts' => $contracts
        ]);
    }

    public function show()
    {
        $contract = $this->getDoctrine()
            ->getRepository(Contract::class, 'catalog_223')
            ->find(4);

        if (!$contract) {
            throw $this->createNotFoundException(
                'No product found for id '. 4
            );
        }

        return new Response('Check out this great product: '.$contract->getPrice());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

    public function createProduct(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }
}