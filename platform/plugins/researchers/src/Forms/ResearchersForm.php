<?php

namespace Botble\Researchers\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Researchers\Http\Requests\ResearchersRequest;
use Botble\Researchers\Models\Researchers;

class ResearchersForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */

    public function buildForm()
    {
        $this
            ->setupModel(new Researchers)
            ->setValidatorClass(ResearchersRequest::class)
            ->withCustomFields()
            ->add('image', 'mediaImage', [
                'label' => __('Field label'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('name', 'text', [
                'label' => trans('plugins/researchers::researchers.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [

                    'data-counter' => 120,
                ],
            ])
            ->add('position', 'text', [
                'label' => trans('plugins/researchers::researchers.position'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [

                    'data-counter' => 120,
                ],
            ])

             ->add('summary', 'textarea', [
        'label' => __('summary'),
        'label_attr' => ['class' => 'control-label'],
        'attr' => [
            'with-short-code' => false, // if true, it will add a button to select shortcode
            'without-buttons' => false, // if true, all buttons will be hidden
        ],
    ])
            ->add('content', 'editor', [
                'label' => __('content'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'with-short-code' => false, // if true, it will add a button to select shortcode
                    'without-buttons' => false, // if true, all buttons will be hidden
                ],
            ])
            ->add('facebook', 'text', [
                'label' => trans('plugins/researchers::researchers.facebook'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'data-counter' => 120,
                ],
            ])
            ->add('twitter', 'text', [
                'label' => trans('plugins/researchers::researchers.twitter'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'data-counter' => 120,
                ],
            ])
            ->add('instagram', 'text', [
                'label' => trans('plugins/researchers::researchers.instagram'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'data-counter' => 120,
                ],
            ])

            ->add('status', 'select', [
                'label' => trans('plugins/researchers::researchers.status'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => [
                    1 => trans('plugins/researchers::researchers.activated'),
                    0 => trans('plugins/researchers::researchers.deactivated'),
                ],
            ])
            ->setBreakFieldPoint('status');
    }
}
