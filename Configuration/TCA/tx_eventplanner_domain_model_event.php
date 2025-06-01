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
        'title' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf:name',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name,description',
        'iconfile' => 'EXT:eventplanner/Resources/Public/Icons/tx_eventplanner_domain_model_event.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'hidden, name, description, register_end, event_coordinator,  max_votes, display_names, place_of_work'],
    ],
    'columns' => [
        'name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf:name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'max_votes' => [
            'exclude' => false,
            'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf:maxVotes',
            'config' => [
                'type' => 'number',
                'size' => 4,
                'required' => true,
                'range' => [
                    'lower' => 0
                ],
                'default' => 0,
                'min' => 1
            ]
        ],
        'display_names' => [
            'exclude' => false,
            'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf:displayNames',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf:displayNames'
                    ]
                ],
                'default' => 1
            ]
        ],
        'description' => [
            'exclude' => false,
            'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf:description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'required' => true,
            ],

        ],
        'register_end' => [
            'exclude' => false,
            'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf:registerEnd',
            'config' => [
                'dbType' => 'date',
                'type' => 'datetime',
                'format' => 'date',
                'required' => true,
                'default' => null,
            ],
        ],
        'event_coordinator' => [
            'exclude' => false,
            'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf:eventCoordinator',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'fe_users',
                'minitems' => 0,
                'maxitems' => 1,
            ],
        ],
        'place_of_work' => [
            'exclude' => false,
            'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf:placeOfWork',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_eventplanner_domain_model_placeofwork',
                'foreign_field' => 'event',
                'foreign_sortby' => 'sorting',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'useSortable' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],

    ],
];
