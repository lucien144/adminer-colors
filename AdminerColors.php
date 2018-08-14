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
		$color = $this->colors[$_SERVER['SERVER_ADDR']] ?? self::DEFAULT_COLOR;

		foreach ($this->colors as $pattern => $value) {
			$grep = preg_grep($pattern, [$_GET['server'], $_GET['pgsql'], $_SERVER['SERVER_NAME'], $_SERVER['SERVER_ADDR']]);
			if (!empty($grep)) {
				$color = $value;
			}
		}

		echo '<style>
			#menu { border-left: 1em solid ' . $color . '; min-height: 100%; }
			#menu h1 a { color: ' . $color . ' }
			#content { margin-left: 22em }
			#breadcrumb { left: 22em }
			</style>';
	}

}
