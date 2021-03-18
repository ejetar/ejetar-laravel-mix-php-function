<?php
/**
 * Determine if a given string starts with a given substring.
 *
 * @param string $haystack
 * @param string|string[] $needles
 * @return bool
 */
function startsWith($haystack, $needles) {
	foreach ((array)$needles as $needle) {
		if ((string)$needle !== '' && strncmp($haystack, $needle, strlen($needle)) === 0) {
			return true;
		}
	}

	return false;
}

/**
 * Get the path to a versioned Mix file.
 *
 * @param string $path
 * @param string $manifestDirectory
 * @return string
 *
 * @throws \Exception
 */
function mix($path, $manifestDirectory = '') {
	$manifests = [];

	if (!startsWith($path, '/')) {
		$path = "/{$path}";
	}

	if ($manifestDirectory && !startsWith($manifestDirectory, '/')) {
		$manifestDirectory = "/{$manifestDirectory}";
	}

	$manifestPathWeb = $manifestDirectory . '/mix-manifest.json';
	$manifestPathOS = getcwd() . $manifestPathWeb;

	if (!isset($manifests[$manifestPathWeb])) {
		if (!file_exists($manifestPathOS)) {
			throw new Exception('The Mix manifest does not exist.');
		}

		$manifests[$manifestPathWeb] = json_decode(file_get_contents($manifestPathOS), true);
	}

	$manifest = $manifests[$manifestPathWeb];

	if (!isset($manifest[$path]))
		throw new Exception("Unable to locate Mix file: {$path}.");

	$mix_url = defined('MIX_ASSET_URL') ? constant('MIX_ASSET_URL') : '';
	return "{$mix_url}{$manifestDirectory}{$manifest[$path]}";
}
