<?php

use Core\Component;
use Core\View;

if($page == LISTS) Component::render(
    View::component('managers/list/head', ['user' => $other]),
    View::component('managers/list/body', ['user' => $other]),
);

if($page == DETAILS) Component::render(
    View::component('managers/details/body')
);