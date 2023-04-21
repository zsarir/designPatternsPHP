<?php

namespace Mobin\DesignPatterns\Pattern\Memento;

class History
{
    public array $history;
    public function push(Editorstate $list)
    {
        $this->history[] = $list;
        return $this;
    }
    public function pop()
    {
        array_pop($this->history);
        return array_pop($this->history);
    }
}
