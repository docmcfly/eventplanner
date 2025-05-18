<?php
namespace Cylancer\Eventplanner\Domain\Repository;

/***
 *
 * This file is part of the "Event Planner" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2025 C. Gogolin <service@cylancer.net>
 *  
 */


use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class PlaceOfWorkRepository extends Repository
{

    protected $defaultOrderings = ['sorting' => QueryInterface::ORDER_ASCENDING];
}
