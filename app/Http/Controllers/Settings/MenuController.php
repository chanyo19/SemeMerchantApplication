<?php

namespace App\Http\Controllers\Settings;

use App\Repositories\Settings\Menu\MenuRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * @var MenuRepositoryInterface
     */
    private $menuRepository;

    /**
     * MenuController constructor.
     * @param MenuRepositoryInterface $menuRepository
     */
    public function __construct(MenuRepositoryInterface $menuRepository)
    {
        $this->middleware('auth');
        $this->menuRepository = $menuRepository;
    }

    /**
     *
     */
    public function index(){

        return view('setting.menu-add');
    }

    /**
     * @param Request $request
     */
    public function addMenu(Request $request){

        if($request){
            $this->menuRepository->addMenu($request->only(['menu_name','route','order']));
        }


    }
}
