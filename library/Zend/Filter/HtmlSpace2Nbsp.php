<?php

require_once 'Zend/Filter/Interface.php';

class Zend_Filter_HtmlSpace2Nbsp implements Zend_Filter_Interface
{
    

    /**
     * Defined by Zend_Filter_Interface
     *
     * Returns the string $value, converting characters to their corresponding HTML entity
     * equivalents where they exist
     *
     * @param  string $value
     * @return string
     */
    public function filter($value)
    {
    	$filtered = str_replace(' ', '&nbsp;', $value);
        return $filtered;
    }
}
