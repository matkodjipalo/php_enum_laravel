<?php

namespace App;


class ConnectionStatusType
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var array
     */
    private static $supported = [
        'pending',
        'accepted',
        'rejected'
    ];

    /**
     * @param string $type
     *
     * @throws \InvalidArgumentException
     */
    private function __construct($type)
    {
        if (!in_array($type, self::$supported)) {
            throw new \InvalidArgumentException('Connection status type '.$type.' not supported.');
        }

        $this->type = $type;
    }

    /**
     * @param string $type
     *
     * @return self
     */
    public static function createFromString($type)
    {
        return new self($type);
    }

    /**
     * @return self
     */
    public static function pending()
    {
        return new self('pending');
    }

    /**
     * @return self
     */
    public static function accepted()
    {
        return new self('accepted');
    }

    /**
     * @return self
     */
    public static function rejected()
    {
        return new self('rejected');
    }

    /**
     * @return array
     */
    public static function getSupportedTypes()
    {
        return self::$supported;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->type;
    }
}
