<?php
namespace App\Repositories\Settings\Menu;
interface MenuRepositoryInterface{
    /**Add menu item
     * @param array $data
     * @return mixed
     */
    public function addMenu(array $data);

    /**Get all active menu
     * @return mixed
     */
    public function getMenus();

    /**Get single menu item
     * @param $id
     * @return mixed
     */
    public function getSingleMenuItem($id);

    /**Deactive single menu
     * @param $id
     * @return mixed
     */
    public function deactiveMenuItem($id);
}