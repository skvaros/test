<?php

require_once $PROJECT_DIR .'/Model/dao/EntityManager.php';
require_once $PROJECT_DIR .'/Model/entity/PageEntity.php';

class EntityManagerMock extends EntityManager {

	public function getTable($entity) {
		return parent::getTable($entity);
	}
	
	public function getData($entity) {
		return parent::getData($entity);
	}
}

class BadEntity {
	private $id;
}

class EntityManagerTest extends PHPUnit_Framework_TestCase
{
	private $em;
	
	public function setUp() {
		$this->em = new EntityManagerMock();
	}
	
	public function testGetTablePrivate() {
		$pageClass = new PageEntity();
		
		$this->assertEquals('page', $this->em->getTable($pageClass));
	}
	
	public function testGetData() {
		$pageClass = new PageEntity();
		$pageClass->setId(1);
		$pageClass->setUrl('url');
		
		$pageArray = array(
			'id' => 1,
    		'url' => 'url',
		);
		
		$this->assertEquals($pageArray, $this->em->getData($pageClass));
	}
	
	public function testGetDataWithNull() {
		$pageClass = new PageEntity();
		$pageClass->setUrl('url');
		
		$pageArray = array(
    		'url' => 'url',
		);
		
		$this->assertEquals($pageArray, $this->em->getData($pageClass));
	}
	
	public function testGetDataException() {
		try {
			$badEntity = new BadEntity();
			$this->em->getData($badEntity);
		} catch(RuntimeException $expected) {
			return;
		}
		$this->fail();
	}
	
	public function tearDown() {
		$this->em = null;
	}
}

