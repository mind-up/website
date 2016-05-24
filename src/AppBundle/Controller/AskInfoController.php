<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\AskInfo;
use AppBundle\Form\AskInfoType;

/**
 * AskInfo controller.
 *
 * @Route("/contact")
 */
class AskInfoController extends MainController
{
    /**
     * Lists all AskInfo entities.
     *
     * @Route("/index", name="askinfo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $askInfos = $em->getRepository('AppBundle:AskInfo')->findAll();

        return $this->render('askinfo/index.html.twig', array_merge([
            'askInfos' => $askInfos,],
            $this->getData()));
    }

    /**
     * Creates a new AskInfo entity.
     *
     * @Route("", name="askinfo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $askInfo = new AskInfo();
        $form = $this->createForm('AppBundle\Form\AskInfoType', $askInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($askInfo);
            $em->flush();
			//
			$to = "contact@mind-up.fr";
			$subject = "Mind-Up : contact from " . $askInfo->getFirstname() . " " . $askInfo->getName() ;
			$message = "Firstname : " . $askInfo->getFirstname() . "\r\n" 
				. "Name : " . $askInfo->getName() . "\r\n" 
				. "Company : " . $askInfo->getCompany() . "\r\n" 
				. "Email : " . $askInfo->getEmail() . "\r\n" 
				. "Phone : " . $askInfo->getPhone() . "\r\n" 
				. "Message : \r\n" . $askInfo->getMessage();
			$headers = 'From: '.$askInfo->getEmail();
			mail($to,$subject,$message,$headers);
			//
            return $this->redirectToRoute('askinfo_new');
        }

        return $this->render('askinfo/new.html.twig', array_merge(
        	$this->getData(),
        	['askInfo' => $askInfo,
            	'title' => 'Contact',
            	'form' => $form->createView(),]));
    }

    /**
     * Finds and displays a AskInfo entity.
     *
     * @Route("/{id}", name="askinfo_show")
     * @Method("GET")
     */
    public function showAction(AskInfo $askInfo)
    {
        $deleteForm = $this->createDeleteForm($askInfo);

        return $this->render('askinfo/show.html.twig', array_merge(array(
            'askInfo' => $askInfo,
            'delete_form' => $deleteForm->createView(),
        ),$this->getData()));
    }

    /**
     * Displays a form to edit an existing AskInfo entity.
     *
     * @Route("/{id}/edit", name="askinfo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AskInfo $askInfo)
    {
        $deleteForm = $this->createDeleteForm($askInfo);
        $editForm = $this->createForm('AppBundle\Form\AskInfoType', $askInfo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($askInfo);
            $em->flush();

            return $this->redirectToRoute('askinfo_edit', array('id' => $askInfo->getId()));
        }

        return $this->render('askinfo/edit.html.twig', array_merge(array(
            'askInfo' => $askInfo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ),$this->getData()));
    }

    /**
     * Deletes a AskInfo entity.
     *
     * @Route("/{id}", name="askinfo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AskInfo $askInfo)
    {
        $form = $this->createDeleteForm($askInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($askInfo);
            $em->flush();
        }

        return $this->redirectToRoute('askinfo_index');
    }

    /**
     * Creates a form to delete a AskInfo entity.
     *
     * @param AskInfo $askInfo The AskInfo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AskInfo $askInfo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('askinfo_delete', array('id' => $askInfo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
