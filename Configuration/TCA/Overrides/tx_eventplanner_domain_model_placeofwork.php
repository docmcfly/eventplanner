<?php
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3_MODE') || die();

ExtensionManagementUtility::makeCategorizable(
   'eventplanner',
   'tx_eventplanner_domain_model_placeofwork'
);
