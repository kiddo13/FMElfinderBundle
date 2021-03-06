<?php
namespace FM\ElfinderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ElfinderController extends Controller
{

    public function showAction()
    {
        $parameters = $this->container->getParameter('fm_elfinder');
        $editor = $parameters['editor'];
        $locale = $parameters['locale'];
        switch ($editor){
            // add more
            case 'ckeditor':
                return $this->render('FMElfinderBundle:Elfinder:ckeditor.html.twig', array('locale'=>$locale));
                break;
            default:
                return $this->render('FMElfinderBundle:Elfinder:simple.html.twig', array('locale'=>$locale));
        }
    }

    public function loadAction()
    {
        $loader = $this->container->get('elfinder_loader');
        $loader->load();
    }
}
