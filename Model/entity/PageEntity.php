<?php

require_once './../../../NetteFramework-0.9.5-PHP5.2/3rdParty/dibi/dibi/libs/DibiRow.php'; // TODO: remove

/** @entity */
class PageEntity extends DibiRow {
	/** @id @generatedValue @column(type="integer") */
	protected $id;
	
	/** @column(length=255) */
	protected $url;
	
	/*public function __construct($arr) {
		parent::__construnct($arr);
		TODO: use setters
	}*/
	
	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		if (!is_int($id) && !is_null($id)) {
			throw new InvalidArgumentException("Argument must be an integer or null");
		}

		$this->id = $id;
	}
	
	public function getUrl() {
		return $this->url;
	}
	
	public function setUrl($url) {
		if (!is_string($url) && !is_null($url)) {
			throw new InvalidArgumentException("Argument must be a string or null");
		}
		
		$this->url = $url;
	}
	
	public function toArray() {
		return (array) $this;
	}
}

