<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Text;
use AppBundle\Form\TextType;

/**
 * Text controller.
 *
 * @Route("/text")
 */
class TextController extends MainController
{
    /**
     * Lists all Text entities.
     *
     * @Route("/", name="text_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $texts = $em->getRepository('AppBundle:Text')->findAll();

        return $this->render('text/index.html.twig', array_merge(array(
            'texts' => $texts,
        ),$this->getData()));
    }

    /**
     * Creates a new Text entity.
     *
     * @Route("/new", name="text_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $text = new Text();
        $form = $this->createForm('AppBundle\Form\TextType', $text);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($text);
            $em->flush();

            return $this->redirectToRoute('text_show', array('id' => $text->getId()));
        }

        return $this->render('text/new.html.twig', array_merge(array(
            'text' => $text,
            'form' => $form->createView(),
        ),$this->getData()));
    }

    /**
     * Finds and displays a Text entity.
     *
     * @Route("/{id}", name="text_show")
     * @Method("GET")
     */
    public function showAction(Text $text)
    {
        $deleteForm = $this->createDeleteForm($text);

        return $this->render('text/show.html.twig', array_merge(array(
            'text' => $text,
            'delete_form' => $deleteForm->createView(),
       ),$this->getData()));
    }

    /**
     * Displays a form to edit an existing Text entity.
     *
     * @Route("/{id}/edit", name="text_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Text $text)
    {
        $deleteForm = $this->createDeleteForm($text);
        $editForm = $this->createForm('AppBundle\Form\TextType', $text);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($text);
            $em->flush();

            return $this->redirectToRoute('text_edit', array('id' => $text->getId()));
        }

        return $this->render('text/edit.html.twig', array_merge(array(
            'text' => $text,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ),$this->getData()));
    }

    /**
     * Deletes a Text entity.
     *
     * @Route("/{id}", name="text_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Text $text)
    {
        $form = $this->createDeleteForm($text);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($text);
            $em->flush();
        }

        return $this->redirectToRoute('text_index');
    }

    /**
     * Creates a form to delete a Text entity.
     *
     * @param Text $text The Text entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Text $text)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('text_delete', array('id' => $text->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
