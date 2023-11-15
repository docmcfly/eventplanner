<?php
use Cylancer\Eventplanner\Controller\EventController;
use Cylancer\Eventplanner\Evaluation\NoNegativeNumbersEvaluation;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3_MODE') || die('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals'][NoNegativeNumbersEvaluation::class] = '';
call_user_func(
    function()
    {

        ExtensionUtility::configurePlugin(
            'Eventplanner',
            'Register',
            [
               EventController::class => 'register, registerUser, deregisterUser'
            ],
            // non-cacheable actions
            [
                EventController::class => 'register, registerUser, deregisterUser'
            ]);

    // wizards
    ExtensionManagementUtility::addPageTSConfig(
        'mod {
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
       }'
    );
    $iconRegistry = TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'eventplanner-plugin-register',
			    TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:eventplanner/Resources/Public/Icons/user_plugin_register.svg']
			);
		
    }

    

);
