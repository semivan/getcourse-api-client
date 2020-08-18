# PHP API клиент для GetCourse

## Требования
* PHP >= 7.1
* [symfony/http-client](https://github.com/symfony/http-client/)


## Установка
```sh
composer require semivan/getcourse-api-client
```


## Использование
```php
$client  = new \Getcourse\GetcourseClient($account, $secretKey);
$manager = new \Getcourse\GetcourseManager($client);
```


### Экспорт пользователей
```php
$exportId = $manager
    ->exportUsers()
    ->setStatus('active')
    ->getExportId();

$users = $manager
    ->exportUsers()
    ->export($exportId);
```


### Экспорт заказов
```php
$exportId = $manager
    ->exportDeals()
    ->setCreatedAtPeriod('2020-08-01')
    ->getExportId();

$deals = $manager
    ->exportDeals()
    ->export($exportId);
```


### Создание пользователя
```php
$user = $manager->createUser()
    ->setEmail('client@email.com')
    ->setFirstName('FirstName')
    ->setLastName('LastName')
    ->setPhone('+77777777777')
    ->setCountry('Country')
    ->setCity('City')
    ->setRefresh(true)
    ->addGroup('group_name');

$response = $user->save();
```


### Создание заказа
```php
$deal = $manager->createDeal()
    ->setUser($user)
    ->setNumber('123XXX')
    ->setOfferCode('offer_code')
    ->setStatus(\Getcourse\Constants::DEAL_STATUS_NEW)
    ->setProductTitle('prod 01')
    ->setCost(1000)
    ->setIsPaid(true);

$response = $deal->save();
```