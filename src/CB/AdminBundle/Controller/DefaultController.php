<?php

namespace CB\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CBAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
