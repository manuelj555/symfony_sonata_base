<?php
/**
 * @autor Manuel Aguirre <programador.manuel@gmail.com>
 */

namespace AppBundle\Security\Handler;

use AppBundle\Entity\Administrator;
use AppBundle\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

/**
 * @autor Manuel Aguirre <programador.manuel@gmail.com>
 */
class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    /**
     * @var UrlGeneratorInterface
     */
    protected $urlGenerator;
    /**
     * @var SecurityContextInterface
     */
    protected $securityContext;

    function __construct($urlGenerator, $securityContext)
    {
        $this->urlGenerator = $urlGenerator;
        $this->securityContext = $securityContext;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
//        $user = $token->getUser();
//        if ($targetUrl = $request->getSession()->get('_security.main.target_path')) {
//            $request->getSession()->remove('_security.main.target_path');
//
//            return new RedirectResponse($targetUrl);
//        }
//
//        return $this->newResponse('home');
    }

    protected function newResponse($path, array $parameters = array())
    {
        return new RedirectResponse($this->urlGenerator->generate($path, $parameters));
    }
}