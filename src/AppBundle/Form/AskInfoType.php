<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AskInfoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
            	'label' => 'Nom',
            	'attr' => [
        			'placeholder' => 'Nom',]])
            ->add('firstname', TextType::class, [
            	'label' => 'Prénom',
            	'attr' => [
        			'placeholder' => 'Prénom',]])
            ->add('company', TextType::class, [
            	'label' => 'Entreprise',
            	'attr' => [
        			'placeholder' => 'Entreprise',]])
            ->add('email', TextType::class, [
            	'label' => 'Email',
            	'attr' => [
        			'placeholder' => 'Email',]])
            ->add('phone', TextType::class, [
            	'label' => 'Téléphone',
            	'attr' => [
        			'placeholder' => 'Téléphone',]])
            ->add('message', TextareaType::class, [
            	'label' => 'Message',
            	'attr' => [
        			'placeholder' => 'Message',]])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\AskInfo'
        ));
    }
}
