<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class MemberType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null,[
            	'attr' => ['placeholder' => 'Prénom']])
            ->add('name', null, [
            	'attr' => ['placeholder' => 'Nom']])
            ->add('username', null, [
            	'attr' => ['placeholder' => 'Username']])
            ->add('password', PasswordType::class, [
            	'required' => false,
            	'attr' => ['placeholder' => 'Password']])
            ->add('email', null, [
            	'attr' => ['placeholder' => 'Email']])
            ->add('description', null, [
            	'attr' => ['placeholder' => 'Description']])
            ->add('mobile', null, [
            	'attr' => ['placeholder' => 'Mobile']])
            ->add('address', null, [
            	'attr' => ['placeholder' => 'Adresse']])
            ->add('cityOfBirth', null, [
            	'attr' => ['placeholder' => 'Ville de naissance']])
            ->add('studentCardPath', null, [
            	'attr' => ['placeholder' => 'Carte étudiante']])
            ->add('idCardPath', null, [
            	'attr' => ['placeholder' => 'Carte d\'identité']])
            ->add('cvPath', null, [
            	'attr' => ['placeholder' => 'CV']])
            ->add('licensePath', null, [
            	'attr' => ['placeholder' => 'Permis']])
            ->add('grayCardPath', null, [
            	'attr' => ['placeholder' => 'Carte grise']])
            ->add('image', null, [
            	'attr' => ['placeholder' => 'Image']])
            ->add('isImportant', null, [
            	'attr' => ['placeholder' => 'Password']])
            ->add('hasKey', null, [
            	'attr' => ['placeholder' => 'Password']])
            ->add('isActive', null, [
            	'attr' => ['placeholder' => 'Password']])
            ->add('job', null, [
            	'attr' => ['placeholder' => 'Password']])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Member'
        ));
    }
}
