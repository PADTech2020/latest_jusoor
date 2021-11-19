<?php

namespace Botble\Slider\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Slider\Http\Requests\SliderRequest;
use Botble\Slider\Models\Slider;

class SliderForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $this
            ->setupModel(new Slider)
            ->setValidatorClass(SliderRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            
            ->add('image', 'mediaImage', [
                'label' => __('Image'),
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('content', 'editor', [
                'label' => __('content'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'with-short-code' => false, // if true, it will add a button to select shortcode
                    'without-buttons' => false, // if true, all buttons will be hidden
                    'data-counter' => 255,
                ],
            ])
            ->add('url', 'text', [
                'label'      => trans('plugins/slider::slider.url'),
                'label_attr' => ['class' => 'control-label '],
                'attr'       => [
                    'data-counter' => 255,
                ],
            ])
            ->add('category', 'text', [
                'label'      => trans('plugins/slider::slider.category'),
                'label_attr' => ['class' => 'control-label '],
                'attr'       => [
                    'data-counter' => 255,
                ],
            ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label '],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status');
    }
}
