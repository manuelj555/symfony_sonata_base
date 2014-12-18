<?php
/*
 * @autor Manuel Aguirre <programador.manuel@gmail.com>
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;

/**
 */
class UserAdmin extends Admin
{
    protected $baseRoutePattern = 'users';
    protected $baseRouteName = 'app_admin_users';

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('email')
            ->add('fullName')
//            ->add('groups')
            ->add('enabled', null, array('editable' => true));

        if ($this->isGranted('ROLE_ALLOWED_TO_SWITCH')) {
            $listMapper->add('impersonating', 'string', array(
                'template' => 'Admin/list_impersonating.html.twig'
            ));
        }
    }
}