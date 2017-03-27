# <% composer.name %>

## Getting started
#### After installation
``` bash
# Install dependencies
composer install

# Install dependencies for automatic tests
npm install
```


## Development
#### Service provider
Your package service provider can be found in ```src/Providers/ServiceProvider.php```.

See [ Laravel documentations ](https://laravel.com/docs/5.3/packages#service-providers) for mor information.

#### Configuration
Your package configurations can be changed in ```config/```.

See [ Laravel documentations ](https://laravel.com/docs/5.3/database-testing#writing-factories) for mor information.

#### Migrations
Your migrations should be added in ```database/migrations/```.

See [ Laravel documentations ](https://laravel.com/docs/5.3/migrations) for mor information.

#### Factories
You can edit your factoreis in ```database/factories/ModelFactory.php```.

See [ Laravel documentations ](https://laravel.com/docs/5.3/database-testing#writing-factories) for mor information.

#### Write tests
We use [PHPUnit](https://phpunit.de/) to write tests.
For more information check out [https://laravel.com/docs/5.3/testing](https://laravel.com/docs/5.3/testing)

Add your tests in ```tests/``` folder.

Your migrations will automaticly be added before each test.
``` php
class MyTest extends TestCase {
    /*
     * This function will run before each test.
     * ( Optional )
     */
    public function setUp()
    {
        parent::setUp();
        // Your logic here
    }

    /** @test */
    public function my_first_test() {
        $this->assertTrue( true );
    }
}
```

## Usage after development
Run ```composer require <% composer.name %>```

Create your package and add the following line to ```providers``` in ```config/app.php``` 
```
<% package.namespace %>\Providers\ServiceProvider::class,
```


#### Runing tests
``` bash
# Run one time
npm run test

# Automaticly run test on changes
npm run dev
```
