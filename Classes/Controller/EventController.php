<?php
namespace Cylancer\Eventplanner\Controller;

use DateTime;
use Cylancer\Eventplanner\Domain\Repository\FrontendUserRepository;
use Cylancer\Eventplanner\Domain\Repository\EventRepository;
use Cylancer\Eventplanner\Domain\Repository\PlaceOfWorkRepository;
use Cylancer\Eventplanner\Domain\Model\PlaceOfWork;
use Cylancer\Eventplanner\Domain\Model\Event;
use Cylancer\Eventplanner\Domain\Model\ValidationResults;
use Cylancer\Eventplanner\Services\FrontendUserService;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 *
 * This file is part of the "Event Planner" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2020 Clemens Gogolin
 * Clemens Gogolin <service@cylancer.net>
 *
 * @package Cylancer\Eventplanner\Controller
 */
class EventController extends ActionController 
{

    /**
     *
     * @var FrontendUserService
     */
    private $frontendUserService = null;

    /**
     *
     * @var EventRepository
     */
    private $eventRepository = null;

    /**
     *
     * @var PlaceOfWorkRepository
     */
    private $placeOfWorkRepository = null;

    /**
     *
     * @var FrontendUserRepository
     */
    private $frontendUserRepository = null;

    public function __construct(FrontendUserRepository $frontendUserRepository, EventRepository $eventRepository, PlaceOfWorkRepository $placeOfWorkRepository, FrontendUserService $frontendUserService)
    {
        $this->frontendUserRepository = $frontendUserRepository;
        $this->eventRepository = $eventRepository;
        $this->placeOfWorkRepository = $placeOfWorkRepository;
        $this->frontendUserService = $frontendUserService;
    }

    /**
     *
     * @param PlaceOfWork $placeOfWork
     * @return void
     */
    public function registerUserAction(PlaceOfWork $placeOfWork):void
    {
        if ($placeOfWork != null && $this->frontendUserService->isLogged()) {
            $userId = $this->frontendUserService->getCurrentUserUid();
            $f = false;
            foreach ($placeOfWork->getMembers() as $member) {
                $f = $f || $member->getUid() == $userId;
            }
            if (! $f) {
                $user = $this->frontendUserRepository->findByUid($userId);
                $placeOfWork->addMember($user);
                $this->placeOfWorkRepository->update($placeOfWork);
            }
        }
        $this->redirect('register');
    }

    /**
     *
     * @param PlaceOfWork $placeOfWork
     * @return void
     */
    public function deregisterUserAction(PlaceOfWork $placeOfWork): void
    {
        if ($placeOfWork != null && $this->frontendUserService->isLogged()) {
            $userId = $this->frontendUserService->getCurrentUserUid();
            $f = false;
            foreach ($placeOfWork->getMembers() as $member) {
                $f = $f || $member->getUid() == $userId;
            }
            if ($f) {
                $user = $this->frontendUserRepository->findByUid($userId);
                $placeOfWork->removeMember($user);
                $this->placeOfWorkRepository->update($placeOfWork);
            }
        }
        $this->redirect('register');
    }

    /**
     *
     * @return void
     */
    public function registerAction(): void
    {
        $userId = $this->frontendUserService->getCurrentUserUid();
        $eventUid = $this->settings['event'];

        $event = $this->eventRepository->findByUid($eventUid);

        /** @var ValidationResults $validationResults */
        $validationResults = $this->validate($event);

        if ($validationResults->hasErrors()) {
            $this->view->assign('validationResults', $validationResults);
        } else {
            $this->view->assign('event', $event);
           //  debug($event);
            $userIsRegisteredIn = array();
            foreach ($event->getPlaceOfWork() as $place) {
                $members = $place->getMembers();
                foreach ($members as $member) {
                    if ($userId == $member->getUid()) {
                        $userIsRegisteredIn[$place->getUid()] = $place->getUid();
                        break;
                    }
                }
            }
            $this->view->assign('userIsRegisteredIn', $userIsRegisteredIn);
            $now = new DateTime('now');
            $registerActive = $now <= $event->getRegisterEnd();
            $this->view->assign('registerActive', $registerActive);
        }
    }

    private function validate(?Event $event): ValidationResults
    {
        /** @var ValidationResults $validationResults */
        $validationResults = new ValidationResults();
        if ($event == null) {
            $validationResults->addError("eventNotFound");
        }
        return $validationResults;
    }
}
