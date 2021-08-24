<?php

namespace App\Middleware;

use Psr\Container\ContainerInterface;

abstract class Middleware
{
	protected $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}
}