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
 * @Route("/project")
 */
class BackProjectController extends MainBackController {
    /**
     * Lists all Project entities for edition.
     *
     * @Route("", name="project_edit_all")
     * @Method("GET")
     */
    public function editAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $projects = $em->getRepository('AppBundle:Project')->findAll();
        $ps = [];
        foreach ($projects as $project){
        	$form = $this->createForm('AppBundle\Form\ProjectType', $project, 
        		['action' => '/project/'.$project->getId().'/edit']);
        	$deleteForm = $this->createDeleteForm($project);
        	$p = ['object' => $project,
        		'form' => $form->createView(),
        		'deleteForm' => $deleteForm->createView()];
        	array_push($ps, $p);
        } 
        
        $form = $this->createForm('AppBundle\Form\ProjectType', new Project(), 
        		['action' => '/project/new']);
        
        return $this->render('project/editall.html.twig', array_merge(array(
            'projects' => $ps,
            'newForm' => $form->createView(),
        ),$this->getData()));
    }

    /**
     * Creates a new Project entity.
     *
     * @Route("/new", name="project_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $project = new Project();
        $form = $this->createForm('AppBundle\Form\ProjectType', $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $project->upload();
            $em->persist($project);
            $em->flush();
            return $this->redirectToRoute('project_edit_all');
        }

        return $this->render('project/new.html.twig', array_merge(array(
            'project' => $project,
            'form' => $form->createView(),
        ),$this->getData()));
    }

    /**
     * Displays a form to edit an existing Project entity.
     *
     * @Route("/{id}/edit", name="project_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Project $project)
    {
        $deleteForm = $this->createDeleteForm($project);
        $editForm = $this->createForm('AppBundle\Form\ProjectType', $project);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $project->upload();
            $em->persist($project);
            $em->flush();
			//return $this->redirectToRoute('project_edit_all', array('id' => $project->getId()));
            return $this->redirectToRoute('project_edit_all');
        }

        return $this->render('project/edit.html.twig', array_merge(array(
            'project' => $project,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ),$this->getData()));
    }

    /**
     * Deletes a Project entity.
     *
     * @Route("/{id}", name="project_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Project $project){
        $form = $this->createDeleteForm($project);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($project);
            $em->flush();}
        return $this->redirectToRoute('project_edit_all');}

    /**
     * Creates a form to delete a Project entity.
     *
     * @param Project $project The Project entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Project $project){
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('project_delete', array('id' => $project->getId())))
            ->setMethod('DELETE')
            ->getForm();}}

