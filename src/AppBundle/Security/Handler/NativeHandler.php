<?php
/**
 * @autor Manuel Aguirre <programador.manuel@gmail.com>
 */

namespace AppBundle\Security\Handler;

use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Security\Handler\SecurityHandlerInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;


/**
 * @autor Manuel Aguirre <programador.manuel@gmail.com>
 */
class NativeHandler implements SecurityHandlerInterface
{

    /**
     * @var SecurityContextInterface
     */
    protected $securityContext;

    function __construct($securityContext)
    {
        $this->securityContext = $securityContext;
    }

    /**
     * @param \Sonata\AdminBundle\Admin\AdminInterface $admin
     * @param string|array                             $attributes
     * @param null                                     $object
     *
     * @return boolean
     */
    public function isGranted(AdminInterface $admin, $attributes, $object = null)
    {
        if (!is_array($attributes)) {
            $attributes = array($attributes);
        }

        foreach ($attributes as $pos => $attribute) {
            if (false === stripos($attribute, 'ROLE_')) {
                //solo si no comienza con ROLE_
                $attributes[$pos] = sprintf($this->getBaseRole($admin), $attribute);
            }
        }

        return $this->securityContext->isGranted($attributes, $object);
    }

    /**
     * Get a sprintf template to get the role
     *
     * @param \Sonata\AdminBundle\Admin\AdminInterface $admin
     *
     * @return string
     */
    public function getBaseRole(AdminInterface $admin)
    {
        return str_replace('.', '_', strtoupper($admin->getCode())) . '_%s';
    }

    /**
     * @param \Sonata\AdminBundle\Admin\AdminInterface $admin
     */
    public function buildSecurityInformation(AdminInterface $admin)
    {
    }

    /**
     * Create object security, fe. make the current user owner of the object
     *
     * @param \Sonata\AdminBundle\Admin\AdminInterface $admin
     * @param mixed                                    $object
     *
     * @return void
     */
    public function createObjectSecurity(AdminInterface $admin, $object)
    {
    }

    /**
     * Remove object security
     *
     * @param \Sonata\AdminBundle\Admin\AdminInterface $admin
     * @param mixed                                    $object
     *
     * @return void
     */
    public function deleteObjectSecurity(AdminInterface $admin, $object)
    {
    }
}