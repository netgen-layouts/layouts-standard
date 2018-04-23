Netgen Block Manager standard blocks & layouts
==============================================

This bundle provides standard blocks and layouts used by Netgen to build websites.

## Installation instructions

### Use Composer

Run the following from your installation root to install the package:

```bash
$ composer require netgen/block-manager-standard:^1.0
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
