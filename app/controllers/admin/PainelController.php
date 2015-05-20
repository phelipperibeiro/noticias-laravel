<?php

namespace app\controllers\admin;

class PainelController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct() {
        $this->beforeFilter('authAdmin');
    }

    public function index() {
        return \View::make('admin.painel.home');
    }

}
