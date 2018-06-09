<?php
/**
 * Created by PhpStorm.
 * User: wilder19
 * Date: 09/06/18
 * Time: 11:13
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName')
        ->add('lastName')
        ->add('phoneNumber')
        ->add('birthDate')
        ->add('creationDate', DateTimeType::class, ['required' => false])
        ->add('note', IntegerType::class, ['required' => false])
        ->add('isAcertifiedPilot');
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    /*// For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }*/
}