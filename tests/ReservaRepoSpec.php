<?php

namespace tests\App;

use App\ReservaRepo;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReservaRepoSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ReservaRepo::class);
    }
}
