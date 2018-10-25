<?php

namespace App\Controller;

use App\Entity\Almacen;
use App\Entity\Empresa;
use App\Entity\Material;
use App\Entity\Ubicacion;
use App\Form\MaterialType;
use App\Repository\AlmacenRepository;
use App\Repository\MaterialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/material")
 */
class MaterialController extends AbstractController
{
    /**
     * @Route("/{id<\d+>}", methods={"GET"}, name="lista_materiales")
     */
    public function index(Empresa $empresa):Response
    {
        $almacen = $empresa->getAlmacenes()->first();
        $ubicaciones = $almacen->getUbicaciones();
        return $this->render('material/index.html.twig', [
            'ubicaciones' => $ubicaciones,
            'almacen' => $almacen,
        ]);
    }

    /**
     * @Route("/{id<\d+>}", methods={"GET"}, name="nuevo_material")
     */
    public function nuevo(Request $request, Empresa $empresa, AlmacenRepository $almacenRepository):Response
    {
        $material = new Material();
        $form = $this->createForm(MaterialType::class, $material)
            ->add('saveAndCreateNew', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $almacen = $almacenRepository->findOneBy(["id_almacen" => $form->get("almacen")->getData()]);
            $ubicacion = new Ubicacion();
            $ubicacion->setUbicacion($form->get("ubicacion")->getData() | "general");
            $ubicacion->setMaterial($material);
            $almacen->addUbicacion($ubicacion);
            if ($form->get('saveAndCreateNew')->isClicked()) {
                return $this->redirectToRoute('nuevo_material',['id' => $empresa->getRuc()]);
            }

            return $this->redirectToRoute('lista_materiales',['id' => $empresa->getRuc()]);
        }
        return $this->render('material/index.html.twig', [
            'form' => $form,
            'empresa' => $empresa,
        ]);
    }
}
