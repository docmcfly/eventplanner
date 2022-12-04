<?php
namespace Cylancer\Eventplanner\Domain\Model;

/**
 *
 * This file is part of the "send message" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 C. Gogolin <service@cylancer.net>
 *
 * @package Cylancer\Eventplanner\Domain\Model
 * 
 */

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class FrontendUser extends AbstractEntity
{
    
    /**
     * @var string
     */
    protected $name = '';
    
    /**
     * @var string
     */
    protected $firstName = '';
    
    /**
     * @var string
     */
    protected $lastName = '';
    
    /**
     * @var string
     */
    protected $username = '';
    
    /**
     * Sets the name value
     *
     * @param string $name
     * @return void
     */
    public function setName(String $name):void
    {
        $this->name = $name;
    }
    
    /**
     * Returns the name value
     *
     * @return string
     */
    public function getName():String
    {
        return $this->name;
    }
    
    /**
     * Sets the firstName value
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName(String $firstName):void
    {
        $this->firstName = $firstName;
    }
    
    /**
     * Returns the firstName value
     *
     * @return string
     */
    public function getFirstName():?String
    {
        return $this->firstName;
    }
    
    /**
     * Sets the lastName value
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName($lastName):void
    {
        $this->lastName = $lastName;
    }
    
    /**
     * Returns the lastName value
     *
     * @return string
     */
    public function getLastName():String
    {
        return $this->lastName;
    }
    /**
     * @return string
     */
    public function getUsername():String
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return void 
     */
    public function setUsername(String $username):void
    {
        $this->username = $username;
    }

     
 
}
