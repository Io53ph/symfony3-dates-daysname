#Shows a ```\Datetime``` object's day's name.

[![Build Status](https://travis-ci.org/axidepuy/dates-days-name.svg?branch=master)](https://travis-ci.org/axidepuy/dates-days-name)

It is basically an ```$obj->format("l")``` however you can define different locales than the current one, just for the day's name itself.

## INSTALLATION

Currently with composer, using vcs repository

```
// composer.json
"repositories" : [
    {
        "type" : "vcs",
        "url" : "https://github.com/axidepuy/dates-days-name.git"
    }
]
```
then
```composer require axidepuy/dates-days-name:dev-master```

## CONFIGURATION

Register the bundle:

```php
<?php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new Axidepuy\Bundle\AxidepuyDatesDaysNameBundle\AxidepuyDatesDaysNameBundle(),
    );
    // ...
}
```

Enable the translation component:

```yaml
# app/config/config.yml
framework:
    # ...
    translator:      { fallback: %locale% }
```
without the translation enabled: ids will appear, instead of the translated name

## USAGE

In the controller (through the helper service):
```php
<?php
echo $this->get('axidepuy.datesdaysname.date_helper')->getDaysNameByDate(new \Datetime("2016-08-09"));
// it will show the day's name in the current local
echo $this->get('axidepuy.datesdaysname.date_helper')->getDaysNameByDateAndLocale(new \Datetime("2016-08-09"), "hu");
// in a different language
```

In the twig template:
```php
...
    return array(
        // pass the object
        'now' => new \Datetime("now"),
    );
...
```

```html+jinja
{{ now|days_name("hu") }}
or
{{ days_name(now, "hu") }}
```

## TODO
* support for strings, not just Datetime objects
* adding more language files (currently it has just two :S)
* register at packagist
* PHPDoc
* installation with composer (not just vcs)
