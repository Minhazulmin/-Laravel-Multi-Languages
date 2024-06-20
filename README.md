# Laravel-Multi-Languages
Laravel's localization features provide a convenient way to retrieve strings in various languages, allowing you to easily support multiple languages within your application.

## Output
![App Screenshot](https://i.postimg.cc/pX9Zkc1X/Screenshot-1.png)


## Installation

**[Step - 1]** **Create new Project:**<br/>
(Open PowerShell In Your Local Machine and put this command)
 ```bash
Laravel new laravel-multi-languages
```
**[Step - 2]** **Remove unnecessary code from welcome.blade.php, After that copy and past code into this file:**
```bash
 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="">
        <div class="border-bottom">

        
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="d-block my-1" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2">Features</a></li>
        <li><a href="#" class="nav-link px-2">Pricing</a></li>
        <li><a href="#" class="nav-link px-2">FAQs</a></li>
        <li><a href="#" class="nav-link px-2">About</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2">Login</button>
        <button type="button" class="btn btn-primary">Sign-up</button>
      </div>
      <div class="col-md-1 text-end">
         <!-- Languages --->
        <select class="changeLang form-select">
            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}> {{ __('home.English') }}
            </option>
            <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}> {{ __('home.Bangla') }}
            </option>
        </select>
      </div>
    </header>
        </div>
        </div>
    </main>
  

    <div style="margin-top: 16%; margin-left: 40%; font-size: x-large;">
        {{ __('home.title') }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        var url = "{{ route('change_lang') }}";
        document.querySelectorAll(".changeLang").forEach(function(element) {
            element.addEventListener('change', function() {
                window.location.href = url + "?lang=" + this.value;
            });
        });
    </script>
</body>

</html>




```

**[Step - 3]** **create a folder on root directory (lang):** </br> Then Create two folder **en** and **bn** After that make a file **home.php** ( See the folder structure in below ) 
```bash
   lang/en/home.php
   lang/bn/home.php
```
**[Step - 4]** **Copy and past into file**</br>


**lang/en/home.php**
```bash
  <?php
    return [
      'title'   => 'I love coding',
      'English' => 'English',
      'Bangla'  => 'Bangla',
    ];
  ?>
```

**lang/bn/home.php**
```bash
<?php
  return [
      'title'   => 'আমি কোডিং ভালোবাসি',
      'English' => 'ইংরেজি',
      'Bangla'  => 'বাংলা',
    ];
?>
```
**[Step - 5]** **Make a Route on the web.php:** 
```bash
   use App\Http\Controllers\LangController;

   Route::get( 'lang/change', [LangController::class, 'change'] )->name( 'change_lang' );


```
**[Step - 6]** **Make a controller:** 
```bash
 php artisan make:controller LangController 
```

**Copy and post on the controller**
```bash
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller {
    /**
     * Change language
     *
     */
    public function change( Request $request ) {
        App::setLocale( $request->lang );
        session()->put( 'locale', $request->lang );

        return redirect()->back();
    }
}
```
**[Step - 7]** **Make a Middleware:** 
```bash

 php artisan make:middleware LanguageManager 

```
**[Step - 8]** **Copy and past on the middleware**
```bash
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LanguageManager {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle( Request $request, Closure $next ): Response {
        if ( session()->has( 'locale' ) ) {
            App::setLocale( session()->get( 'locale' ) );
        }

        return $next( $request );
    }
}

```
**[Step - 9]** **Then register middleware on the bootstrap/app.php, Inside the withMiddleware; Look like this** 
```bash
    ->withMiddleware( function ( Middleware $middleware ) {
        $middleware->web( append: [
            \App\Http\Middleware\LanguageManager::class,
        ] );
    } )
```
**[Step - 10]** **run the command on the project terminal** 
```bash
 	php artisan serve
```
Hit the url
```bash
	http://127.0.0.1:8000/
```
## Authors

- [@minhazulmin](https://www.github.com/minhazulmin)

