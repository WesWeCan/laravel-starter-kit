<?php

use Tests\DuskTestCase;
use Tests\TestCase;

pest()->extend(DuskTestCase::class)
    ->in('Browser');

pest()->extend(TestCase::class)
    ->in('Feature');
