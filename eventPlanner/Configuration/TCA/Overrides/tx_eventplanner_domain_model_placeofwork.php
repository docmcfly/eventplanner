<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
   'eventplanner',
   'tx_eventplanner_domain_model_placeofwork'
);
