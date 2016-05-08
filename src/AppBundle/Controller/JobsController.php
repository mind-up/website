<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Controller\MainController;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\JobType;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Job;

class JobsController extends MainController
{
    /**
     * @Route("/jobs", name="jobs")
     */
    public function homeAction(Request $request)
    {
        return $this->render('jobs/main.html.twig',
        		$this->getData());
    }
    protected function getData() {
    	if ($this->data === null) {
    		$this->data = parent::getData();
    		// Titles
		    $this->data['title'] = 'Jobs';
		    // Jobs
		    $repository = $this->getDoctrine()->getRepository('AppBundle:Job');
		    $jobs = $repository->findAll();
		    $forms = [];
		    
		    foreach($jobs as $job) {
				$form = $this->createForm(JobType::class, $job)->createView();
		   		array_push($forms, $form);
		   	} 
		   	$form = $this->createForm(JobType::class)->createView();
		    $this->data['jobs'] = $forms;
		    $this->data['newJob'] = $form;
    	}
    	return $this->data;
    }
    
    /**
     * @Route("/jobs/update", name="update_job")
     */
    public function updateAction(Request $request){
    	$id = 
    	$repository = $this->getDoctrine()->getRepository('AppBundle:Job');
    	$job = $repository->find($id);
    	$form = $this->createForm(JobType::class, $job);
    	$form->handleRequest($request);
    	if ($form->isSubmitted() && $form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
			$em->persist($job);
			$em->flush();
		    return new Response('ok');
		}
        return new Response('ko');
    }
}

