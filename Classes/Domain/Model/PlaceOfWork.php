<?php
namespace Cylancer\Eventplanner\Domain\Model;

/***
 *
 * This file is part of the "Event Planner" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2025 C. Gogolin <service@cylancer.net>
 *  
 *  @package Cylancer\Eventplanner\Domain\Model
 *  
 */

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class PlaceOfWork extends AbstractEntity
{

    protected ?string $name = '';

    protected int $maxMembers = 0;

    /** @var ObjectStorage<FrontendUser> */
    protected ObjectStorage $members;

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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getMaxMembers(): int
    {
        return $this->maxMembers;
    }

    public function setMaxMembers(int $maxMembers): void
    {
        $this->maxMembers = $maxMembers;
    }

    public function addMember(FrontendUser $member): void
    {
        $this->members->attach($member);
    }

    public function removeMember(FrontendUser $memberToRemove): void
    {
        $this->members->detach($memberToRemove);
    }

    public function getMembers(): ObjectStorage
    {
        return $this->members;
    }

}