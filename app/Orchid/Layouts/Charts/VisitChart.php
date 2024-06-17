<?php

namespace App\Orchid\Layouts\Charts;

use Orchid\Screen\Layouts\Chart;
use App\Models\User;

class VisitChart extends Chart
{
    /**
     * Available options:
     * 'bar', 'line',
     * 'pie', 'percentage'.
     *
     * @var string
     */
    protected $type = 'pie';


    public $title = 'Оценка пользователей';

    /**
     * Determines whether to display the export button.
     *
     * @var bool
     */
    protected $export = true;
    protected $target = 'visitChart';
}
