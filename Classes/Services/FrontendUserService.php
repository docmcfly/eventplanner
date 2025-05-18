<?php
namespace Cylancer\Eventplanner\Services;

use Cylancer\Eventplanner\Domain\Model\FrontendUser;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Context\Context;
use Cylancer\Eventplanner\Domain\Repository\FrontendUserRepository;

/**
 *
 * This file is part of the "Eventplanner" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2025 C. Gogolin <service@cylancer.net> 
 * 
 */


class FrontendUserService implements SingletonInterface
{

    public function __construct(
        private readonly FrontendUserRepository $frontendUserRepository
    ) {
    }

    public function getCurrentUser(): ?FrontendUser
    {
        if (!$this->isLogged()) {
            throw new \Exception("User ist not logged");
        }
        return $this->frontendUserRepository->findByUid(FrontendUserService::getCurrentUserUid());
    }

    public function getCurrentUserUid(): int
    {
        if (!$this->isLogged()) {
            throw new \Exception("User ist not logged");
        }
        $context = GeneralUtility::makeInstance(Context::class);
        return $context->getPropertyFromAspect('frontend.user', 'id');
    }

    public function isLogged(): bool
    {
        $context = GeneralUtility::makeInstance(Context::class);
        return $context->getPropertyFromAspect('frontend.user', 'isLoggedIn');
    }
}
