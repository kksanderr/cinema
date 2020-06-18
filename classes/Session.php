<?php


class Session {
	public static function exists($name) {
		return (isset($_SESSION[$name])) ? true : false;
	}

	public static function set($key, $value) {
		return $_SESSION[$key] = $value;
	}

	public static function get($name) {
		return $_SESSION[$name];
	}

	public static function delete($name) {
		if (self::exists($name)) {
			unset($_SESSION[$name]);
		}
	}

	public static function message($key) {
		if(self::exists($key)) {
			$message = self::get($key);
			self::delete($key);
			return $message;
		} 
		return null;
	}

    // ...
}