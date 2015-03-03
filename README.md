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
