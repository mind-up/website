<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Member;
use AppBundle\Form\MemberType;

/**
 * Member controller.
 *
 * @Route("/member")
 */
class MemberController extends MainBackController
{
	/**
     * Lists all Member entities for edition.
     *
     * @Route("", name="member_edit_all")
     * @Method("GET")
     */
    public function editAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $members = $em->getRepository('AppBundle:Member')->findAll();
        $ps = [];
        foreach ($members as $member){
        	$form = $this->createForm('AppBundle\Form\MemberType', $member, 
        		['action' => '/member/'.$member->getId().'/edit']);
        	$deleteForm = $this->createDeleteForm($member);
        	$p = ['object' => $member,
        		'form' => $form->createView(),
        		'deleteForm' => $deleteForm->createView()];
        	array_push($ps, $p);
        } 
        
        $form = $this->createForm('AppBundle\Form\MemberType', new Member(), 
        		['action' => '/member/new']);
        
        return $this->render('member/editall.html.twig', array_merge(array(
            'members' => $ps,
            'newForm' => $form->createView(),
        ),$this->getData()));
    }
    /**
     * Creates a new Member entity.
     *
     * @Route("/new", name="member_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $member = new Member();
        $form = $this->createForm('AppBundle\Form\MemberType', $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $this->get('security.password_encoder')
                ->encodePassword($member, $member->getPassword());
            $member->setPassword($password);
            $em = $this->getDoctrine()->getManager();
            $member->upload();
            $em->persist($member);
            $em->flush();
            return $this->redirectToRoute('member_edit_all', array('id' => $member->getId()));
        }

        return $this->render('member/new.html.twig', array_merge(array(
            'member' => $member,
            'form' => $form->createView(),
        ),$this->getData()));
    }

    

	/**
     * Displays a form to edit an existing Member entity.
     *
     * @Route("/self/edit", name="member_self_edit")
     * @Method({"GET", "POST"})
     */
	public function selfEditAction() {
		$id = $user = $this->get('security.token_storage')->getToken()->getUser()->getId();
		return $this->redirect('/member/'.$id.'/edit', 301);
	}
    /**
     * Displays a form to edit an existing Member entity.
     *
     * @Route("/{id}/edit", name="member_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Member $member) {
    	$oldPass = $member->getPassword();
        $deleteForm = $this->createDeleteForm($member);
        $editForm = $this->createForm('AppBundle\Form\MemberType', $member);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
        	if ($member->getPassword() !== null
        			&& $member->getPassword() !== $oldPass) {
		    	$password = $this->get('security.password_encoder')
		            ->encodePassword($member, $member->getPassword());
		        $member->setPassword($password);}
            $em = $this->getDoctrine()->getManager();
            $member->upload();
            $em->persist($member);
            $em->flush();
            return $this->redirectToRoute('member_edit', array('id' => $member->getId())); }
        return $this->render('member/edit.html.twig', array_merge(
        	['member' => $member,
		        'edit_form' => $editForm->createView(),
		        'delete_form' => $deleteForm->createView(),],
		  	$this->getData()));}
    /**
     * Deletes a Member entity.
     *
     * @Route("/{id}", name="member_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Member $member)
    {
        $form = $this->createDeleteForm($member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($member);
            $em->flush();
        }

        return $this->redirectToRoute('member_index');
    }

    /**
     * Creates a form to delete a Member entity.
     *
     * @param Member $member The Member entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Member $member)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('member_delete', array('id' => $member->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
