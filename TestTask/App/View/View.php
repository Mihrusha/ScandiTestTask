<?php

namespace App\View;

class View
{
    public function Show($books=null,$discs=null,$furns=null)
    {
        include_once 'App\View\MainView.php';
    }

    public function Change($data=null)
    {
        include_once 'App\View\AddView.php';
    }
}
