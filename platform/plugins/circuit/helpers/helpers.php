<?php

use Botble\Circuit\Repositories\Interfaces\CircuitInterface;
use Illuminate\Support\Arr;


if (!function_exists('get_circuits')) {
    /**
     * @param array $args
     * @return array|mixed
     */
    function get_circuits(array $args = [])
    {
        $indent = Arr::get($args, 'indent', '——');

        $repo = app(CircuitInterface::class);

        $circuits = $repo->getCircuits(Arr::get($args, 'select', ['*']), [
            'circuits.created_at' => 'DESC',
            'circuits.is_default' => 'DESC',
            'circuits.order'      => 'ASC',
        ]);

        $circuits = sort_item_with_children($circuits);

        foreach ($circuits as $circuit) {
            $indentText = '';
            $depth = (int)$circuit->depth;
            for ($index = 0; $index < $depth; $index++) {
                $indentText .= $indent;
            }
            $circuit->indent_text = $indentText;
        }

        return $circuits;
    }
}