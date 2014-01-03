<?php

require_once 'Zend/Filter/Interface.php';

class Zend_Filter_HtmlNbsp2Space implements Zend_Filter_Interface
{
    

    /**
     *
     * @param  string $value
     * @return string
     */
    public function filter($value)
    {
    	$filtered = str_replace('&nbsp;', ' ', $value);
        return $filtered;
    }
}
