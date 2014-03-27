<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/27/14
 * Time: 1:14 PM
 */

namespace CB\GrantBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PhaseInstanceController extends Controller {
    public function viewAction ($id) {
        $em = $this->getDoctrine()->getManager();
        $instance = $em->getRepository('CBGrantBundle:PhaseInstance')->find($id);

        return $this->render('CBGrantBundle:Default:PhaseInstancePermalink.html.twig', array(
            'phaseInstance' => $instance,
        ));
    }
} 