<?php
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        ExtensionUtility::registerPlugin(
            'Eventplanner',
            'Register',
            'LLL:EXT:eventplanner/Resources/Private/Language/locallang_be_eventplanner_register.xlf:tx_eventplanner_register.name'
        );

        ExtensionManagementUtility::addStaticFile('eventplanner', 'Configuration/TypoScript', 'Event Planner');

        ExtensionManagementUtility::addLLrefForTCAdescr('tx_eventplanner_domain_model_event', 'EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf');
        ExtensionManagementUtility::allowTableOnStandardPages('tx_eventplanner_domain_model_event');

        ExtensionManagementUtility::addLLrefForTCAdescr('tx_eventplanner_domain_model_placeofwork', 'EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_placeofwork.xlf');
        ExtensionManagementUtility::allowTableOnStandardPages('tx_eventplanner_domain_model_placeofwork');

    }
);
