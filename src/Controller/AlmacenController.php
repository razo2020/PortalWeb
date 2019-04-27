<?php

namespace App\Controller;

use App\Entity\Almacen;
use App\Entity\Empresa;
use App\Entity\Ubicacion;
use App\Form\AlmacenType;
use App\Form\AlmUbiType;
use App\Repository\AlmacenRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AlmacenController
 * @package App\Controller
 *
 */

class AlmacenController extends AbstractController
{
    /**
     * @Route("/almacen/{id}", name="lista_almacenes")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function index(Empresa $empresa, AlmacenRepository $almacenRepository):Response
    {
        $almacenes = $almacenRepository->findBy(['empresa' => $empresa]);

        return $this->render('almacen/index.html.twig', [
            'almacenes' => $almacenes,
        ]);
    }

    /**
     * @param AlmacenRepository $almacenRepository
     * @return Response
     * @Route("/almacenes", name="lista_almacenes_all")
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function allAlmacenes(AlmacenRepository $almacenRepository):Response
    {
        $almacenes = $almacenRepository->findAll();
        return $this->render('almacen/index.html.twig', ['almacenes' => $almacenes]);
    }

    /**
     * @Route("/almacen/{rucEmpresa}/nuevo", methods={"GET","POST"}, name="registrar_almacen")
     * @ParamConverter("empresa", options={"mapping": {"rucEmpresa": "ruc"}})
     */
    public function registrar(Empresa $empresa, Request $request):Response
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

    /**
     * @Route("/almacen/{idAlmacen}/ubicacion", methods={"GET","POST"}, name="ubicaciones_lista")
     * @ParamConverter("almacen", options={"mapping": {"idAlmacen": "idalmacen"}})
     * @Template()
     */
    public function nuevaUbicacion(Request $request, Almacen $almacen):Response
    {
        $form = $this->createForm(AlmUbiType::class, $almacen);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            foreach ($almacen->getUbicaciones() as $ubicacion){
                $ubicacion->setAlmacen($almacen);
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($almacen);
            $em->flush();
        }
        return $this->render('ubicacion/index.html.twig',[
            'ubicaciones' => $almacen->getUbicaciones(),
            'almacen' => $almacen,
            'form' => $form->createView(),
        ]);
    }

}
