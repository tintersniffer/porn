<?php
namespace My\Monitor;
use Doctrine\DBAL\Logging\SQLLogger;
use My\AbstractClass\Singleton;
class MySQLLogger extends Singleton implements SQLLogger{	
	public function startQuery($sql, array $params = null, array $types = null){		
	}
	public function stopQuery(){		
	}
}