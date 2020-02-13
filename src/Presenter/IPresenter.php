<?php
namespace TripSorter\Presenter;

/**
 * package {$package}
 * Description of Presenter
 *
 * @author dandrianarinivo
 * @version 1.0
 */
 interface IPresenter{
    public function setData($aData);
    public function getData();
    public function print();
 }
