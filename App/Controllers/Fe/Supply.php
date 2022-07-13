<?php
namespace App\Controllers\Fe;

use App\Controllers\Authenticated\Admin;
use App\Models\Supply as ModelsSupply;
use Core\View;

class Supply extends Admin
{
    public function _list()
    {
        View::draw('supply/index', [
            '_authority' => $this->user->authority,
            'page' => LISTS
        ]);
    }
    public function _supply()
    {
        View::draw('supply/index', [
            '_authority' => $this->user->authority
        ]);
    }
}