<?php
/**
 * 02/11/2014
 * plataforma_informativa
 */

namespace AppBundle\Security;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Role\RoleHierarchyInterface;


/**
 * @autor Manuel Aguirre <programador.manuel@gmail.com>
 */
class RoleChecker
{
    /**
     * @var RoleHierarchyInterface
     */
    protected $roleHierarchy;

    function __construct($roleHierarchy)
    {
        $this->roleHierarchy = $roleHierarchy;
    }

    public function hasRole(TokenInterface $token, $roleName)
    {
        $roles = $this->roleHierarchy->getReachableRoles($token->getRoles());

        foreach ($roles as $role) {
            if ($roleName === $role->getRole()) {
                return true;
            }
        }

        return false;
    }
} 