<?php
namespace App\Repositories\Settings\Menu;
use App\Models\Menu;

class MenuRepository implements MenuRepositoryInterface{
    /**
     * @var Menu
     */
    private $menu;

    /**
     * MenuRepository constructor.
     * @param Menu $menu
     */
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    /**Add menu item
     * @param array $data
     * @return mixed
     */
    public function addMenu(array $data)
    {
        // TODO: Implement addMenu() method.
        $this->menu->updateOrcreate(
            $data
        );
    }

    /**Get all active menu
     * @return mixed
     */
    public function getMenus()
    {
        // TODO: Implement getMenus() method.
    }

    /**Get single menu item
     * @param $id
     * @return mixed
     */
    public function getSingleMenuItem($id)
    {
        // TODO: Implement getSingleMenuItem() method.
    }

    /**Deactive single menu
     * @param $id
     * @return mixed
     */
    public function deactiveMenuItem($id)
    {
        // TODO: Implement deactiveMenuItem() method.
    }
}