<?php

namespace app\controllers\site;

class HomeController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() 
    { 
        $data = ['titulo' => 'Página Inicial'];
        
        return \View::make('site.home')->with($data);
    }

}
