# Netgen Layouts standard blocks & layouts

This package provides a set of most used blocks and layouts for Netgen Layouts
for building rich content websites. It is a starting point when installing
Netgen Layouts.

Read the [installation instructions](https://docs.netgen.io/projects/layouts/en/latest/getting_started/install_existing_project.html)
on how to install the complete Netgen Layouts to your Symfony based app.

As an alternative, you can use the following repositories with Netgen Layouts
preinstalled to bootstrap your project:

* [Integration with eZ Platform](https://github.com/netgen-layouts/layouts-ezplatform-site)
* [Integration with Sylius](https://github.com/netgen-layouts/layouts-sylius-site)
* [Integration with Contentful](https://github.com/netgen-layouts/layouts-contentful-site)
* [Integration with Symfony](https://github.com/netgen-layouts/layouts-symfony-site)

These are kept uptodate as new versions of 3rd party products are released.

## For developers

Running tests requires that you have complete vendors installed, so run
`composer install` before running the tests.

### Unit tests

Run the unit tests by calling `composer test` from the repo root:

```
$ composer test
```

### PHPStan static analysis

All code is statically analysed with PHPStan. Make sure that PHPStan is green
for the entire codebase after your changes. Run the following two commands to
run PHPStan for the library/bundle code and for tests code, respectivelly:

```
$ composer phpstan
```

```
$ composer phpstan-tests
```

### Coding standards

This repo uses PHP CS Fixer and rules defined in `.php-cs-fixer.php` file to enforce coding
standards. Please check the code for any CS violations before submitting patches:

```
$ php-cs-fixer fix
```
