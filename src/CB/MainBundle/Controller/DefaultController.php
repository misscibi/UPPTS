<?php

namespace CB\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CBMainBundle:Default:index.html.twig');
    }
}
