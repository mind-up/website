<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
	protected $data;
    //
    protected function getText($textId) {
    	$repository = $this->getDoctrine()->getRepository('AppBundle:Text');
    	$text = $repository->findOneByTextId($textId);
    	if($text) {
    		return $text->getFrench();
    	}
    	else {
    		echo 'problem : '.$textId;
    		return '';
    	}
    }
    //
    protected function getData()
    {
        if ($this->data === null) {
        	$this->data = [
        		'website' => $this->getText('website'),
        		'title' => $this->getText('default'),
        		'a' => [
        			'home' => [
        				'text' => $this->getText('a-home'),
                    	'url' => '/'],
                    'back' => [
        				'text' => 'Back Office',
                    	'url' => '/back'],
                    'team' => [
        				'text' => $this->getText('a-team'),
                    	'url' => '/team'],
                    'projects' => [
        				'text' => $this->getText('a-projects'),
                    	'url' => '/projects'],
                    'contact' => [
        				'text' => $this->getText('a-contact'),
                    	'url' => '/contact']],
             	'images' => [
             		'logo' => [
             			'src' => 'images/logo.png',
             			'alt' => $this->getText('logo')]]];
        }
        return $this->data;
    }
}

