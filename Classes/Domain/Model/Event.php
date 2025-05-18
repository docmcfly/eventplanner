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
 *  
 */

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Event extends AbstractEntity
{

    private const UNLIMITED_VOTES = 0;

    protected string $name = '';

    protected string $description = '';

    protected \DateTime $registerEnd;

    protected FrontendUser $eventCoordinator;

    /** @var ObjectStorage<PlaceOfWork> */
    protected ObjectStorage $placeOfWork;

    protected int $maxVotes;

    protected bool $displayNames;

    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    protected function initStorageObjects(): void
    {
        $this->placeOfWork = new ObjectStorage();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getEventCoordinator(): FrontendUser
    {
        return $this->eventCoordinator;
    }

    public function setEventCoordinator(FrontendUser $eventCoordinator): void
    {
        $this->eventCoordinator = $eventCoordinator;
    }

    public function getRegisterEnd(): \DateTime
    {
        return $this->registerEnd;
    }

    public function setRegisterEnd(\DateTime $registerEnd): void
    {
        $this->registerEnd = $registerEnd;
    }

    public function addPlaceOfWork(PlaceOfWork $placeOfWork): void
    {
        $this->placeOfWork->attach($placeOfWork);
    }

    public function removePlaceOfWork(PlaceOfWork $placeOfWorkToRemove): void
    {
        $this->placeOfWork->detach($placeOfWorkToRemove);
    }

    public function getPlaceOfWork(): ObjectStorage
    {
        return $this->placeOfWork;
    }

    public function setPlaceOfWork(ObjectStorage $placeOfWork): void
    {
        $this->placeOfWork = $placeOfWork;
    }

    public function getMaxVotes()
    {
        return $this->maxVotes;
    }

    public function setMaxVotes($maxVotes): self
    {
        $this->maxVotes = $maxVotes;
        return $this;
    }

    public function getDisplayNames()
    {
        return $this->displayNames;
    }

    public function setDisplayNames($displayNames): self
    {
        $this->displayNames = $displayNames;
        return $this;
    }


}