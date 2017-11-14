<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use AppBundle\Entity\Product;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $allItems = false;

        $repository = $this->getDoctrine()->getRepository(Product::class);

        $allItems = $repository->findAll();

        if (!$allItems) throw new HttpException(400, "No items found");


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'allItems' => $allItems
        ]);
    }
}
