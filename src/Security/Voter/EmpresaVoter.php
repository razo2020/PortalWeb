<?php

namespace App\Security\Voter;

use App\Entity\Empresa;
use App\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class EmpresaVoter extends Voter
{
    const VIEW = 'VER';
    const EDIT = 'EDITAR';
    const DELETE = 'ELIMINAR';
    const MAKER = 'CREAR';
    private $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, [self::VIEW, self::EDIT, self::MAKER, self::DELETE], true)
                && $subject instanceof Empresa;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof Usuario) {
            return false;
        }

        if($this->security->isGranted('ROLE_SUPER_ADMIN')){
            return true;
        }

        // ... (check conditions and return true to grant permission) ...

        switch ($attribute) {
            case self::VIEW:
                return $this->security->isGranted('IS_AUTHENTICATED_FULLY') && $this->usuarioEmpresa($subject,$user);
            case self::EDIT:
                return $this->security->isGranted('ROLE_ADMIN') && $this->usuarioEmpresa($subject,$user);
            case self::MAKER:
                break;
            case self::DELETE:
                break;
        }

        return false;
    }

    private function usuarioEmpresa(Empresa $empresa, Usuario $usuario){
        return $usuario->getEmpresa() === $empresa;
    }
}
