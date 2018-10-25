<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Entity\UndMedida;
use App\Form\CategoriaType;
use App\Form\UndMedidaType;
use App\Repository\CategoriaRepository;
use App\Repository\UndMedidaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /*/**
     * @Route("/config", defaults={"idcat"="0", "idUnd"="0"}, methods={"GET", "POST"}, name="config")
     * @Route("/config/{idcat<[1-9]\d*>}", defaults={"idUnd"="0"}, methods={"GET", "POST"}, name="configCat")
     * @Route("/config/{idund<[1-9]\d*>}", defaults={"idcat"="0"}, methods={"GET", "POST"}, name="configUnd")
     * @Cache(smaxage="10")
     * @param string $idCat
     * @param string $idUnd
     * @param Request $request
     * @param CategoriaRepository $categoriaRepository
     * @param UndMedidaRepository $medidaRepository
     * @return Response
     */
    /*public function configuraciones( $idCat='0',  $idUnd = "0", Request $request,CategoriaRepository $categoriaRepository, UndMedidaRepository $medidaRepository): Response
    {
        if ($idCat != '0'){
            $categoria = $categoriaRepository->findOneBy(['idcategoria' => $idCat]);
        }
        if ($idUnd != '0'){
            $undMedida = $medidaRepository->findOneBy(['idundMedida' => $idUnd]);
        }
        $categorias = $categoriaRepository->findAll();
        $unds = $medidaRepository->findAll();
        if (!isset($categoria)){
            $categoria = new Categoria();
        }
        if (!isset($undMedida)){
            $undMedida = new UndMedida();
        }
        $formCat = $this->createForm(CategoriaType::class, $categoria);
        $formCat->handleRequest($request);
        $formUND = $this->createForm(UndMedidaType::class, $undMedida);
        $formUND->handleRequest($request);
        if ($formCat->isSubmitted() && $formCat->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($categoria);
            $em->flush();
            return $this->redirectToRoute('config');
        }
        if ($formUND->isSubmitted() && $formUND->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($undMedida);
            $em->flush();
            return $this->redirectToRoute('config');
        }
        return $this->render('home/config.html.twig',[
            'formCat' => $formCat->createView(),
            'formUnd' => $formUND->createView(),
            'categorias' => $categorias,
            'unds' => $unds,
        ]);
    }*/

    /**
     * @Route("/config/{id<[1-9]\d*>}", methods={"GET", "POST"}, name="configCat")
     */
    public function ediCat( Categoria $categoria, Request $request,CategoriaRepository $categoriaRepository, UndMedidaRepository $medidaRepository): Response
    {
        $categorias = $categoriaRepository->findAll();
        $unds = $medidaRepository->findAll();
        if (!isset($categoria)){
            $categoria = new Categoria();
        }
        if (!isset($undMedida)){
            $undMedida = new UndMedida();
        }
        $formCat = $this->createForm(CategoriaType::class, $categoria);
        $formCat->handleRequest($request);
        $formUND = $this->createForm(UndMedidaType::class, $undMedida);
        $formUND->handleRequest($request);
        if ($formCat->isSubmitted() && $formCat->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($categoria);
            $em->flush();
            return $this->redirectToRoute('config');
        }
        if ($formUND->isSubmitted() && $formUND->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($undMedida);
            $em->flush();
            return $this->redirectToRoute('config');
        }
        return $this->render('home/config.html.twig',[
            'formCat' => $formCat->createView(),
            'formUnd' => $formUND->createView(),
            'categorias' => $categorias,
            'unds' => $unds,
        ]);
    }

    /**
     * @Route("/config",  methods={"GET", "POST"}, name="config")
     */
    public function configuraciones( Request $request,CategoriaRepository $categoriaRepository, UndMedidaRepository $medidaRepository): Response
    {
        $categorias = $categoriaRepository->findAll();
        $unds = $medidaRepository->findAll();
        $categoria = new Categoria();
        $undMedida = new UndMedida();
        $formCat = $this->createForm(CategoriaType::class, $categoria);
        $formCat->handleRequest($request);
        $formUND = $this->createForm(UndMedidaType::class, $undMedida);
        $formUND->handleRequest($request);
        if ($formCat->isSubmitted() && $formCat->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($categoria);
            $em->flush();
            return $this->redirectToRoute('config');
        }
        if ($formUND->isSubmitted() && $formUND->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($undMedida);
            $em->flush();
            return $this->redirectToRoute('config');
        }
        return $this->render('home/config.html.twig',[
            'formCat' => $formCat->createView(),
            'formUnd' => $formUND->createView(),
            'categorias' => $categorias,
            'unds' => $unds,
        ]);
    }

    /**
     * @Route("/config/{id<[1-9]\d*>}", methods={"GET", "POST"}, name="configUnd")
     */
    public function ediUnd( UndMedida $undMedida, Request $request,CategoriaRepository $categoriaRepository, UndMedidaRepository $medidaRepository): Response
    {
        $categorias = $categoriaRepository->findAll();
        $unds = $medidaRepository->findAll();
        $categoria = new Categoria();
        $formCat = $this->createForm(CategoriaType::class, $categoria);
        $formCat->handleRequest($request);
        $formUND = $this->createForm(UndMedidaType::class, $undMedida);
        $formUND->handleRequest($request);
        if ($formCat->isSubmitted() && $formCat->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($categoria);
            $em->flush();
            return $this->redirectToRoute('config');
        }
        if ($formUND->isSubmitted() && $formUND->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($undMedida);
            $em->flush();
            return $this->redirectToRoute('config');
        }
        return $this->render('home/config.html.twig',[
            'formCat' => $formCat->createView(),
            'formUnd' => $formUND->createView(),
            'categorias' => $categorias,
            'unds' => $unds,
        ]);
    }

}
