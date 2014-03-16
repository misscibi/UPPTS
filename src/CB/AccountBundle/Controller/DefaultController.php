<?php

namespace CB\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CBAccountBundle:Default:index.html.twig', array('name' => $name));
    }
}
