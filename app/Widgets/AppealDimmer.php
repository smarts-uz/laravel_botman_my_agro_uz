<?php

namespace App\Widgets;

use App\Models\Appeal;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class AppealDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Appeal::count();
        $string = trans_choice('voyager::dimmer.post', $count);
        $string = "Заявления";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.post_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => 'View all appeals',
                'link' => route('voyager.appeals.index'),
            ],
            'image' => "https://www.solidbackgrounds.com/images/1920x1080/1920x1080-red-solid-color-background.jpg",
        ]));
    }


}
