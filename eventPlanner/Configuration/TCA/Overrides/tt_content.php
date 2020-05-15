<?php
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['eventplanner_register'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    // plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
    'eventplanner_register',
    // Flexform configuration schema file
    'FILE:EXT:eventplanner/Configuration/FlexForms/Register.xml'
);

?>
