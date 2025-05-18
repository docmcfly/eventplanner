<?php
declare(strict_types = 1);

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

use Cylancer\Eventplanner\Domain\Model\FrontendUser;

 
return [
    FrontendUser::class => [
        'tableName' => 'fe_users',
    ],
    
];  
