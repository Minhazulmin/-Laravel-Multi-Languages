# Laravel-Multi-Languages
Laravel's localization features provide a convenient way to retrieve strings in various languages, allowing you to easily support multiple languages within your application.

## Output
![App Screenshot](https://i.postimg.cc/9MQBzGCg/qr-code-generator.png)


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div>
        <label for="">Languages</label>
        <select class="changeLang">
            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}> {{ __('home.English') }}
            </option>
            <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}> {{ __('home.Bangla') }}
            </option>
        </select>
    </div>

    <div>
        {{ __('home.title') }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
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

**[Step - 3]** **Language setup:** create a folder on root directory (lang)
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

