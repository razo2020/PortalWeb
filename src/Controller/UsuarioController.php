<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Form\UsuarioType;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsuarioController extends AbstractController
{
    /**
     * @Route("/usuario", defaults={"ruc": "0"}, methods={"GET"}, name="lista_usuarios")
     *
     */
    public function index(string $ruc, UsuarioRepository $usuarios):Response
    {
        if ($ruc == 0){
            $listausuarios = $usuarios->findAll();
        }else{
            $listausuarios = $usuarios->findBy(['empresaRuc' => $ruc]);
        }

        return $this->render('usuario/index.html.twig', [
            'lista_usuarios' => $listausuarios,
        ]);
    }

    /**
     * @Route("/registrar", name="registrar_usuario")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $user = new Usuario();
        $form = $this->createForm(UsuarioType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('home');
        }

        return $this->render(
            'usuario/registrar.html.twig',
            array('form' => $form->createView())
        );
    }
}
