<?php
/**
 * This file is part of a Lyssal project.
 *
 * @copyright Rémi Leclerc
 * @author Rémi Leclerc
 */
namespace Lyssal\Pagerfanta\View;

use Pagerfanta\View\DefaultView;
use Lyssal\Pagerfanta\View\Template\FoundationTemplate;

/**
 * The PagerFanta view for Foundation.
 */
class FoundationView extends DefaultView
{
    /**
     * {@inheritDoc}
     */
    protected function createDefaultTemplate()
    {
        return new FoundationTemplate();
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultProximity()
    {
        return 3;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'foundation';
    }
}
