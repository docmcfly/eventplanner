<?php
namespace Cylancer\Eventplanner\Utility;

use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Extbase\Domain\Model\FrontendUser;

// use \Cylancer\Usertools\Domain\Repository\UserRepository;

/**
 * *
 *
 * This file is part of the "Eventplanner" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2020 C. Gogolin <service@cylancer.net>
 * C. Gogolin <service@cylancer.net>
 *
 * *
 */
/**
 * The repository for Commitments
 */
class FeUserUtility implements SingletonInterface
{

    /**
     *
     * frontendUserRepository
     *
     * @TYPO3\CMS\Extbase\Annotation\Inject
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository
     */
    public $frontendUserRepository = null;

    /**
     *
     * @return FrontendUser Returns the current frontend user
     */
    public function getCurrentUser()
    {
        if (! $this->isLogged()) {
            throw new \Exception("User ist not logged");
        }
        return $this->frontendUserRepository->findByUid(FeUserUtility::getCurrentUserUid());
    }

    public function getCurrentUserUid()
    {
        if (! $this->isLogged()) {
            throw new \Exception("User ist not logged");
        }
        $context = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Context\Context::class);
        return $context->getPropertyFromAspect('frontend.user', 'id');
    }

    /**
     * Check if the user is logged
     *
     * @return bool
     */
    public function isLogged()
    {
        $context = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Context\Context::class);
        return $context->getPropertyFromAspect('frontend.user', 'isLoggedIn');
    }
}
