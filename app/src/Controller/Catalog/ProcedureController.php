<?php
namespace App\Controller\Catalog;

use App\Entity\Procedure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProcedureController extends AbstractController
{
    public function index(string $tab, Request $request)
    {
        $limit = $request->query->get('limit') ?? 10;
        $order = $request->query->get('order') ?? null;

        if ($order) {
            $dir = $request->query->get('dir') ?? 'ASC';
            $order = [$order => $dir];
        }

        $procedures = $this->getDoctrine()
            ->getRepository(Procedure::class, 'catalog_223')
            ->findBy([], $order, $limit);

        $proceduresCount = $this->getDoctrine()->getRepository(Procedure::class, 'catalog_223');
        $proceduresCount = $proceduresCount->createQueryBuilder('a')
            ->select('count(a.id)')
            ->getQuery()
            ->getSingleScalarResult();


        if($request->getMethod() === 'POST') {
            return $this->render('procedure/catalog.html.twig', [
                'tab' => $tab,
                'countProcedure' => $proceduresCount ?? 0,
                'limit' => $request->query->get('limit'),
                'order' => $request->query->get('order'),
                'dir' => $request->query->get('dir'),
                'procedures' => $procedures,
            ]);
        }

        return $this->render('procedure/layout.html.twig', [
            'tab' => $tab,
            'countProcedure' => $proceduresCount ?? 0,
            'limit' => $request->query->get('limit'),
            'order' => $request->query->get('order'),
            'dir' => $request->query->get('dir'),
            'procedures' => $procedures,
        ]);
    }
}