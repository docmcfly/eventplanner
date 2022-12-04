<?php
namespace Cylancer\Eventplanner\Services;

/**
 *
 * This file is part of the "Eventplanner" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 C. Gogolin <service@cylancer.net> 
 * 
 * @package Cylancer\Eventplanner\Services
 */

use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Extbase\Domain\Model\FrontendUser;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Context\Context;
use Cylancer\Eventplanner\Domain\Repository\FrontendUserRepository;

class FrontendUserService implements SingletonInterface
{

    /**
     * @var FrontendUserRepository
     */
    private $frontendUserRepository = null;

    
    public function __construct(FrontendUserRepository $frontendUserRepository)
    {
        $this->frontendUserRepository = $frontendUserRepository;
    }
    
    
    /**
     *
     * @return FrontendUser Returns the current frontend user
     */
    public function getCurrentUser()
    {
        if (! $this->isLogged()) {
            throw new \Exception("User ist not logged");
        }
        return $this->frontendUserRepository->findByUid(FrontendUserService::getCurrentUserUid());
    }

    public function getCurrentUserUid()
    {
        if (! $this->isLogged()) {
            throw new \Exception("User ist not logged");
        }
        $context = GeneralUtility::makeInstance(Context::class);
        return $context->getPropertyFromAspect('frontend.user', 'id');
    }

    /**
     * Check if the user is logged
     *
     * @return bool
     */
    public function isLogged()
    {
        $context = GeneralUtility::makeInstance(Context::class);
        return $context->getPropertyFromAspect('frontend.user', 'isLoggedIn');
    }
}
