<?php

class TemplateEntity {
	// @String
	private $name;
	// @String
	private $content;
	
	public __construct($name, $content) {
		$this->setName($name);
		$this->setContent($content);
	}
	
	public getName() {
		return $this->name;
	}
	
	public setName($name) {
		if (!is_string($id)) {
			throw new IllegalArgumentException("Argument must be a string");
		}

		$this->name = $name;
	}
	
	public getContent() {
		return $this->content;
	}
	
	public setContent($content) {
		if (!is_string($content)) {
			throw new IllegalArgumentException("Argument must be a string");
		}
		
		$this->content = $content;
	}
}

