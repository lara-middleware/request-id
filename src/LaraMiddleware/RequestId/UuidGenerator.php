<?php namespace LaraMiddleware\RequestId;

use Rhumsaa\Uuid\Uuid;


class UuidGenerator {

    /**
    * Get version4 uuid.
    *
    * @return string
    */
    private function getV4Uuid()
    {
        return Uuid::uuid4()->toString();
    }

}
