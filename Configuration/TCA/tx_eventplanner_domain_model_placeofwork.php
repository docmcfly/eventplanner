<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:eventplanner/Resources/Private/Language/locallang_csh_tx_eventplanner_domain_model_placeofwork.xlf:title',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'name',
        'iconfile' => 'EXT:eventplanner/Resources/Public/Icons/tx_eventplanner_domain_model_placeofwork.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, max_members, members',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, max_members, members'],
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
                'foreign_table' => 'tx_eventplanner_domain_model_placeofwork',
                'foreign_table_where' => 'AND {#tx_eventplanner_domain_model_placeofwork}.{#pid}=###CURRENT_PID### AND {#tx_eventplanner_domain_model_placeofwork}.{#sys_language_uid} IN (-1,0)',
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
                'type' => 'input',
                'size' => 4,
                'eval' => 'int, required',
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
