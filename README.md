# Lab Test

## Travail à faire

Test de l'interface CRUD Task


## Commandes 

```shell
    php artisan make:test TaskTest
```
Cela générera un fichier de test dans le tests/Feature directory.

```shell
    php artisan make:test TaskTest --unit
```
Cela générera un fichier de test dans le tests/Unit directory.



## Références

[https://laravel.com/docs/10.x](https://laravel.com/docs/10.x)










## why we can in the test send data without  CSRF Protection ?

When testing HTTP requests in Laravel using PHPUnit, Laravel provides a set of convenient testing methods that simulate HTTP requests and handle CSRF protection automatically. These testing methods, such as $this->get(), $this->post(), $this->put(), etc., internally handle CSRF protection by automatically adding the CSRF token to the request headers.


### helpers They were used

- **assertSuccessful** 
    Assert that the response has a successful (200) status code: 

```shell
    $response->assertSuccessful();
```

- **assertViewIs** 
  Assert that the given view was returned by the route : 

```shell
    $response->assertViewIs($value);
```
- **assertViewHas** 
 Assert that the response view was given a piece of data: 

```shell
    $response->assertViewHas($key, $value = null);
```

- **assertDatabaseHas** 
    Assert that a table in the database contains records matching the given key / value query constraints:
```shell
    $this->assertDatabaseHas('users', [
        'email' => 'sally@example.com',
    ]);
```

- **assertRedirect** 
  Assert that the response is a redirect to a given URI: 
```shell
    $response->assertRedirect($uri);
```

- **assertSessionHas** 
  Assert that the session contains the given piece of data:

```shell
    $response->assertSessionHas($key, $value = null);
```

- **assertDatabaseMissing** 
  Assert that a table in the database does not contain records matching the given key / value query constraints:

```shell
    $this->assertDatabaseMissing('users', [
        'email' => 'sally@example.com',
    ]);
```


