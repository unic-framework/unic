<?php
/**
* Session
* Session middleware handle session and manage sessions data.
*
* @package : Session
* @category : System Middleware
* @author : Unic Framework
* @link : https://github.com/unic-framework/unic
*/

defined('SYSPATH') OR exit('No direct access allowed');

//Global session object
$session = NULL;

class session {
  public function __construct() {
    //Start session
    if(!session_id()) {
      session_start();
    }
    if(isset($_SESSION)) {
      foreach($_SESSION as $var => $val) {
        $this->$var=$val;
      }
    }
  }

  /**
  * Set Session
  *
  * @param string $name
  * @param string $data
  * @return string
  */
  public function set(string $name, $data=NULL) {
    if($data) {
      $this->$name = $data;
      return $_SESSION[$name] = $data;
    }
  }

  /**
  * Get Session
  *
  * @param string $name
  * @return mixed
  */
  public function get(string $name=NULL) {
    if($name) {
      return $_SESSION[$name];
    } else {
      return false;
    }
  }

  /**
  * Has Session
  *
  * @param string $name
  * @return boolean
  */
  public function has(string $name) {
    if(isset($_SESSION[$name])) {
      return true;
    } else {
      return false;
    }
  }

  /**
  * Delete Session
  *
  * @param string $data
  * @return void
  */
  public function delete(string $name=NULL) {
    if($name) {
      unset($this->$name);
      unset($_SESSION[$name]);
    }
  }

  /**
  * Destroy Session
  *
  * @return void
  */
  public function destroy() {
    session_destroy();
  }
}
