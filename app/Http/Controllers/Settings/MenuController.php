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
        $this->menuRepository = $menuRepository;
    }

    /**
     *
     */
    public function index(){

        return view('setting.menu-add');
    }
    /**
     *
     */
    public function addMenu(){

        $data=$this->request()->all();

    }
}
