<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Form\EmpresaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/empresa/nuevo", methods={"GET","POST"}, name="nueva_empresa")
     */
    public function nuevo(Request $request): Response
    {
        $empresa = new Empresa();
        $form = $this->createForm(EmpresaType::class, $empresa)
            ->add('saveAndCreateNew', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            //$empresa = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($empresa);
            $em->flush();

            $this->addFlash(
                'notice',
                'Se agrego correctamente una nueva empresa!'
            );
            // $this->addFlash() is equivalent to $request->getSession()->getFlashBag()->add()

            if ($form->get('saveAndCreateNew')->isClicked()) {
                return $this->redirectToRoute('nueva_empresa');
            }

            return $this->redirectToRoute("lista_empresas");
        }

        return $this->render('empresa/crear.html.twig', [
            'empresa' => $empresa,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id<\d+>}", methods={"GET"}, name="mostrar_empresa")
     */
    public function mostrar(Empresa $empresa): Response
    {
        //$empresa=$this->getDoctrine()->getRepository(Empresa::class)->find($ruc);

        return $this->render('empresa/mostrar.html.twig', [
            'empresa' => $empresa,
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
