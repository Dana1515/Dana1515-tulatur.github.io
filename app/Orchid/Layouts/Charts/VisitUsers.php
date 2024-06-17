<?php

namespace App\Orchid\Layouts\Charts;

use Orchid\Screen\Layouts\Chart;
use App\Models\User;

class VisitUsers extends Chart
{
    /**
     * Available options:
     * 'bar', 'line',
     * 'pie', 'percentage'.
     *
     * @var string
     */
    protected $type = 'line';
    protected $title='Количество посещений';

    /**
     * Determines whether to display the export button.
     *
     * @var bool
     */
    protected $export = true;
    protected $target = 'visitUsers';


    
}
