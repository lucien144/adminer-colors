<?php


class AdminerColors
{
	const DEFAULT_COLOR = '#f00';

	private $colors;

	public function __construct($colors)
	{
		$this->colors = $colors;
	}

	public function head()
	{
		$color = $this->colors[$_GET['server']] ?? self::DEFAULT_COLOR;
		$color = $this->colors[$_GET['pgsql']] ?? self::DEFAULT_COLOR;
		$color = $this->colors[$_SERVER['SERVER_NAME']] ?? self::DEFAULT_COLOR;

		echo '<style>
			#menu { border-left: 1em solid ' . $color . '; min-height: 100%; }
			#menu h1 a { color: ' . $color . ' }
			#content { margin-left: 22em }
			#breadcrumb { left: 22em }
			</style>';
	}

}
