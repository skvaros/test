<?php

class EntityManager {
	
	protected $conn;
	
	public function __construct() {
		// dibi::connect(Environment::getConfig('database'));
		// $this->conn = dibi::getConnection();
	}
	
	public function persist($entity) {
		$table = getTable($entity);
		$data = getData($entity);
		
		$insert = $this->conn->insert($table, $data);
		$return = $insert->execute(dibi::IDENTIFIER);
		
		return $return;
	}
	
	public function find($entity, $id, $idColumn = 'id') {
		$table = getTable($entity);
		$where = buildWhere($idColumn, $id);
		
		$select = $this->conn->select('*')->from($table);
		$return = $select->where($where, $id);
		
		return $return;
	}
	
	public function remove($entity) {
		$table = getTable($entity);
		$idColumn = key($data);
		$id = array_shift($data);
		$where = buildWhere($idColumn, $id);
		
		$delete = $this->conn->delete($table);
		$return = $delete->where($where, $id)->execute();
		
		return $return;
	}
	
	public function merge($entity) {
		$table = getTable($entity);
		$data = getData($entity);
		$idColumn = key($data);
		$id = array_shift($data);
		$where = buildWhere($idColumn, $id);
		
		$update = $this->conn->update($table, $data);
		$return = $update->where($where, $id)->execute();
		
		return $return;
	}
	
	protected function getTable($entity) {
		$class = get_class($entity);
		$class = strToLower($class);
		$table = str_replace("entity", "", $class);
		if ($table == "") {
			throw new InvalidArgumentException("Argument '". $class ."' must be an Entity");
		}
		
		return $table;
	}
	
	protected function getData($entity) {
		$reflection = new ReflectionObject($entity);
		$properties = $reflection->getProperties(ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED);
		$data = array();
		
		foreach ($properties as $property) {
			$propertyName = $property->getName();
			$propertyGetter = array($entity, 'get'. UCFirst($propertyName));
			
			if (!is_callable($propertyGetter)) {
				throw new RuntimeException("Entity '". get_class($entity) ."' must implement 'get". UCFirst($propertyName) ."' method");
			}
			$propertyValue = call_user_func($propertyGetter);
			
			if ($propertyValue != null) {
				$data[$propertyName] = $propertyValue;
			}
		}
		
		return $data;
	}
	
	protected function buildWhere($idColumn, $id) {
		if (is_int($id)) {
			$where = $idColumn.'=%i';
		} else {
			$where = $idColumn.'=%s';
		}
		
		return $where;
	}
}
