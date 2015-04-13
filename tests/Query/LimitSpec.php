<?php

namespace tests\Happyr\DoctrineSpecification\Query;

use Doctrine\ORM\QueryBuilder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LimitSpec extends ObjectBehavior
{
    private $limit = 2;

    function let()
    {
        $this->beConstructedWith($this->limit);
    }

    function it_is_a_query_modifier()
    {
        $this->shouldBeAnInstanceOf('Happyr\DoctrineSpecification\Query\QueryModifier');
    }

    function it_should_set_max_results(QueryBuilder $qb)
    {
        $qb->setMaxResults($this->limit)->shouldBeCalled();

        $this->modify($qb, 'a');
    }
}
