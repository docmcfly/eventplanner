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

$icons = [];
foreach (['register'] as $key) {
    $icons['eventplanner-' . $key] = [
        'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        'source' => 'EXT:eventplanner/Resources/Public/Icons/Plugins/' . $key . '.svg',
    ];

}
return $icons;
