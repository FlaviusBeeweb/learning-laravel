<?php
/**
 * Created by PhpStorm.
 * User: flavius
 * Date: 02.08.2018
 * Time: 20:59
 */

namespace App\Http\Composers;


use Illuminate\View\View;

class NavigationComposer
{

    public function compose(View $view){
        $view->with('latest', \App\Article::latest()->first());
    }
}