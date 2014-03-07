<?php

namespace spec\Knp\FriendlyContexts\Symfony\HttpKernel;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;

class FriendlyKernelSpec extends ObjectBehavior
{
    function let(BundleInterface $bundle)
    {
        $this->beConstructedWith('test', false);
    }

    function getMatchers()
    {
        return [
            'contains' => function ($subject, $value) { return in_array($value, $subject); },
        ];
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Knp\FriendlyContexts\Symfony\HttpKernel\FriendlyKernel');
    }

    function it_return_bundle_to_register()
    {
        $this->registerBundles()->shouldBeArray();
    }

    function it_register_a_new_bundle($bundle)
    {
        $this->registerBundles()->shouldNotContains($bundle);

        $this->addBundle($bundle)->shouldReturn($this);

        $this->registerBundles()->shouldContains($bundle);
    }
}
