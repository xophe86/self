<?php

namespace Innova\SelfBundle\Form\Type\Right;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RightUserGroupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('user', 'entity', array(
                'class' => 'InnovaSelfBundle:User',
                'property' => 'username',
                'attr' => array('class' => 'form-control', 'data-field' => 'user'),
                'label'  => 'user.single',
                'translation_domain' => 'messages',
            ));

        $builder->add('canEdit', 'choice', array(
                'choices'   => array('0' => 'generic.no', '1' => 'generic.yes'),
                'attr' => array('class' => 'form-control', 'data-field' => 'canEdit'),
                'label'  => 'canEdit',
                'translation_domain' => 'messages',
            ));

        $builder->add('canDelete', 'choice', array(
                'choices'   => array('0' => 'generic.no', '1' => 'generic.yes'),
                'attr' => array('class' => 'form-control', 'data-field' => 'canDelete'),
                'label'  => 'canDelete',
                'translation_domain' => 'messages',
            ));

        $builder->add('canImportCsv', 'choice', array(
                'choices'   => array('0' => 'generic.no', '1' => 'generic.yes'),
                'attr' => array('class' => 'form-control', 'data-field' => 'canImportCsv'),
                'label'  => 'canImportCsv',
                'translation_domain' => 'messages',
            ));

        $builder->add('save', 'submit', array(
                'label' => 'generic.save',
                'attr' => array('class' => 'btn btn-default btn-primary'),
            ));
    }

    public function getName()
    {
        return 'right_user_group';
    }
}
