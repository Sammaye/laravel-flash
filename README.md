# laravel-flash
My very first plugin, based on https://github.com/laracasts/flash

This is strictly designed as a session based alert for errors and the such.

This is not supposed to be used as a general alert.

## How to make an alert

To make an alert:

```php
Flash::error('You got hell to pay')
```

which supports these types of alerts:

- error
- success
- warning
- info

### How to make it dismissible

Simply add a second paramter of `true` or `false` depending on whether you want it dismissible or not.

```php
Flash::error('You got hell to pay', true)
```

This alert can be dismissed because it has the second parameter of `true`.

## How to display alerts in my template

Simple:
```php
@include('flash::flash')
```

This plugin registers all of its views at the flash namespace and only has one view, `flash`.

This plugin also registers the view for publishing as such you can do this to enable the view to be overridden:

```php
php artisan vendor:publish --provider="sammaye\Flash\Providers\FlashServiceProvider"
``` 
