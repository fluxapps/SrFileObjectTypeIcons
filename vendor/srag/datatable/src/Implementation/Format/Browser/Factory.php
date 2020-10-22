<?php

namespace srag\DataTableUI\SrFileObjectTypeIcons\Implementation\Format\Browser;

use srag\DataTableUI\SrFileObjectTypeIcons\Component\Format\Browser\BrowserFormat;
use srag\DataTableUI\SrFileObjectTypeIcons\Component\Format\Browser\Factory as FactoryInterface;
use srag\DataTableUI\SrFileObjectTypeIcons\Component\Format\Browser\Filter\Factory as FilterFactoryInterface;
use srag\DataTableUI\SrFileObjectTypeIcons\Implementation\Format\Browser\Filter\Factory as FilterFactory;
use srag\DataTableUI\SrFileObjectTypeIcons\Implementation\Utils\DataTableUITrait;
use srag\DIC\SrFileObjectTypeIcons\DICTrait;

/**
 * Class Factory
 *
 * @package srag\DataTableUI\SrFileObjectTypeIcons\Implementation\Format\Browser
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class Factory implements FactoryInterface
{

    use DICTrait;
    use DataTableUITrait;

    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * Factory constructor
     */
    private function __construct()
    {

    }


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * @inheritDoc
     */
    public function default() : BrowserFormat
    {
        return new DefaultBrowserFormat();
    }


    /**
     * @inheritDoc
     */
    public function filter() : FilterFactoryInterface
    {
        return FilterFactory::getInstance();
    }
}
