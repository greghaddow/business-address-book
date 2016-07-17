<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('salutation')
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('organisation')
            ->add('jobTitle')
            ->add('phoneNumber')
            ->add('extension')
            ->add('homePage')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('salutation')
            ->add('firstName')
            ->add('lastName')
            ->addIdentifier('organisation')
            ->add('email')
            ->add('jobTitle')
            ->add('phoneNumber')
            ->add('extension')
            ->add('homePage')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('salutation', ChoiceType::class, [
            'choices' =>
              [
                'Mr'  => 'Mr',
                'Ms'  => 'Ms',
                'Mrs' => 'Mrs',
                'Dr'  => 'Dr'
              ]
            ])
            ->add('firstName')
            ->add('lastName')
            ->add('organisation', 'sonata_type_model_list', [])
            ->add('email', EmailType::class)
            ->add('jobTitle')
            ->add('phoneNumber')
            ->add('extension')
            ->add('homePage')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('salutation')
            ->add('firstName')
            ->add('lastName')
            ->add('organisation')
            ->add('email')
            ->add('jobTitle')
            ->add('phoneNumber')
            ->add('extension')
            ->add('homePage')
        ;
    }
}
