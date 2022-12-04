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
 *  
 *  @package Cylancer\Eventplanner\Domain\Model
 *  
 */

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Event extends AbstractEntity
{

    /**
     * name
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * description
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $description = '';

    /**
     * registerEnd
     * 
     * @var \DateTime
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $registerEnd = null;

    /**
     * eventCoordinator
     * 
     * @var FrontendUser
     */
    protected $eventCoordinator = null;

    /**
     * placeOfWork
     * 
     * @var ObjectStorage<PlaceOfWork>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $placeOfWork = null;

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
    protected function initStorageObjects():void
    {
        $this->placeOfWork = new ObjectStorage();
    }

    /**
     * Returns the name
     * 
     * @return string name
     */
    public function getName():String
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName(String $name):void
    {
        $this->name = $name;
    }

    /**
     * Returns the description
     * 
     * @return string description
     */
    public function getDescription():String
    {
        return $this->description;
    }

    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription(String $description):void
    {
        $this->description = $description;
    }

    /**
     * Returns the eventCoordinator
     * 
     * @return FrontendUser eventCoordinator
     */
    public function getEventCoordinator() :FrontendUser
    {
        return $this->eventCoordinator;
    }

    /**
     * Sets the eventCoordinator
     * 
     * @param FrontendUser $eventCoordinator
     * @return void
     */
    public function setEventCoordinator(FrontendUser $eventCoordinator):void
    {
        $this->eventCoordinator = $eventCoordinator;
    }

    /**
     * Returns the registerEnd
     * 
     * @return \DateTime $registerEnd
     */
    public function getRegisterEnd():\DateTime
    {
        return $this->registerEnd;
    }

    /**
     * Sets the registerEnd
     * 
     * @param \DateTime $registerEnd
     * @return void
     */
    public function setRegisterEnd(\DateTime $registerEnd):void
    {
        $this->registerEnd = $registerEnd;
    }

    /**
     * Adds a PlaceOfWork
     * 
     * @param PlaceOfWork $placeOfWork
     * @return void
     */
    public function addPlaceOfWork(PlaceOfWork $placeOfWork):void
    {
        $this->placeOfWork->attach($placeOfWork);
    }

    /**
     * Removes a PlaceOfWork
     * 
     * @param PlaceOfWork $placeOfWorkToRemove The PlaceOfWork to be removed
     * @return void
     */
    public function removePlaceOfWork(PlaceOfWork $placeOfWorkToRemove):void
    {
        $this->placeOfWork->detach($placeOfWorkToRemove);
    }

    /**
     * Returns the placeOfWork
     * 
     * @return ObjectStorage<PlaceOfWork> $placeOfWork
     */
    public function getPlaceOfWork():ObjectStorage
    {
        return $this->placeOfWork;
    }

    /**
     * Sets the placeOfWork
     * 
     * @param ObjectStorage<PlaceOfWork> $placeOfWork
     * @return void
     */
    public function setPlaceOfWork(ObjectStorage $placeOfWork):void
    {
        $this->placeOfWork = $placeOfWork;
    }
}
