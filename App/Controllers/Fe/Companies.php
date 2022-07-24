<?php
namespace App\Controllers\Fe;

use App\Controllers\Authenticated\Admin;
use Core\View;

class Companies extends Admin
{
    public function _companies()
    {
        View::draw('companies/index', [
            'page' => LISTS,
            '_authority' => $this->user->authority
        ]);
    }
    public function _approved()
    {
        View::draw('companies/approved', [
            'page' => LISTS,
            '_authority' => $this->user->authority
        ]);
    }
}