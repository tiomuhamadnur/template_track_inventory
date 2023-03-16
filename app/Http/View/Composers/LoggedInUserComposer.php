<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class LoggedInUserComposer
{
    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('loggedin_user', request()->user());
    }
}
