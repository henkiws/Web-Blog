<?php

namespace App\Http\Presenters;

use Nwidart\Menus\Presenters\Presenter;

class MetronicPresenter extends Presenter
{
	/**
	 * {@inheritdoc }
	 */
	public function getOpenTagWrapper()
	{
		return  PHP_EOL . '<ul class="kt-menu__nav">' . PHP_EOL;
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
		return '<li class="'.(\Request::url() == $item->getUrl() ? "kt-menu__item kt-menu__item kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open-dropdown" : "kt-menu__item").' aria-haspopup="true" '.$this->getActiveState($item).'><a href="'. $item->getUrl() .'" class="kt-menu__link"><i '.$item->getIcon().'><span></span></i> <span class="kt-menu__link-text">'.$item->title.'</span></a> </li>';
	}

	/**
	 * {@inheritdoc }
	 */
	public function getActiveState($item)
	{
		return \Request::is($item->getRequest()) ? ' class="kt-menu__item kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open-dropdown"' : 'hehe';
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
		return '<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i '.$item->getIcon().'><span></span></i><span class="kt-menu__link-text">'.$item->title.'</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
			<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
				<ul class="kt-menu__subnav">
					'.$this->getChildMenuItems($item).'
				</ul>
			</div>
		</li>' . PHP_EOL;
		;
		// $item->getIcon()
	}

	public function getMultiLevelDropdownWrapper($item)
    {
		return '
					<li class="kt-menu__item kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle">
					<i '.$item->getIcon().'><span></span></i><span class="kt-menu__link-text">'.$item->title.'</span><i class="kt-menu__hor-arrow la la-angle-right"></i><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
							<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
								<ul class="kt-menu__subnav">
								'.$this->getChildMenuItems($item).'
								</ul>
							</div>
					</li>' . PHP_EOL;
		;
    }
}