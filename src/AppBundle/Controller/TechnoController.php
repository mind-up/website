<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Techno;
use AppBundle\Form\TechnoType;

/**
 * Techno controller.
 *
 * @Route("/techno")
 */
class TechnoController extends MainController
{
    /**
     * Lists all Techno entities.
     *
     * @Route("/", name="techno_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $technos = $em->getRepository('AppBundle:Techno')->findAll();

        return $this->render('techno/index.html.twig', array_merge(array(
            'technos' => $technos,
        ),$this->getData()));
    }

    /**
     * Creates a new Techno entity.
     *
     * @Route("/new", name="techno_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $techno = new Techno();
        $form = $this->createForm('AppBundle\Form\TechnoType', $techno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($techno);
            $em->flush();

            return $this->redirectToRoute('techno_show', array('id' => $techno->getId()));
        }

        return $this->render('techno/new.html.twig', array_merge(array(
            'techno' => $techno,
            'form' => $form->createView(),
        ),$this->getData()));
    }

    /**
     * Finds and displays a Techno entity.
     *
     * @Route("/{id}", name="techno_show")
     * @Method("GET")
     */
    public function showAction(Techno $techno)
    {
        $deleteForm = $this->createDeleteForm($techno);

        return $this->render('techno/show.html.twig', array_merge(array(
            'techno' => $techno,
            'delete_form' => $deleteForm->createView(),
        ),$this->getData()));
    }

    /**
     * Displays a form to edit an existing Techno entity.
     *
     * @Route("/{id}/edit", name="techno_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Techno $techno)
    {
        $deleteForm = $this->createDeleteForm($techno);
        $editForm = $this->createForm('AppBundle\Form\TechnoType', $techno);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($techno);
            $em->flush();

            return $this->redirectToRoute('techno_edit', array('id' => $techno->getId()));
        }

        return $this->render('techno/edit.html.twig', array_merge(array(
            'techno' => $techno,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ),$this->getData()));
    }

    /**
     * Deletes a Techno entity.
     *
     * @Route("/{id}", name="techno_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Techno $techno)
    {
        $form = $this->createDeleteForm($techno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($techno);
            $em->flush();
        }

        return $this->redirectToRoute('techno_index');
    }

    /**
     * Creates a form to delete a Techno entity.
     *
     * @param Techno $techno The Techno entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Techno $techno)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('techno_delete', array('id' => $techno->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
