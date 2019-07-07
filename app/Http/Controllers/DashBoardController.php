<?php
/**
 * Created by IntelliJ IDEA.
 * User: Damith Thiwanka
 * Date: 7/6/2019
 * Time: 3:50 PM
 */

namespace App\Http\Controllers;


class DashBoardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
}
