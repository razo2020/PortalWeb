<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Entity\Usuario;
use App\Form\UsuarioType;
use App\Repository\UsuarioRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UsuarioController
 * @package App\Controller
 */

class UsuarioController extends AbstractController
{
    /**
     * @Route("/usuario{rucEmpresa}", name="lista_usuarios")
     * @ParamConverter("empresa", options={"mapping": {"rucEmpresa": "ruc"}})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Security("has_role('ROLE_ADMIN') or is_granted('EDITAR', empresa)")
     */
    public function index(Empresa $empresa, UsuarioRepository $usuarioRepository):Response
    {
        $usuarios = $usuarioRepository->findBy(['empresa' => $empresa]);

        return $this->render('usuario/index.html.twig', [
            'usuarios' => $usuarios,
            'empresa' => $empresa,
        ]);
    }

    /**
     * @Route("/usuario/{rucEmpresa}/nuevo", methods={"GET","POST"}, name="registrar_usuario")
     * @ParamConverter("empresa", options={"mapping": {"rucEmpresa": "ruc"}})
     */
    public function register(Empresa $empresa, Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $user = new Usuario();
        if(isset($empresa)){
            $empresa->addUsuario($user);
        }

        $form = $this->createForm(UsuarioType::class, $user)
            ->add('saveAndCreateNew', SubmitType::class);

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

            if ($form->get('saveAndCreateNew')->isClicked()) {
                return $this->redirectToRoute('registrar_usuario',['rucEmpresa' => $empresa->getRuc()]);
            }

            return $this->redirectToRoute('lista_usuarios',['rucEmpresa' => $empresa->getRuc()]);
        }

        return $this->render(
            'usuario/registrar.html.twig',
            array('form' => $form->createView(), 'empresa' => $empresa)
        );
    }

    /**
     * @Route("/usuario/{id}/editar", methods={"GET","POST"}, name="editar_usuario")
     *
     */
    public function edit(Usuario $usuario, Request $request, UserPasswordEncoderInterface $passwordEncoder){
        $form = $this->createForm(UsuarioType::class,$usuario);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $password = $passwordEncoder->encodePassword($usuario, $usuario->getPlainPassword());
            $usuario->setPassword($password);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute("lista_usuarios",['rucEmpresa' => $usuario->getEmpresa()->getRuc()]);
        }
        return $this->render(
            'usuario/registrar.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/usuario/{id}/mostrar", methods={"GET"}, name="mostrar_usuario")
     *
     */
    public function vew(Usuario $usuario)
    {
        return $this->render(':usuario:mostrar.html.twig', array('usuario' => $usuario));
    }


}
