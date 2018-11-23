<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Form\EmpresaType;
use App\Repository\EmpresaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EmpresaController
 * @package App\Controller
 */

class EmpresaController extends AbstractController
{
    /**
     * @Route("/empresa", name="lista_empresas")
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function index(EmpresaRepository $empresas): Response
    {
        $lista_empresas = $empresas->findAll();

        return $this->render('empresa/index.html.twig', [
            'empresas' => $lista_empresas,
        ]);
    }

    /**
     * @Route("/empresa/nuevo", methods={"GET","POST"}, name="nueva_empresa")
     * @IsGranted("ROLE_SUPER_ADMIN")
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
     * @Route("/empresa/{id<\d+>}", methods={"GET"}, name="mostrar_empresa")
     * @IsGranted("VER", subject="empresa")
     */
    public function mostrar(Empresa $empresa): Response
    {
        return $this->render('empresa/mostrar.html.twig', [
            'empresa' => $empresa,
        ]);
    }

    /**
     * @Route("/empresa/{id<\d+>}/editar",methods={"GET", "POST"}, name="editar_empresa")
     * @IsGranted("EDITAR", subject="empresa")
     */
    public function editarEmpresa(Request $request, Empresa $empresa):Response
    {
        $form = $this->CreateForm(EmpresaType::class, $empresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lista_empresas');
        }

        return $this->render( 'empresa/editar.html.twig', [
            'empresa' => $empresa,
            'form' => $form->createView(),
        ]);
    }
}
