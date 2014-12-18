<?php
/**
 * @autor Manuel Aguirre <programador.manuel@gmail.com>
 */

namespace AppBundle\Security\Voter;

use AppBundle\Security\RoleChecker;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;
use Symfony\Component\Security\Core\Role\RoleHierarchyInterface;


/**
 * @autor Manuel Aguirre <programador.manuel@gmail.com>
 */
abstract class BaseVoter implements VoterInterface
{

    /**
     * @var RoleChecker
     */
    protected $roleChecker;

    function __construct($roleChecker)
    {
        $this->roleChecker = $roleChecker;
    }

    protected function hasRole(TokenInterface $token, $roleName)
    {
        return $this->roleChecker->hasRole($token, $roleName);
    }
}