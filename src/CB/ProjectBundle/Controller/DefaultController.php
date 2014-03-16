<?php

namespace CB\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CBProjectBundle:Default:index.html.twig', array('name' => $name));
    }
}
