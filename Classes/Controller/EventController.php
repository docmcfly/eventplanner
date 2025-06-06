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
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 *
 * This file is part of the "Event Planner" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2025 C. Gogolin <service@cylancer.net>
 *
 */

class EventController extends ActionController
{
    public function __construct(
        private readonly FrontendUserRepository $frontendUserRepository,
        private readonly EventRepository $eventRepository,
        private readonly PlaceOfWorkRepository $placeOfWorkRepository,
        private readonly FrontendUserService $frontendUserService
    ) {
    }

    public function registerUserAction(PlaceOfWork $placeOfWork): ResponseInterface
    {
        if ($placeOfWork != null && $this->frontendUserService->isLogged()) {
            $userId = $this->frontendUserService->getCurrentUserUid();
            $f = false;
            foreach ($placeOfWork->getMembers() as $member) {
                $f = $f || $member->getUid() == $userId;
            }
            if (!$f) {
                $user = $this->frontendUserRepository->findByUid($userId);
                $placeOfWork->addMember($user);
                $this->placeOfWorkRepository->update($placeOfWork);
            }
        }
        return $this->redirect('register');
    }

    public function deregisterUserAction(PlaceOfWork $placeOfWork): ResponseInterface
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
        return $this->redirect('register');
    }

    public function registerAction(): ResponseInterface
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
        return $this->htmlResponse();
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
