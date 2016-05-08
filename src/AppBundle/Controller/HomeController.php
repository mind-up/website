<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Controller\MainController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends MainController
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction(Request $request)
    {
        return $this->render('home.html.twig',
        		$this->getData());
    }
    
    protected function getData() {
    	if ($this->data === null) {
    		$this->data = parent::getData();
    		// Titles
		    $this->data['title'] = 'Home';
		    $this->data['h'][1][1] = $this->getText('home-h-1-1');
		    $this->data['h'][2][1] = $this->getText('home-h-2-1');
		    $this->data['h'][2][2] = $this->getText('home-h-2-2');
		    $this->data['h'][3][1] = $this->getText('home-h-3-1');
		    $this->data['h'][3][2] = $this->getText('home-h-3-2');
		    // Img
		    $this->data['images']['profil'] = array(
		                'src' => '/images/profil.jpeg',
		                'alt' => 'DEFAULT');
		    $this->data['images']['home-slider-1'] = array(
		                'src' => '/images/home-slider/pic1.jpg',
		                'alt' => 'DEFAULT');
		    $this->data['images']['home-slider-2'] = array(
		                'src' => '/images/home-slider/pic2.jpg',
		                'alt' => 'DEFAULT');
		    $this->data['images']['home-slider-3'] = array(
		                'src' => '/images/home-slider/pic3.jpg',
		                'alt' => 'DEFAULT');
		  	// Paragraphs
			$this->data['p'][1] = $this->getText('home-p-1');
		    $this->data['p'][2] = $this->getText('home-p-2');
		    $this->data['p'][3] = $this->getText('home-p-3');
		    $this->data['p'][4] = $this->getText('home-p-4');
		    $this->data['p'][5] = $this->getText('home-p-5');
		    $this->data['p'][6] = $this->getText('home-p-6');
		    $this->data['p'][7] = $this->getText('home-p-7');
		    $this->data['p'][8] = $this->getText('home-p-8');
		    // Members
		    $repository = $this->getDoctrine()->getRepository('AppBundle:Member');
		    $this->data['members'] = $repository->findAll();
		    // Jobs
		    $repository = $this->getDoctrine()->getRepository('AppBundle:Job');
		    $this->data['jobs'] = $repository->findAllOrdered();
		    // Departments
		    $repository = $this->getDoctrine()->getRepository('AppBundle:Department');
		    $this->data['departments'] = $repository->findAllOrdered();
    	}
    	return $this->data;
    }
}

