AMPHPv5 for Symfony HttpClient
====================

This is a partial fork of [@nicolas-grekas 's pull request](https://github.com/symfony/symfony/pull/54179) for SymfonyHttpClient
that adds support for using AMPHPv5 with PHP >= 8.2 instead of waiting for PHP 8.4.

**This is not a full fork that replaces the original Symfony HttpClient, but a separate package that can be used alongside it.**

The code for HTTP client and it's other adapters is removed, only it's AMPHPv5-related and necessary `@internal` code is kept.

It solves the problem of the destructor suspension by deferring the destruction.

### Usage

```sh
composer require riki137/amp-client
```

```php
use Riki137\AmpClient\AmpHttpClientV5;

$client = new AmpHttpClientV5($options, null, $maxHostConnections, $maxPendingPushes); 
// implements HttpClientInterface, as you're used to
$client->request('GET', 'https://example.com');
```

---

If you use this client, you should include this piece of code that executes when your application is closing 
(onShutdown, terminate event, etc.):

```php
\Revolt\EventLoop::run();
```

This ensures that all pending requests are completed before the application is closed and allows you to avoid PHP <8.4's destructor suspension.
