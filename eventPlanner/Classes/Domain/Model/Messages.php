<?php

namespace Cylancer\Eventplanner\Domain\Model;

class Messages {

    /**
     * @var string
     */
    protected $infos = array();

		/**
     * @var string
     */
    protected $errors = array();


    /**
     * @return array of srings
     */
    public function getInfos() {
        return $this->infos;
    }

    /**
     * @return array of srings
     */
    public function getErrors() {
        return $this->errors;
    }

		/**
     * @return array of srings
     */
    public function hasErrors() {
        return !empty($this->errors);
    }

		/**
     * @return array of srings
     */
    public function hasInfos() {
        return !empty($this->infos);
    }



    /**
     * @param string
     */
    public function addInfo(String $infoKey) {
        $this->infos[] = 'info.'.$infoKey;
    }

   /**
     * @param string
     */
    public function addError(String $errorKey) {
        $this->errors[] = 'error.'.$errorKey;
    }

	  /**
     * @param array
     */
    public function addInfos(array $infos) {
			foreach($infos AS $info){
			  $this->addInfo($info); 
			}
    }

	  /**
     * @param array
     */
    public function addErrors(array $errors) {
			foreach($errors AS $error){
			  $this->addError($error); 
			}
    }
	
		
		
}
