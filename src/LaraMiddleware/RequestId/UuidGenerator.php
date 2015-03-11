<?php namespace LaraMiddleware\RequestId;

use Rhumsaa\Uuid\Uuid;


class UuidGenerator {

    /**
    * Get version4 uuid.
    *
    * @return string
    */
    public function getV4Uuid()
    {
        return Uuid::uuid4()->toString();
    }

}
