<?php

namespace App\Controller;

use App\Entity\Empresa;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EmpresaController extends AbstractController
{
    /**
     * @Route("/empresa", name="lista_empresas")
     */
    public function index()
    {
        $empresas=$this->getDoctrine()->getRepository(Empresa::class)->findAll();

        return $this->render('empresa/index.html.twig', [
            'empresas' => $empresas,
        ]);
    }

    /**
     * @Route("/empresa/{ruc}", name="mostrar_empresa")
     */
    public function mostrar($ruc)
    {
        $empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($ruc);

        return $this->render('empresa/mostrar.html.twig', [
            'empresa' => $empresa
        ]);
    }

    ///**
    // * @Route("/empresa/save", name="guardar_empresa")
    // */
    /*public function nuevaEmpresa()
    {
        //Entity Manager
        $em=$this->getDoctrine()->getManager();

        //Creamos el objeto empresa
        $empresa=new Empresa();
        $empresa->setRuc('20458834001');
        $empresa->setRazonSocial('System Server Peru');

        //Guardamos en la base de datos
        $em->persist($empresa);
        $em->flush();

        return new Response('Se guardo la empresa: '.$empresa->getRazonSocial());
    }*/
}
