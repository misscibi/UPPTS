<?php

namespace JCC\AccountManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JCCAccountManagementBundle:Default:index.html.twig', array('name' => $name));
    }
}
