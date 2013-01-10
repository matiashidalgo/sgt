<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	const ERROR_USERNAME_DENEGATE = 100;
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
		if($this->username=='Cliente' || $this->username=='cliente'){ // Si un cliente intenta conectarse deniega en el acto
				$this->errorCode=self::ERROR_USERNAME_DENEGATE;
			} else {
				// Si es un usuario diferente busca sus datos
				$user = Clientes::model()->findByAttributes(array('cuenta'=>$this->username));
				
				if($user === null){ //Si no lo encuentra devuelve Usuario Invalido
					$this->errorCode=self::ERROR_USERNAME_INVALID;
				} else if($user->admin===0) { // Si lo encuentra pero no es administrador devuelve Usuario Denegado
					$this->errorCode=self::ERROR_USERNAME_DENEGATE;
				} else if($user->password!==$this->password){ // Si lo encuentra pero la contraseña es incorrecta devuelve Contraseña incorrecta
					$this->errorCode=self::ERROR_PASSWORD_INVALID;
				} else {
					$this->errorCode=self::ERROR_NONE;
				}
			}
			
			
		/* $users=array(
			// username => password
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE; */
			
		
		return !$this->errorCode;
	}
}