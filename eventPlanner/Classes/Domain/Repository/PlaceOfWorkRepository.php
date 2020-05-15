<?php
namespace Cylancer\Eventplanner\Domain\Repository;


/***
 *
 * This file is part of the "Event Planner" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Clemens Gogolin
 *           Clemens Gogolin <service@cylancer.net>
 *
 ***/
/**
 * The repository for PlaceOfWorks
 */
class PlaceOfWorkRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];
}
