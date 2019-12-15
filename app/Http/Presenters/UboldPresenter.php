<?php

namespace App\Http\Presenters;

use Nwidart\Menus\Presenters\Presenter;

class UboldPresenter extends Presenter
{
	/**
	 * {@inheritdoc }
	 */
	public function getOpenTagWrapper()
	{
		return  PHP_EOL . '<ul>' . PHP_EOL;
	}

	/**
	 * {@inheritdoc }
	 */
	public function getCloseTagWrapper()
	{
		return  PHP_EOL . '</ul>' . PHP_EOL;
	}

	/**
	 * {@inheritdoc }
	 */
	public function getMenuWithoutDropdownWrapper($item)
	{
		// dd($item);
		return '<li class="has_sub"><a href="'. $item->getUrl() .'" class="waves-effect">'.$item->getIcon().'<span>'.$item->title.'</span></a> </li>';
	}

	/**
	 * {@inheritdoc }
	 */
	public function getActiveState($item)
	{
		return \Request::is($item->getRequest()) ? ' class="active"' : null;
	}

	/**
	 * {@inheritdoc }
	 */
	public function getDividerWrapper()
	{
		return '<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left"></div>';
	}

	/**
	 * {@inheritdoc }
	 */
	public function getMenuWithDropDownWrapper($item)
	{
		return '<li class="has_sub"><a href="javascript:void(0);" class="waves-effect">'.$item->getIcon().' <span> '.$item->title.' </span> <span class="menu-arrow"></span> </a>
			<ul class="list-unstyled">
				'.$this->getChildMenuItems($item).'
			</ul>
		</li>' . PHP_EOL;
		;
		// $item->getIcon()
	}

	public function getMultiLevelDropdownWrapper($item)
    {
		return '<li class="has_sub"><a href="javascript:void(0);" class="waves-effect">'.$item->getIcon().' <span> '.$item->title.' </span> <span class="menu-arrow"></span> </a>
			<ul class="list-unstyled">
				'.$this->getChildMenuItems($item).'
			</ul>
		</li>' . PHP_EOL;
		;
    }
}