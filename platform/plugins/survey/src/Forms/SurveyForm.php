<?php

namespace Botble\Survey\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Survey\Http\Requests\SurveyRequest;
use Botble\Survey\Models\Survey;

class SurveyForm extends FormAbstract
{

    /**
     * {@inheritDoc}



     */
    public function buildForm()
    {
        $this
            ->setupModel(new Survey)
            ->setValidatorClass(SurveyRequest::class)
            ->withCustomFields()
            ->add('style1', 'html', [
                'html' => '<div class="col-12"><div class="row">',
            ])
            ->add('name', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 255,
                ],
            ])
            ->add('question', 'textarea', [
                'label'      => trans('Question'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 255,
                ],
            ])
            ->add('option_1', 'text', [
                'label'      => trans('Option 1'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [

                    'data-counter' => 220,
                ],
                'wrapper' => [
                    'class' => 'form-group col-6 col-sm-6 ',
                ],
            ])
            ->add('option_2', 'text', [
                'label'      => trans('Option 2'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [

                    'data-counter' => 220,
                ],
                'wrapper' => [
                    'class' => 'form-group col-6 col-sm-6 ',
                ],
            ])
            ->add('option_3', 'text', [
                'label'      => trans('Option 3'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'data-counter' => 220,
                ],
                'wrapper' => [
                    'class' => 'form-group col-6 col-sm-6 ',
                ],
            ])
            ->add('option_4', 'text', [
                'label'      => trans('Option 4'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'data-counter' => 220,
                ],
                'wrapper' => [
                    'class' => 'form-group col-6 col-sm-6 ',
                ],
            ])
            ->add('start_date', 'text', [
                'label'         => __('Start Date'),
                'label_attr'    => ['class' => 'control-label'],
                'attr'          => [
                    'class'            => 'form-control datepicker',
                    'data-date-format' => 'yyyy-mm-dd',
                ],
                'default_value' => now(config('app.timezone'))->format('Y-m-d'),
                'wrapper' => [
                    'class' => 'form-group col-6 col-sm-6 ',
                ],
            ])
            ->add('end_date', 'text', [
                'label'         => __('End Date'),
                'label_attr'    => ['class' => 'control-label'],
                'attr'          => [
                    'class'            => 'form-control datepicker',
                    'data-date-format' => 'yyyy-mm-dd',
                ],
                'default_value' => now(config('app.timezone'))->format('Y-m-d'),
                'wrapper' => [
                    'class' => 'form-group col-6 col-sm-6 ',
                ],
            ])
            ->add('style2', 'html', [
                'html' => '</div></div>',
            ])
            ->add('type', 'select', [ // Change "select" to "customSelect" for better UI
                'label'      => __('Type'),
                'label_attr' => ['class' => 'control-label required'], // Add class "required" if that is mandatory field
                'choices'    => [
                    1 => __('Multiple choice questions'),
                    2 => __('Yes/No questions'),
                ],
            ])
            ->add('home_page_only', 'onOff', [
                'label'         => __('Home Page Only'),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => 0,
            ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status');
    }
}
