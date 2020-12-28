<?php

namespace My;

class Collaborator
{
    /**
     * @param \DateTime $time1
     * @return int
     */
    public function test(\DateTime $time1)
    {
        return $time1->getOffset();
    }
}
