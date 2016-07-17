<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OrganisationAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('address1')
            ->add('address2')
            ->add('address3')
            ->add('city')
            ->add('postcode')
            ->add('county')
            ->add('country')
            ->add('primaryContact')
            ->add('contacts')
            ->add('phoneNumber')
            ->add('webAddress')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('address1')
            ->add('city')
            ->add('postcode')
            ->add('county')
            ->add('country')
            ->addIdentifier('primaryContact')
            ->add('contacts')
            ->add('phoneNumber', 'tel')
            ->add('webAddress', 'url')
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
    {$subject = $this->getSubject();
        $formMapper->tab('Company Details')
          ->with('Company Details')
            ->add('name')
            ->add('address1')
            ->add('address2')
            ->add('address3')
            ->add('city')
            ->add('postcode')
            ->add('county')
            ->add('country')
            ->add('phoneNumber')
            ->add('webAddress')
          ->end()
          ->end();
        $formMapper->tab('Contacts')->with('Contacts')

            ->add('primaryContact', EntityType::class, [
                'required' => false,
                'class' => 'AppBundle\Entity\Contact',
                'query_builder' => function (\AppBundle\Repository\ContactRepository $repository)
                    {
                        $subject = $this->getSubject();
                        if($subject->getId()) {
                            return $repository->createQueryBuilder('c')
                              ->where('c.organisation = ?1')
                              ->setParameter(1, $subject)
                              ->add('orderBy', 'c.lastName ASC');
                        }
                    }
            ])
            ->add('contacts', EntityType::class, [
              'required' => false,
              'class' => 'AppBundle\Entity\Contact',
              'multiple' => true,
              'by_reference' => false
            ])
      ->end()
      ->end();
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('primaryContact')
            ->add('contacts')
            ->add('address1')
            ->add('address2')
            ->add('address3')
            ->add('city')
            ->add('postcode')
            ->add('county')
            ->add('country')
            ->add('phoneNumber')
            ->add('webAddress', 'url')
        ;
    }

}
