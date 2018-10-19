<?php

namespace App\Controller;

use App\Entity\Almacen;
use App\Entity\Empresa;
use App\Form\AlmacenType;
use App\Repository\AlmacenRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AlmacenController
 * @package App\Controller
 * @Route("/empresa/almacen")
 */

class AlmacenController extends AbstractController
{
    /**
     * @Route("/{id<\d+>}", methods={"GET"}, name="lista_almacenes")
     *
     */
    public function index(Empresa $empresa, AlmacenRepository $almacenRepository):Response
    {
        if (isset($empresa)){
            $almacenes = $almacenRepository->findAll();
        }else{
            $almacenes = $empresa->getAlmacenes();
        }

        return $this->render('almacen/index.html.twig', [
            'almacenes' => $almacenes,
            'empresa' => $empresa,
        ]);
    }

    /**
     * @Route("/{rucEmpresa}/nuevo", methods={"GET","POST"}, name="registrar_almacen")
     * @ParamConverter("empresa", options={"mapping": {"rucEmpresa": "ruc"}})
     */
    public function register(Empresa $empresa, Request $request)
    {
        // 1) build the form
        $almacen = new Almacen();
        if(isset($empresa)){
            $empresa->addAlmacene($almacen);
        }

        $form = $this->createForm(AlmacenType::class, $almacen)
            ->add('saveAndCreateNew', SubmitType::class);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($almacen);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            if ($form->get('saveAndCreateNew')->isClicked()) {
                return $this->redirectToRoute('registrar_almacen',['rucEmpresa' => $empresa->getRuc()]);
            }

            return $this->redirectToRoute('lista_almacenes',['id' => $empresa->getRuc()]);
        }

        return $this->render(
            'almacen/registrar.html.twig',
            array('form' => $form->createView(), 'empresa' => $empresa)
        );
    }

}
