# Adminer Colors

Works nicely with adminer self-update script 👉 https://gist.github.com/lucien144/dc34bb91cde424681ac1d701d7f6e8e6

Motivation: https://filip-prochazka.com/blog/obarvete-si-adminer

Thanks to [Ladislav Marek](https://github.com/lm) for making this look nicer than I did :)

## Usage

Simply add new instance of the plugin in your `$plugins` as the [official documentation states](http://www.adminer.org/cs/plugins/#use)

```php
function adminer_object() {
	// required to run any plugin
	include_once "./plugins/plugin.php";

	// autoloader
	foreach (glob("plugins/*.php") as $filename) {
		include_once "./$filename";
	}

	$plugins = array(
		// specify enabled plugins here
		new AdminerColors([
			# specify as many servers as you want
			'127.0.0.1' => '#009245',
			'dev.server.cz' => '#F7931E',
			'www.server.cz' => '#ED1C24',
			# you can use regular expression too!
			'/^192\.168\.([0-9\.]*)$/' => '#ED1C24',
		]),
	);

	return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include "./adminer.php";

```

# What you get

![preview](https://raw.githubusercontent.com/fprochazka/adminer-colors/master/docs/preview.png)
