<?php

namespace srag\DataTableUI\SrFileObjectTypeIcons\Implementation\Column\Formatter;

use srag\CustomInputGUIs\SrFileObjectTypeIcons\PropertyFormGUI\Items\Items;
use srag\DataTableUI\SrFileObjectTypeIcons\Component\Column\Column;
use srag\DataTableUI\SrFileObjectTypeIcons\Component\Data\Row\RowData;
use srag\DataTableUI\SrFileObjectTypeIcons\Component\Format\Format;

/**
 * Class ChainGetterFormatter
 *
 * @package srag\DataTableUI\SrFileObjectTypeIcons\Implementation\Column\Formatter
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ChainGetterFormatter extends DefaultFormatter
{

    /**
     * @var array
     */
    protected $chain;


    /**
     * @inheritDoc
     *
     * @param array $chain
     */
    public function __construct(array $chain)
    {
        parent::__construct();

        $this->chain = $chain;
    }


    /**
     * @inheritDoc
     */
    public function formatRowCell(Format $format, $value, Column $column, RowData $row, string $table_id) : string
    {
        $chains = $this->chain;

        $value = $row(array_shift($chains));

        foreach ($chains as $chain) {
            $value = Items::getter($value, $chain);
        }

        return parent::formatRowCell($format, $value, $column, $row, $table_id);
    }
}
