<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AlmacenController extends AbstractController
{
    /**
     * @Route("/almacen", name="almacen")
     */
    public function index()
    {
        return $this->render('almacen/index.html.twig', [
            'controller_name' => 'AlmacenController',
        ]);
    }
}
