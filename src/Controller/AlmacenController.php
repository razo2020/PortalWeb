<?php

namespace App\Controller;

use App\Repository\AlmacenRepository;
use App\Repository\EmpresaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AlmacenController extends AbstractController
{
    /**
     * @Route("/almacen", name="lista_almacenes")
     */
    public function index(string $ruc, AlmacenRepository $almacenes, EmpresaRepository $empresas)
    {
        $empresa = $empresas->find($ruc);
        $empresaAlmacenes = $almacenes->findOneBy(['empresaRuc' => $empresa]);
        return $this->render('almacen/index.html.twig', [
            'almacenes' => $empresaAlmacenes,
        ]);
    }
}
