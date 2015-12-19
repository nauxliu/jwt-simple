# jwt-simple

[JWT(JSON Web Token)](http://self-issued.info/docs/draft-jones-json-web-token.html) encode and decode module for PHP.

## Install

    $ composer require naux/jwt

## Usage

```php
$secret = 'xxx';

$jwt = new \Naux\JWT($secret); 
$payload = ['iss' => 1, 'exp' => 1450539234, 'foo' => 'bar'];

// encode
$token = $jwt->encode($payload);

// decode
$decoded = $jwt->decode($token);

var_dump($decoded);
```

### Algorithms

By default the algorithm to encode is `HS256`.

The supported algorithms for encoding and decoding are `ECDSA`, `ES256`, `ES384`, `ES512`, `HMAC`, `HS256`, `HS384`, `HS512`, `PublicKey`, `RS256`, `RS384`, `RS512`, `RSA`.

```php
// using HS512
$jwt = new JWT('secret', 'HS512');
```
