<?php

namespace Naux\JWT;

use Namshi\JOSE\JWS;

class JWT
{
    protected $jws = null;
    protected $secret = null;
    protected $algo = null;

    public function __construct($secret, $algo = 'HS256')
    {
        $this->secret = $secret;
        $this->algo   = $algo;
        $this->jws    = new JWS(['typ' => 'JWT', 'alg' => $algo]);
    }

    public function decode($token)
    {
        $jws = $this->jws->load($token, false);

        if (! $jws->verify($this->secret, $this->algo)) {
            throw new Exception('Token Signature could not be verified.');
        }

        return (array) $jws->getPayload();
    }

    public function encode($payload)
    {
        $this->jws->setPayload($payload)->sign($this->secret);
        return (string) $this->jws->getTokenString();
    }
}
