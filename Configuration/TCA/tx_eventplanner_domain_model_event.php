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
        'cruser_id' => 'cruser_id',
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
    'interface' => [
        'showRecordFieldList' => ' l10n_parent, l10n_diffsource, hidden, name, description, register_end, event_coordinator, max_votes, display_names, place_of_work',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, register_end, event_coordinator,  max_votes, display_names, place_of_work, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_eventplanner_domain_model_event',
                'foreign_table_where' => 'AND {#tx_eventplanner_domain_model_event}.{#pid}=###CURRENT_PID### AND {#tx_eventplanner_domain_model_event}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf:name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'max_votes' => [
            'exclude' => false,
            'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf:maxVotes',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int, required',
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
                      0 => '',
                      1 => '',
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
                'eval' => 'trim,required',
            ],
            
        ],
        'register_end' => [
            'exclude' => false,
            'label' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_event.xlf:registerEnd',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date,required',
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
