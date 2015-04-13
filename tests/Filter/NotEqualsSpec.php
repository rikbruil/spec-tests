<?php

namespace tests\Happyr\DoctrineSpecification\Filter;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\QueryBuilder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NotEqualsSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('age', 18, 'a');
    }

    public function it_is_an_expression()
    {
        $this->shouldBeAnInstanceOf('Happyr\DoctrineSpecification\Filter\Comparison');
    }

    public function it_returns_comparison_object(QueryBuilder $qb, ArrayCollection $parameters)
    {
        $qb->getParameters()->willReturn($parameters);
        $parameters->count()->willReturn(10);

        $qb->setParameter('comparison_10', 18)->shouldBeCalled();

        $this->getFilter($qb, null)
            ->shouldReturn('a.age <> :comparison_10');
    }

    public function it_uses_comparison_specific_dql_alias_if_passed(QueryBuilder $qb, ArrayCollection $parameters) {
        $this->beConstructedWith('age', 18, null);

        $qb->getParameters()->willReturn($parameters);
        $parameters->count()->willReturn(10);

        $qb->setParameter('comparison_10', 18)->shouldBeCalled();

        $this->getFilter($qb, 'x')->shouldReturn('x.age <> :comparison_10');
    }
}
