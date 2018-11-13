<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Entity\UndMedida;
use App\Evento\ApiService;
use App\Form\CategoriaType;
use App\Form\UndMedidaType;
use App\Repository\CategoriaRepository;
use App\Repository\UndMedidaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request)
    {
        if (!$request->cookies->has("idEmpresa")){
            $response = new Response();
            $response->prepare($request);
            $response->headers->setCookie(new Cookie("idEmpresa",20458834001));
            $response->sendHeaders();
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/config/editcat", methods={"POST"}, name="configCat")
     */
    public function editCat(Request $request, CategoriaRepository $categoriaRepository, ApiService $apiService): Response
    {
        $editCategoria = $request->request->get("data");
        $categoria = $categoriaRepository->find($request->request->get("id"));

        $categoria = $apiService->validateAndEditar($editCategoria,Categoria::class, $categoria);
        $this->getDoctrine()->getManager()->flush();

        return $this->json($categoria);
    }

    /**
     * @Route("/config",  methods={"GET", "POST"}, name="config")
     */
    public function configuraciones(Request $request): Response
    {
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
        ]);
    }

    /**
     * @Route("/categorias", name="categorias")
     */
    public  function categorias(CategoriaRepository $categoriaRepository)
    {
        $categorias = $categoriaRepository->findAll();
        return $this->json($categorias);
    }

    /**
     * @Route("/unidades", name="unidades")
     */
    public  function unidades(UndMedidaRepository $undMedidaRepository)
    {
        $unidades = $undMedidaRepository->findAll();
        return $this->json($unidades);
    }

    /**
     * @Route("/config/editund", methods={"GET", "POST"}, name="configUnd")
     */
    public function editUnd( Request $request, UndMedidaRepository $medidaRepository, ApiService $apiService): Response
    {
        $editUnd = $request->request->get("data");
        $und = $medidaRepository->find($request->request->get("id"));

        $und = $apiService->validateAndEditar($editUnd,UndMedida::class, $und);
        $this->getDoctrine()->getManager()->flush();

        return $this->json($und);
    }

}
