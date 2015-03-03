# Query Builder

```php
use VKauto\Utils\QueryBuilder;

# https://api.vk.com/method/users.get?user_id=1
$query = QueryBuilder::buildURL('users.get',
[
  'user_id' => 1
]);

/**
* Array
* ['method'] => 'users.get',
* ['parameters'] => ['user_id' => 1]
**/
$data = QueryBuilder::parseURL('https://api.vk.com/method/users.get?user_id=1');
```

# Request
```php
use VKauto\Utils\Request;

# Обычный GET запрос
$response = Request::get('http://google.com');

# POST запросы тоже иногда нужны
$response = Request::post('http://somewhere.net',
[
  'something' => 'Some text'
]);

# Запрос возвращает JSON
$response = Request::VK('https://api.vk.com/method/users.get?user_id=1');

# Если вторым аргументом передать инициализированный класс \VKauto\CaptchaRecognition\Captcha, то капча будет распознаваться и отправляться автоматически, если потребуется
use VKauto\CaptchaRecognition\Captcha;
// ...
$captcha = new Captcha(Captcha::AntiCaptchaService, 'api key');
$response = Request::VK('https://api.vk.com/method/users.get?user_id=1', $captcha);

# А еще можно использовать QueryBuilder
use VKauto\Utils\QueryBuilder;
// ...
$response = Request::VK(QueryBuilder::buildURL('users.get', ['user_id' => 1]));
```

# Log
```php
use VKauto\Utils\Log;

# [H:i:s d.m.Y] [prefixes] [are] [cool] Something clever.
Log::write('Something clever.', ['prefixes', 'are', 'cool']);
```
