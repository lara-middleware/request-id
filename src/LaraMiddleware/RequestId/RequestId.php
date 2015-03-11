<?php namespace LaraMiddleware\RequestId;

use Closure;
use Illuminate\Contracts\Routing\Middleware;


class RequestId implements Middleware {

    /**
     * The generator instance.
     *
     * @var LaraMiddleware\RequestId\UuidGenerator
     */
    protected $generator;

    /**
     * Create a new filter instance.
     *
     * @param  LaraMiddleware\RequestId\UuidGenerator  $generator
     * @return void
     */
    public function __construct(UuidGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
    * Add request id to response header.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return \Illuminate\Http\Response
    */
    public function handle($request, Closure $next)
    {
        $requestId = $this->generator->getV4Uuid();

        $request->merge([ 'request-id' => $requestId ]);

        $response = $next($request);

        $response->headers->set('Request-Id', $requestId, false);

        return $response;
    }

}
