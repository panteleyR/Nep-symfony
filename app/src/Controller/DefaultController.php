<?php
namespace App\Controller;

use App\Entity\Contract;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function index()
    {
        $connection = $this->getDoctrine()->getConnection('catalog_223');
        //$result = $connection->fetchAll('SELECT price FROM contract');
        //print_r($result);
        //return new Response('Hello!');
        return $this->render('index.html.twig', [
            'name' => '2134',
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