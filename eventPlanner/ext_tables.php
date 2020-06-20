<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(function () {

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin('Cylancer.Eventplanner', 'Register', 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_be_eventplanner_register.xlf:tx_eventplanner_register.name');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('eventplanner', 'Configuration/TypoScript', 'Event Planner');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_eventplanner_domain_model_event', 'EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_eventplanner_domain_model_event');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_eventplanner_domain_model_placeofwork', 'EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_placeofwork.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_eventplanner_domain_model_placeofwork');
});
