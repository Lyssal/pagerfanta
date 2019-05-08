<?php
/**
 * This file is part of a Lyssal project.
 *
 * @copyright Rémi Leclerc
 * @author Rémi Leclerc
 */
namespace Lyssal\Pagerfanta\Repository\Traits;

use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * A trait to use Pagerfanta functionalities with the EntityRepository of Lyssal.
 */
trait DoctrineOrmTrait
{
    /**
     * Get a Pagerfanta object using the findBy method.
     *
     * @param array $conditions  The conditions of the search
     * @param array $orderBy     The order of the results
     * @param int   $limit       The maximum number of results
     * @param int   $currentPage The current page
     * @param array $extras      The extras
     * @return \Pagerfanta\Pagerfanta The Pagerfanta
     */
    public function getPagerFantaFindBy(array $conditions, array $orderBy = null, $limit = 20, $currentPage = 1, array $extras = array())
    {
        $adapter = new DoctrineORMAdapter($this->getQueryBuilderFindBy($conditions, $orderBy, null, null, $extras), false);
        $pagerFanta = new Pagerfanta($adapter);
        $pagerFanta->setMaxPerPage($limit);
        $pagerFanta->setCurrentPage($currentPage);

        return $pagerFanta;
    }
}
