<?php

namespace Test;
/**
 * @Sample value=1
 * @SampleTest value=1, test=2
 **/
class EntityTestClass {
    /**
     * @ORM table=entity
     * @Test
     */
    private $test = 1;
}