HttpClient component
====================

This is a fork of [@nicolas-grekas 's pull request](https://github.com/symfony/symfony/pull/54179) for SymfonyHttpClient
that adds support for using AMPHPv5 with PHP >= 8.2 instead of waiting for PHP 8.4.

It solves the problem of the destructor suspension by deferring the destruction.

---

If you use this client, you should include this piece of code that executes when your application is closing 
(onShutdown, terminate event, etc.):

```php
\Revolt\EventLoop::run();
```

This ensures that all pending requests are completed before the application is closed and allows you to avoid PHP <8.4's destructor suspension.
