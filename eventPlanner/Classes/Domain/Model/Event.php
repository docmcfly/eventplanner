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
 * Event
 */
class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
     */
    protected $eventCoordinator = null;

    /**
     * placeOfWork
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Cylancer\Eventplanner\Domain\Model\PlaceOfWork>
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
    protected function initStorageObjects()
    {
        $this->placeOfWork = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the description
     * 
     * @return string description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the eventCoordinator
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser eventCoordinator
     */
    public function getEventCoordinator()
    {
        return $this->eventCoordinator;
    }

    /**
     * Sets the eventCoordinator
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $eventCoordinator
     * @return void
     */
    public function setEventCoordinator(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $eventCoordinator)
    {
        $this->eventCoordinator = $eventCoordinator;
    }

    /**
     * Returns the registerEnd
     * 
     * @return \DateTime $registerEnd
     */
    public function getRegisterEnd()
    {
        return $this->registerEnd;
    }

    /**
     * Sets the registerEnd
     * 
     * @param \DateTime $registerEnd
     * @return void
     */
    public function setRegisterEnd(\DateTime $registerEnd)
    {
        $this->registerEnd = $registerEnd;
    }

    /**
     * Adds a PlaceOfWork
     * 
     * @param \Cylancer\Eventplanner\Domain\Model\PlaceOfWork $placeOfWork
     * @return void
     */
    public function addPlaceOfWork(\Cylancer\Eventplanner\Domain\Model\PlaceOfWork $placeOfWork)
    {
        $this->placeOfWork->attach($placeOfWork);
    }

    /**
     * Removes a PlaceOfWork
     * 
     * @param \Cylancer\Eventplanner\Domain\Model\PlaceOfWork $placeOfWorkToRemove The PlaceOfWork to be removed
     * @return void
     */
    public function removePlaceOfWork(\Cylancer\Eventplanner\Domain\Model\PlaceOfWork $placeOfWorkToRemove)
    {
        $this->placeOfWork->detach($placeOfWorkToRemove);
    }

    /**
     * Returns the placeOfWork
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Cylancer\Eventplanner\Domain\Model\PlaceOfWork> $placeOfWork
     */
    public function getPlaceOfWork()
    {
        return $this->placeOfWork;
    }

    /**
     * Sets the placeOfWork
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Cylancer\Eventplanner\Domain\Model\PlaceOfWork> $placeOfWork
     * @return void
     */
    public function setPlaceOfWork(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $placeOfWork)
    {
        $this->placeOfWork = $placeOfWork;
    }
}
