<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class DualListBoxType extends EntityType
{

    // TODO: add duallistbox class to self => jquery duallistbox

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);

        $classes = explode(' ', $view->vars['attr']['class'] ?? '');
        $classes[] = 'dualListBox';
        $class = implode(' ', $classes);

        $view->vars = array_merge($view->vars, [
            'attr' => [
                'class' => $class,
            ],
        ]);
    }

}