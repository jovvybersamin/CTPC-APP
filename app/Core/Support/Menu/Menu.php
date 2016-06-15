<?php

namespace OneStop\Core\Support\Menu;

use Illuminate\Support\Collection;


class Menu
{
	protected $containers = [];

	public function __construct()
	{

	}

	public function addContainer($container)
	{
		$this->containers[$container] = new Container($container);
	}

	public function container($container)
	{
		if(array_key_exists($container, $this->containers))
		{
			return $this->containers[$container];
		}
	}

	public function getContainers()
	{
		return $this->containers;
	}

	public static function __callStatic($method, $arguments)
	{
		if(method_exists($this,$method)){

		}
	}

}

class Container
{
	protected $name = '';

	protected $items = [];

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function addMenu($title,$route)
	{
		$item = new MenuItem($title,$route);
		$this->items[] = $item;
		return $this;
	}

	public function find($title,$items = null)
	{
		$items = ($items != null) ? $items : $this->items;
		foreach ($items as $key => $item) {
			if($item->getTitle() == $title) {
				return $item;
			}else{
				if($item->hasChildren()){
					if(($find = $this->find($title,$item->getChildrens())) != null){
						return $find;
					}
				}
			}
		}
		return null;
	}

}

class MenuItem
{
	protected $title;

	protected $route;

	protected $childrens = [];

	public function __construct($title,$route)
	{
		$this->title = $title;

		$this->route = $route;
	}

	public function addSubMenu($title,$route)
	{
		$children = new static($title,$route);
		$this->childrens[] = $children;
		return $this;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getRoute()
	{
		return $this->route;
	}


	public function getChildrens()
	{
		return $this->childrens;
	}

	public function hasChildren()
	{
		return count($this->childrens);
	}

	public function __toString()
	{
		return $this->title;
	}



}

