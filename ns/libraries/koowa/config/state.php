<?php
/**
 * @version		$Id: state.php 3750 2011-08-10 21:39:53Z johanjanssens $
 * @category	Koowa
 * @package		Koowa_Model
 * @copyright	Copyright (C) 2007 - 2010 Johan Janssens. All rights reserved.
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link     	http://www.nooku.org
 */

/**
 * State Config Class
 *
 * @author		Johan Janssens <johan@nooku.org>
 * @category	Koowa
 * @package     Koowa_Config
 */
class KConfigState extends KConfig
{
	/**
     * Retrieve a configuration item and return $default if there is no element set.
     *
     * @param string 
     * @param mixed 
     * @return mixed
     */
    public function get($name, $default = null)
    {
        $result = $default;
        if(isset($this->_data[$name])) {
            $result = $this->_data[$name]->value;
        }
        
        return $result;
    }

    /**
     * Set state value
     *
     * @param  	string 	The user-specified state name.
     * @param  	mixed  	The user-specified state value.
     * @return 	void
     */
    public function __set($name, $value)
    {
    	if(isset($this->_data[$name])) {
    		$this->_data[$name]->value = $value;
    	}
    }

    /**
     * Unset a state value
     *
     * @param   string  The column key.
     * @return  void
     */
    public function __unset($name)
    {
        if(isset($this->_data[$name])) {
            $this->_data[$name]->value = $this->_data[$name]->default;
        }
    }

    /**
     * Insert a new state
     *
     * @param   string      The name of the state
     * @param   mixed       Filter(s), can be a KFilterInterface object, a filter name or an array of filter names
     * @param   mixed       The default value of the state
     * @param   boolean     TRUE if the state uniquely indetifies an enitity, FALSE otherwise. Default FALSE.
     * @param   array       Array of required states to determine if the state is unique. Only applicable if the state is unqiue. 
     * @return  KConfigState
     */
    public function insert($name, $filter, $default = null, $unique = false, $required = array())
    {
        $state = new stdClass();
        $state->name     = $name;
        $state->filter   = $filter;
        $state->value    = $default;
        $state->unique   = $unique;
        $state->required = $required;
        $state->default  = $default;
        $this->_data[$name] = $state;

        return $this;
    }

    /**
     * Remove an existing state
     *
     * @param   string      The name of the state
     * @return  KConfigState
     */
    public function remove( $name )
    {
        unset($this->_data[$name]);
        return $this;
    }

    /**
     * Reset all state data and revert to the default state
     *
     * @param   boolean If TRUE use defaults when resetting. Default is TRUE
     * @return KConfigState
     */
    public function reset($default = true)
    {
        foreach($this->_data as $state) {
            $state->value = $default ? $state->default : null;
        }
        
        return $this;
    }
    
    /**
     * Set the state data
     *
     * @param   array|object    An associative array of state values by name
     * @return  KConfigState
     */
    public function setData(array $data)
    {
        // Filter data
        foreach($data as $key => $value)
        {
            if(isset($this->_data[$key]))
            {
                $filter = $this->_data[$key]->filter;

                if(!($filter instanceof KFilterInterface)) {
                    $filter = KFilter::factory($filter);
                }

                $this->_data[$key]->value = $filter->sanitize($value);
            }
        }

        return $this;
    }

    /**
     * Get the state data
     * 
     * This function only returns states that have been been set.
     *
     * @param   boolean If TRUE only retrieve unique state values, default FALSE
     * @return  array   An associative array of state values by name
     */
    public function getData($unique = false)
    {
        $data = array();

        foreach ($this->_data as $name => $state) 
        {
            if(isset($state->value))
            {
                //Only return unique data 
                if($unique) 
                 {
                    //Unique values cannot be null or an empty string
                    if($state->unique && (!empty($state->value) || is_numeric($state->value))) 
                    {
                        $result = true;
                        
                        //Check related states to see if they are set
                        foreach($state->required as $required)
                        {
                            if(empty($this->_data[$required]->value) && !is_numeric($state->value)) 
                            {
                                $result = false;
                                break;
                            }
                        }
                        
                        //Prepare the data to be returned. Include states
                        if($result) 
                        {
                            $data[$name] = $state->value;
                            
                            foreach($state->required as $required) {
                                $data[$required] = $this->_state[$required]->value;
                            }
                        }
                    }
                    
                } else $data[$name] = $state->value;    
            }
        }
            
        return $data;
    }
    
    /**
     * Check if the state information is unique 
     * 
     * @return  boolean TRUE if the state is unique, otherwise FALSE.
     */
    public function isUnique()
    {
        $unique = false;
        
        //Get the unique states
        $states = $this->getData(true);
        
        if(!empty($states)) 
        {
            $unique = true;
            
            //If a state contains multiple values the state is not unique
            foreach($states as $state) 
            {
                if(is_array($state) && count($state) > 1) 
                {
                    $unique = false;
                    break;
                }
            }
        }
        
        return $unique;
    }
    
    /**
     * Check if the state information is empty
     * 
     * @param   array   An array of states names to exclude. 
     * @return  boolean TRUE if the state is empty, otherwise FALSE.
     */
    public function isEmpty(array $exclude = array())
    {
        $states = $this->getData();
         
        foreach($exclude as $state) {
            unset($states[$state]); 
        }
        
        return (bool) (count($states) == 0);
    }
    
	/**
     * Return an associative array of the data.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->getData();
    }
}