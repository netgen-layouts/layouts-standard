Netgen Layouts standard blocks & layouts
========================================

This package provides a set of most used blocks and layouts for Netgen Layouts
for building rich content websites.

## Installation instructions

### Use Composer

Run the following from your installation root to install the package:

```bash
$ composer require netgen/layouts-standard
```

### Activate the bundle in your app kernel

Add the following to the list of activated bundles just after
`NetgenBlockManagerBundle`:

```php
$bundles = [
...

new Netgen\Bundle\BlockManagerStandardBundle\NetgenBlockManagerStandardBundle(),

...
];
```
