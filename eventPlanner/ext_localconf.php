<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(function () {

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('Cylancer.Eventplanner', 'Register', [
        \Cylancer\Eventplanner\Controller\EventController::class => 'register, registerUser, deregisterUser'
    ], 
        // non-cacheable actions
        [
            \Cylancer\Eventplanner\Controller\EventController::class => 'register, registerUser, deregisterUser'
        ]);

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    register {
                        iconIdentifier = eventplanner-plugin-register
                        title = LLL:EXT:eventplanner/Resources/Private/Language/locallang_be_eventplanner_register.xlf:tx_eventplanner_register.name
                        description = LLL:EXT:eventplanner/Resources/Private/Language/locallang_be_eventplanner_register.xlf:tx_eventplanner_register.description
                        tt_content_defValues {
                            CType = list
                            list_type = eventplanner_register
                        }
                    }
                }
                show = *
            }
       }');
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

    $iconRegistry->registerIcon('eventplanner-plugin-register', \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class, [
        'source' => 'EXT:eventplanner/Resources/Public/Icons/user_plugin_register.svg'
    ]);
});
