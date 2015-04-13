<?php

namespace tests\Happyr\DoctrineSpecification\Query;

use Doctrine\ORM\QueryBuilder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OrderBySpec extends ObjectBehavior
{
    private $alias = 'a';
    private $field = 'foo';
    private $order = 'ASC';

    function let()
    {
        $this->beConstructedWith($this->field, $this->order, $this->alias);
    }

    public function it_should_modify_query_builder(QueryBuilder $qb)
    {
        $sort = sprintf('%s.%s', $this->alias, $this->field);
        $qb->orderBy($sort, $this->order)->shouldBeCalled();

        $this->modify($qb, $this->alias);
    }
}
