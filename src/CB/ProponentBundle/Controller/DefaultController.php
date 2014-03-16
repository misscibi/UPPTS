<?php

namespace CB\ProponentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CBProponentBundle:Default:index.html.twig', array('name' => $name));
    }
}
