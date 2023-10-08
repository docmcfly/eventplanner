<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "eventplanner"
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Event Planner',
    'description' => 'You can organize helper for your event. Plan places of work and the front end users can register for it.',
    'category' => 'plugin',
    'author' => 'Clemens Gogolin',
    'author_email' => 'service@cylancer.net',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '2.2.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.10-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];

/**
 *  2.2.0 :: Add :: You can do hidden votes. You can limit the vote per user.
 *  2.1.1 :: Rmv :: Remove the redundant event name: it is better you use the headline for the front end. 
 *  2.1.0 :: Fix :: Fix the plugin configuration / registration
 *  2.0.8 :: Fix :: Change the max members translation. 
 *  2.0.7 :: Fix :: Make maximal members field visible. 
 * 
 */
