<?php
namespace Cylancer\Eventplanner\Domain\Model;

/***
 *
 * This file is part of the "Event Planner" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2022 Clemens Gogolin <service@cylancer.net>
 *  
 *  @package Cylancer\Eventplanner\Domain\Model
 *  
 */

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class PlaceOfWork extends AbstractEntity
{

    /**
     * 
     * @var string
     */
    protected $name = '';

    /**
     * 
     * @var int
     */
    protected $maxMembers = 0;

    /**
     * 
     * @var ObjectStorage<FrontendUser>
     */
    protected $members = null;




    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->members = new ObjectStorage();
    }

    /**
     * Returns the name
     * 
     * @return string name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns the maxMembers
     * 
     * @return int maxMembers
     */
    public function getMaxMembers(): int
    {
        return $this->maxMembers;
    }

    /**
     * Sets the maxMembers
     * 
     * @param int $maxMembers
     * @return void
     */
    public function setMaxMembers(int $maxMembers): void
    {
        $this->maxMembers = $maxMembers;
    }

    /**
     * Adds a FrontendUser
     * 
     * @param FrontendUser $member
     * @return void
     */
    public function addMember(FrontendUser $member): void
    {
        $this->members->attach($member);
    }

    /**
     * Removes a FrontendUser
     * 
     * @param FrontendUser $memberToRemove The FrontendUser to be removed
     * @return void
     */
    public function removeMember(FrontendUser $memberToRemove): void
    {
        $this->members->detach($memberToRemove);
    }

    /**
     * Returns the members
     * 
     * @return ObjectStorage<FrontendUser> members
     */
    public function getMembers(): ObjectStorage
    {
        return $this->members;
    }

}