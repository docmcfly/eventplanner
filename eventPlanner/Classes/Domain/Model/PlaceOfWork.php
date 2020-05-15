<?php
namespace Cylancer\Eventplanner\Domain\Model;


/***
 *
 * This file is part of the "Event Planner" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Clemens Gogolin
 *           Clemens Gogolin <service@cylancer.net>
 *
 ***/
/**
 * PlaceOfWork
 */
class PlaceOfWork extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     * 
     * @var string
     */
    protected $name = '';

    /**
     * maxMembers
     * 
     * @var int
     */
    protected $maxMembers = 0;

    /**
     * members
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUser>
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
        $this->members = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     * 
     * @return string name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the maxMembers
     * 
     * @return int maxMembers
     */
    public function getMaxMembers()
    {
        return $this->maxMembers;
    }

    /**
     * Sets the maxMembers
     * 
     * @param int $maxMembers
     * @return void
     */
    public function setMaxMembers($maxMembers)
    {
        $this->maxMembers = $maxMembers;
    }

    /**
     * Adds a FrontendUser
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $member
     * @return void
     */
    public function addMember(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $member)
    {
        $this->members->attach($member);
    }

    /**
     * Removes a FrontendUser
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $memberToRemove The FrontendUser to be removed
     * @return void
     */
    public function removeMember(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $memberToRemove)
    {
        $this->members->detach($memberToRemove);
    }

    /**
     * Returns the members
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUser> members
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * Sets the members
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUser> $members
     * @return void
     */
    public function setMembers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $members)
    {
        $this->members = $members;
    }
}
