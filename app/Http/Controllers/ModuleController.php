<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ModuleController extends Controller
{
    protected $model_list = [
        'bank' => 'App\Bank',
        'card' => 'App\Card',
        'user' => 'App\Family',
        'user' => 'App\User',
        'journal' => 'App\Journal',
    ];

    protected $current_module;
    protected $current_model;


    public function index(Request $request)
    {
        $this->current_module = $request->get('module');
        if (isset($this->model_list[$this->current_module])) {
            $this->current_model = $this->model_list[$this->current_module];
            $data = $this->current_model::paginate(5);
            return View($this->current_module . ".list", ['data' => $data]);
        }

        abort(503);
    }
}
