<?php

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

return [
    'ctrl' => [
        'title' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_placeofwork.xlf:title',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'hideTable' => true,        
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'name',
        'iconfile' => 'EXT:eventplanner/Resources/Public/Icons/tx_eventplanner_domain_model_placeofwork.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'name, max_members, members'],
    ],
    'columns' => [
        'name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_placeofwork.xlf:name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'max_members' => [
            'exclude' => false,
            'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_placeofwork.xlf:maxMembers',
            'config' => [
                'type' => 'number',
                'size' => 4,
                'required' => true,
                'range' => [
                    'lower' => 0
                ],
                'default' => '0',
            ],
            
        ],
        'members' => [
            'exclude' => true,
            'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_placeofwork.xlf:members',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'fe_users',
                'MM' => 'tx_eventplanner_placeofwork_frontenduser_mm',
            ],
            
        ],
    
        'event' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
