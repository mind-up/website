<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Controller\MainController;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Member;
use AppBundle\Form\MemberType;

class TeamController extends MainController
{
    /**
     * @Route("/team", name="team")
     */
    public function teamAction(Request $request)
    {
        return $this->render('team/index.html.twig',
        		$this->getData());
    }
    
    protected function getData() {
    	if ($this->data === null) {
    		$this->data = parent::getData();
    		// Titles
		    $this->data['title'] = $this->getText('team');
		    // Members
		    $repository = $this->getDoctrine()->getRepository('AppBundle:Member');
		    $members = $repository->findAll();
		    $this->data['members'] = $members;
		    // Jobs
		    $repository = $this->getDoctrine()->getRepository('AppBundle:Job');
		    $this->data['jobs'] = $repository->findAllOrdered();
		    // Departments
		    $repository = $this->getDoctrine()->getRepository('AppBundle:Department');
		    $this->data['departments'] = $repository->findAllOrdered();
    	}
    	return $this->data;
    }
    
    /**
     * Finds and displays a Member entity.
     *
     * @Route("/member/{id}", name="member_show")
     */
    public function showAction(Member $member)
    {
        return $this->render('member/show.html.twig', array_merge(
        	['member' => $member],
        	$this->getData()));
    }
}

