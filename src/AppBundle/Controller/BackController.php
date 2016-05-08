<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;

class BackController extends MainBackController
{
    /**
     * @Route("/back", name="back")
     */
    public function indexAction(Request $request)
    {
    	return $this->render('back/index.html.twig', array_merge(
    		$this->getData(),
    		['title' => 'Back Office',]));
    } 
}
