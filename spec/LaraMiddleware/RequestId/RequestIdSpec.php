<?php namespace spec\LaraMiddleware\RequestId;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Closure;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use LaraMiddleware\RequestId\UuidGenerator;

class RequestIdSpec extends ObjectBehavior
{

    static protected $generator;

    function let(UuidGenerator $generator)
    {
        static::$generator = $generator;

        $this->beConstructedWith($generator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LaraMiddleware\RequestId\RequestId');
    }

    function it_should_set_response_time_to_response_header(Request $req,
                                                            Response $res,
                                                            ResponseHeaderBag $bag)
    {
        $res->headers = $bag;

        $uuid = '25769c6c-d34d-4bfe-ba98-e0ee856f3e7a';

        static::$generator->getV4Uuid()->willReturn($uuid);

        $req->merge([ 'request-id' => $uuid ])->shouldBeCalled();

        $bag->set('Request-Id', $uuid, false)->shouldBeCalled();

        $next = function($req) use ($res) {
            return $res->getWrappedObject();
        };

        $this->handle($req, $next)->shouldReturn($res);
    }
}
