<?php

namespace tests\Happyr\DoctrineSpecification\Query;

use Doctrine\ORM\QueryBuilder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OffsetSpec extends ObjectBehavior
{
    private $offset = 2;

    function let()
    {
        $this->beConstructedWith($this->offset);
    }

    function it_is_a_query_modifier()
    {
        $this->shouldBeAnInstanceOf('Happyr\DoctrineSpecification\Query\QueryModifier');
    }

    function it_should_set_first_result(QueryBuilder $qb)
    {
        $qb->setFirstResult($this->offset)->shouldBeCalled();

        $this->modify($qb, 'a');
    }
}
