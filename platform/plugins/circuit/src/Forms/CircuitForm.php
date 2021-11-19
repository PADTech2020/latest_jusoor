<?php

namespace Botble\Circuit\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Circuit\Http\Requests\CircuitRequest;
use Botble\Circuit\Models\Circuit;

class CircuitForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $list = get_circuits();

        $circuits = [];
        foreach ($list as $row) {
            if ($this->getModel() && ($this->model->id === $row->id || $this->model->id === $row->parent_id)) {
                continue;
            }

            $circuits[$row->id] = $row->indent_text . ' ' . $row->name;
        }
        $circuits = [0 => trans('plugins/blog::circuits.none')] + $circuits;


        $this
            ->setupModel(new Circuit)
            ->setValidatorClass(CircuitRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('desc', 'text', [
                'label'      => trans('core/base::forms.desc'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->add('parent_id', 'customSelect', [
                'label'      => trans('core/base::forms.parent'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'select-search-full',
                ],
                'choices'    => $circuits,
            ])
            ->setBreakFieldPoint('status');
    }
}
