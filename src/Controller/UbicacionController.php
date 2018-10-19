<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UbicacionController
 * @package App\Controller
 * @Route("/almacen/ubicacion")
 */
class UbicacionController extends AbstractController
{
    /**
     * @Route("/", name="lista_ubicacion")
     */
    public function index()
    {
        return $this->render('ubicacion/index.html.twig', [
            'controller_name' => 'UbicacionController',
        ]);
    }
}
