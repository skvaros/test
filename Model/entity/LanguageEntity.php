<?php

class LanguageEntity {
	// @String(2)
	private $code;
	// @String
	private $name;
	
	public __construct($url = null) {
		if ($url != null) {
			$this->setUrl($url);
		}
	}
	
	public getCode() {
		return $this->code;
	}
	
	public setCode($code) {
		if (!is_string($id) || length($code) != 2) {
			throw new IllegalArgumentException("Argument must be 2 letters");
		}

		$this->code = $code;
	}
	
	public getName() {
		return $this->name;
	}
	
	public setName($name) {
		if (!is_string($name)) {
			throw new IllegalArgumentException("Argument must be a string");
		}
		
		$this->name = $name;
	}
}

