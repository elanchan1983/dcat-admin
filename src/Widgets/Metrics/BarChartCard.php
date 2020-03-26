<?php

namespace Dcat\Admin\Widgets\Metrics;

use Dcat\Admin\Admin;
use Dcat\Admin\Support\Helper;
use Illuminate\Contracts\Support\Renderable;

class BarChartCard extends RadialBarChartCard
{
    /**
     * 内容宽度.
     *
     * @var array
     */
    protected $contentWidth = [4, 8];

    /**
     * @var int
     */
    protected $chartHeight = 200;

    /**
     * @var int
     */
    protected $chartMarginBottom = 0;

    /**
     * @var bool
     */
    protected $chartPullRight = true;

    /**
     * 图表默认配置.
     *
     * @return array
     */
    protected function defaultChartOptions()
    {
        $color = Admin::color();
        
        $colors = [
            $color->primary()
        ];

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 200,
                'sparkline' => ['enabled' => true],
                'toolbar' => ['show' => false],
            ],
            'states' => [
                'hover' => [
                    'filter' => 'none',
                ],
            ],
            'colors' => $colors,
            'series' => [
                [
                    'name' => 'Title',
                    'data' => [75, 125, 225, 175, 125, 75, 25],
                ],
            ],
            'grid' => [
                'show' => false,
                'padding' => [
                    'left' => 0,
                    'right' => 0,
                ],
            ],

            'plotOptions' => [
                'bar' => [
                    'columnWidth' => '44%',
                    'distributed' => true,
                    //'endingShape' => 'rounded',
                ],
            ],
            'tooltip' => [
                'x' => ['show' => false],
            ],
            'xaxis' => [
                'type' => 'numeric',
            ],
        ];
    }

    /**
     * 设置柱间距.
     *
     * @param string $value
     *
     * @return $this
     */
    public function chartBarColumnWidth($value)
    {
        return $this->chartOption('plotOptions.bar.columnWidth', $value);
    }
}
