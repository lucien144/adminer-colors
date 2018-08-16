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
		$servers = [$_GET['server'], $_GET['pgsql'], $_SERVER['SERVER_NAME'], $_SERVER['SERVER_ADDR']];

		// Match servers
		foreach ($servers as $server) {
			$color = $this->colors[$server] ?? self::DEFAULT_COLOR;
		}

		// Match regexpx
		foreach ($this->colors as $pattern => $value) {
			if (@preg_match($pattern, null) !== false) {
				$grep = preg_grep($pattern, $servers);
				if (!empty($grep)) {
					$color = $value;
				}
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
