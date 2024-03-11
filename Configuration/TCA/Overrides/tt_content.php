<?php
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die('Access denied.');

(static function (): void{

    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['eventplanner_register'] = 'pi_flexform';
    ExtensionManagementUtility::addPiFlexFormValue(
        // plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
        'eventplanner_register',
        // Flexform configuration schema file
        'FILE:EXT:eventplanner/Configuration/FlexForms/Register.xml'
    );


    ExtensionUtility::registerPlugin(
        'Eventplanner',
        'Register',
        'LLL:EXT:eventplanner/Resources/Private/Language/locallang_be_eventplanner_register.xlf:tx_eventplanner_register.name'
    );


})();