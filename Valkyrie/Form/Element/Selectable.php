<?php

namespace Valkyrie\Form\Element;

use Valkyrie\Form\Element;
use Valkyrie\Form\Element\Selectable\Option;

/**
 * Base template for input types, with multiple options
 * @abstract
 */
abstract class Selectable extends Element{

    /**
     * Array of Option objects
     * @var Option[]
     */
    private $options = [];

    /**
     * Selectable constructor.
     * @param string $name The name attribute for this Element
     */
    public function __construct(string $name){
        parent::__construct($name);
    }

    /**
     * Adds a new Option to the Selectable option-list
     * @param Option $option The Option object to add to the Selectable
     */
    public function addOption(Option $option): void{
        array_push($this->options, $option);
    }

    /**
     * Returns a list of Selectable Options for this Element
     * @return array Array of Option
     */
    public function getOptions(): array{
        return $this->options;
    }
}