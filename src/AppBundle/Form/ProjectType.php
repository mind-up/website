<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('visible')
            ->add('technos')
            ->add('members')
            
            ->add('name', null, [
            	'attr' => [
        			'placeholder' => 'Nom du projet',
        			'title' => 'Nom du projet',]])
        	->add('client', null, [
            	'attr' => [
        			'placeholder' => 'Client',
        			'title' => 'Client',]])
        	->add('description', null, [
            	'attr' => [
        			'placeholder' => 'Description',
        			'title' => 'Description',]])
        	->add('image', null, [
            	'attr' => [
        			'placeholder' => 'Image',
        			'title' => 'Image',]])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Project'
        ));
    }
}
