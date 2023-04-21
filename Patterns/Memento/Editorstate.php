<?php

namespace Mobin\DesignPatterns\Pattern\Memento;

class Editorstate
{
    private array $list;
    public function __construct($list)
    {
        $this->list = $list;
        return $this;
    }

    /**
     * Get the value of list
     */
    public function getList()
    {
        return $this->list;
    }
}
