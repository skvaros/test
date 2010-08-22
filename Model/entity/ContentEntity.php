<?php

class ContentEntity {
	// @int
	private $pageId;
	// @String(2)
	private $lang;
	// @String
	private $content;
	
	public __construct($name, $content) {
		$this->setName($name);
		$this->setContent($content);
	}
	
	public getPageId() {
		return $this->pageId;
	}
	
	public setPageId($pageId) {
		if (!is_int($pageId)) {
			throw new IllegalArgumentException("Argument must be an integer");
		}

		$this->pageId = $pageId;
	}
	
	public getLang() {
		return $this->lang;
	}
	
	public setLang($lang) {
		if (!is_string($lang) || length($lang) != 2) {
			throw new IllegalArgumentException("Argument must be 2 chars");
		}
		
		$this->lang = $lang;
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

