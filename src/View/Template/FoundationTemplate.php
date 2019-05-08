<?php
/**
 * This file is part of a Lyssal project.
 *
 * @copyright Rémi Leclerc
 * @author Rémi Leclerc
 */
namespace Lyssal\Pagerfanta\View\Template;

use Pagerfanta\View\Template\Template;

/**
 * The PagerFanta template for Foundation.
 */
class FoundationTemplate extends Template
{
    /**
     * @var array Default options
     */
    static protected $defaultOptions = array(
        'prev_message'        => '&laquo;',
        'next_message'        => '&raquo;',
        'dots_message'        => '&hellip;',
        'active_suffix'       => '',
        'css_container_class' => 'pagination',
        'css_prev_class'      => 'arrow',
        'css_next_class'      => 'arrow',
        'css_disabled_class'  => 'unavailable',
        'css_dots_class'      => 'unavailable',
        'css_active_class'    => 'current',
    );


    /**
     * Container.
     *
     * @return string Container
     */
    public function container()
    {
        return sprintf('<ul class="%s">%%pages%%</ul>',
            $this->option('css_container_class')
        );
    }

    /**
     * Page.
     *
     * @param string $page Page
     * @return string Page
     */
    public function page($page)
    {
        $text = $page;

        return $this->pageWithText($page, $text);
    }

    /**
     * Page with text.
     *
     * @param string $page Page
     * @param string $text Text
     * @return string Page with text
     */
    public function pageWithText($page, $text)
    {
        $class = null;

        return $this->pageWithTextAndClass($page, $text, $class);
    }

    /**
     * Page with text and class.
     *
     * @param string $page  Page
     * @param string $text  Text
     * @param string $class Class
     * @return string Page with text and class
     */
    private function pageWithTextAndClass($page, $text, $class)
    {
        $href = $this->generateRoute($page);

        return $this->linkLi($class, $href, $text);
    }

    /**
     * Previous disabled.
     *
     * @return string Previous disabled
     */
    public function previousDisabled()
    {
        $class = $this->previousDisabledClass();
        $text = $this->option('prev_message');

        return $this->spanLi($class, $text);
    }

    /**
     * Previous disabled class.
     *
     * @return string Previous disabled class
     */
    private function previousDisabledClass()
    {
        return $this->option('css_prev_class').' '.$this->option('css_disabled_class');
    }

    /**
     * Previous enabled.
     *
     * @param string $page Page
     * @return string Previous enabled
     */
    public function previousEnabled($page)
    {
        $text = $this->option('prev_message');
        $class = $this->option('css_prev_class');

        return $this->pageWithTextAndClass($page, $text, $class);
    }

    /**
     * Next disabled.
     *
     * @return string Next disabled
     */
    public function nextDisabled()
    {
        $class = $this->nextDisabledClass();
        $text = $this->option('next_message');

        return $this->spanLi($class, $text);
    }

    /**
     * Next disabled class.
     *
     * @return string Next disabled class
     */
    private function nextDisabledClass()
    {
        return $this->option('css_next_class').' '.$this->option('css_disabled_class');
    }

    /**
     * Next enabled.
     *
     * @param string $page Page
     * @return string Next enabled
     */
    public function nextEnabled($page)
    {
        $text = $this->option('next_message');
        $class = $this->option('css_next_class');

        return $this->pageWithTextAndClass($page, $text, $class);
    }

    /**
     * First.
     *
     * @return string First
     */
    public function first()
    {
        return $this->page(1);
    }

    /**
     * Last.
     *
     * @param string $page Page
     * @return string Last
     */
    public function last($page)
    {
        return $this->page($page);
    }

    /**
     * Current.
     *
     * @param string $page Page
     * @return string Current
     */
    public function current($page)
    {
        $text = trim($page.' '.$this->option('active_suffix'));
        $class = $this->option('css_active_class');

        return $this->spanLi($class, $text);
    }

    /**
     * Separator.
     *
     * @return string Separator
     */
    public function separator()
    {
        $class = $this->option('css_dots_class');
        $text = $this->option('dots_message');

        return $this->spanLi($class, $text);
    }

    /**
     * Link li.
     *
     * @param string $class Class
     * @param string $href  Href
     * @param string $text  Text
     * @return string Link li
     */
    private function linkLi($class, $href, $text)
    {
        $liClass = $class ? sprintf(' class="%s"', $class) : '';

        return sprintf('<li%s><a href="%s" data-ajax="true">%s</a></li>', $liClass, $href, $text);
    }

    /**
     * Span li.
     *
     * @param string $class Class
     * @param string $text  Text
     * @return string Span li
     */
    private function spanLi($class, $text)
    {
        $liClass = $class ? sprintf(' class="%s"', $class) : '';

        return sprintf('<li%s><a>%s</a></li>', $liClass, $text);
    }
}
