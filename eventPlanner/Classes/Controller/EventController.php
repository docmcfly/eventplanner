<?php
namespace Cylancer\Eventplanner\Controller;

use DateTime;

/**
 * *
 *
 * This file is part of the "Event Planner" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2020 Clemens Gogolin
 * Clemens Gogolin <service@cylancer.net>
 *
 * *
 */
/**
 * *
 * This file is part of the "Event Planner" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 * (c) 2019 Clemens Gogolin
 * Clemens Gogolin <service@cylancer.net>
 * *
 * EventController
 */
class EventController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * messages container
     *
     * @TYPO3\CMS\Extbase\Annotation\Inject
     * @var \Cylancer\Eventplanner\Domain\Model\Messages
     */
    public $messages = null;

    /**
     * feUserUtility
     *
     * @TYPO3\CMS\Extbase\Annotation\Inject
     * @var \Cylancer\Eventplanner\Utility\FeUserUtility
     */
    public $feUserUtility = null;

    /**
     * eventRepository
     *
     * @TYPO3\CMS\Extbase\Annotation\Inject
     * @var \Cylancer\Eventplanner\Domain\Repository\EventRepository
     */
    public $eventRepository = null;

    /**
     * placeOfWorkRepository
     *
     * @TYPO3\CMS\Extbase\Annotation\Inject
     * @var \Cylancer\Eventplanner\Domain\Repository\PlaceOfWorkRepository
     */
    public $placeOfWorkRepository = null;

    /**
     * frontendUserRepository
     *
     * @TYPO3\CMS\Extbase\Annotation\Inject
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository
     */
    public $frontendUserRepository = null;

    /**
     * register user
     *
     * @param \Cylancer\Eventplanner\Domain\Model\PlaceOfWork $placeOfWork
     * @return void
     */
    public function registerUserAction(\Cylancer\Eventplanner\Domain\Model\PlaceOfWork $placeOfWork)
    {

        // $this->placeOfWorkRepository->findByUid($placeOfWork['__identity']);
        if ($placeOfWork != null && $this->feUserUtility->isLogged()) {
            $userId = $this->feUserUtility->getCurrentUserUid();
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
     * deregister user
     *
     * @param \Cylancer\Eventplanner\Domain\Model\PlaceOfWork $placeOfWork
     * @return void
     */
    public function deregisterUserAction(\Cylancer\Eventplanner\Domain\Model\PlaceOfWork $placeOfWork)
    {
        if ($placeOfWork != null && $this->feUserUtility->isLogged()) {
            $userId = $this->feUserUtility->getCurrentUserUid();
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
     * action register
     *
     * @return void
     */
    public function registerAction()
    {
        $userId = $this->feUserUtility->getCurrentUserUid();
        $eventUid = $this->settings['event'];
        $event = $this->eventRepository->findByUid($eventUid);
        if ($event == null) {
            $this->messages->addError("eventNotFound");
        }
        $this->view->assign("messages", $this->messages);
        if (!$this->messages->hasErrors()) {
            $this->view->assign('event', $event);
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
}
