<?php
use Cylancer\Eventplanner\Controller\EventController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die('Access denied.');

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

ExtensionUtility::configurePlugin(
    'Eventplanner',
    'Register',
    [
        EventController::class => 'register, registerUser, deregisterUser'

    ],
    // non-cacheable actions
    [
        EventController::class => 'register, registerUser, deregisterUser'
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

