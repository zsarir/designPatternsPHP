<?php

namespace Mobin\DesignPatterns\Patterns\Memento;


class Editor
{
    private  $list = [];

    public function createState()
    {
        return new Editorstate($this->list);
    }

    public function restoreState(Editorstate $state)
    {
        $this->list = $state->getlist();
    }

    /**
     * Set the value of list
     *
     * @return  self
     */
    public function setList($list)
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
