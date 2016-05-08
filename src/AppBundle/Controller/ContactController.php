<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;

/**
 * Project controller.
 *
 * @Route("/contact-old")
 */
class ContactController extends MainController
{
    /**
     * Lists all Project entities.
     *
     * @Route("", name="contact")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
    	$form = $this->createForm('AppBundle\Form\ContactType');
        $form->handleRequest($request);
    
    	return $this->render('contact/index.html.twig', array_merge(
    		$this->getData(),
    		['title' => 'Contact',
    		'form' => $form->createView()]));
    }
}
