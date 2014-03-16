<?php

namespace CB\GrantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CBGrantBundle:Default:index.html.twig', array('name' => $name));
    }
}
