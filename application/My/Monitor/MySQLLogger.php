<?php
namespace My\Monitor;
use Doctrine\DBAL\Logging\SQLLogger;

class MySQLLogger implements SQLLogger{	
	public function startQuery($sql, array $params = null, array $types = null){		
	}
	public function stopQuery(){		
	}
}