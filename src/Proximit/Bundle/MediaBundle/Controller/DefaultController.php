<?php

namespace Proximit\Bundle\MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
    
    public function selectLangAction($langue = null)
    {
        if($langue != null)
        {
            $request = $this->getRequest();
            $request->setLocale($langue);
            $locale = $request->getLocale();
        }

        $router = $this->get('router');
        $frontControllerName = basename($_SERVER['SCRIPT_FILENAME']);
        $url = $request->headers->get('referer');
        $urlElements = parse_url($url);
        $routePath = str_replace('/' . $frontControllerName, '', $urlElements['path']); //eliminates the front controller name from the url path
        $route_params = $router->match($routePath);
        $route = $route_params['_route'];

        $url = $this->container->get('router')->generate($route, array('_locale' => $locale));

        return new RedirectResponse($url);
    }
}
