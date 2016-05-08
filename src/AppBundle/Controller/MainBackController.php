<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;


class MainBackController extends MainController
{
	
    protected function getData()
    {
        if ($this->data === null) {
        	$user = $this->get('security.token_storage')->getToken()->getUser();
        	$user->getJob()->getBrowseBackOffice();
        	$repository = $this->getDoctrine()->getRepository('AppBundle:Right');
        	$rights = $repository->findAll();
        	$this->data = array_merge(parent::getData(),
        		['rights' => $rights,
        		'user' => $user,]);
        }
        return $this->data;
   	}
}




