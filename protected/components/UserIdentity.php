<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
             if (isset($this->username) && isset($this->password)) {
            //check in user table
           // $userExist    = Admin::model()->findByAttributes(array("username" => $this->username, "password" => $this->password));
        
            if ($this->username == "admin" && $this->password == "admin" || $this->username == "nikhil" && $this->password == "nikhil") {
                
                
                
                 $this->setState('permission_level', 5);
                 $this->setState('id', 1);
                 $this->setState('username', "Nikhil");
             
                 $this->errorCode = self::ERROR_NONE;
                 
            } else {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
            
//              if ($userExist == NULL) {
//                $this->errorCode = self::ERROR_USERNAME_INVALID;
//            } else {
//                
//                 $this->setState('permission_level',   $userExist->permission_level);
//                 $this->setState('id', $userExist->id);
//                 $this->setState('username', $userExist->username);
//             
//                 $this->errorCode = self::ERROR_NONE;
//            }
            
            
        } else {
            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
	}
}