<?php

use Core\Component;
use Core\View;

if ($page == LISTS) Component::render(
    View::component('account/list/head'),
    View::component('account/list/body')
);

if ($page == DETAILS) Component::render(
    View::component('account/details/head'),
    View::component('account/details/body')
);
