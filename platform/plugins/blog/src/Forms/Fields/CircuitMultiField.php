<?php

namespace Botble\Blog\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class CircuitMultiField extends FormField
{

    /**
     * {@inheritDoc}
     */
    protected function getTemplate()
    {
        return 'plugins/blog::circuits.circuits-multi';
    }
}
