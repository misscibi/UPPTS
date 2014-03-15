<?php

namespace JCC\FormsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JCCFormsBundle:Default:index.html.twig', array('name' => $name));
    }
}
