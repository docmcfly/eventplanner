<?php
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

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

$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['itemGroups']['eventplanner'] = 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_be.xlf:plugins.group.eventplanner.name';
