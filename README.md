# Symfony Didublab/CookielawBundle
This is a simple Symfony bundle to display a cookie law message on your **Symfony 4** and **Symfony 5** projects with small setup.

## Install the bundle:
Using composer

```composer
composer require didublab/cookielaw
```

## Render the cookie law:
In your twig, add the twig function where you want to load the cookie consent:

```twig
{{ cookie_law() }}
```

This is the minimum setup, but if you want more, you can configure a few options:

## Configure options:
Create a new config file in your config/packages/ directory, named for example: cookie_law.yaml
This are the available options with the default options:
```yaml
didublab_cookielaw:
    cookie_name: cookie-notice-accepted #the cookie name
    cookie_value: true #the cookie value
    cookie_days: 10 #cookie expiration in days
    cookie_readmore_route: false #the route where you want to redirect the users to the "read more" section
```

## Translations
You can translate the text of the cookie law at your needs
- Create inside the translations directory a file called cookielaw.(language).xliff
- Inside add the following content below and change the "target" tag with your translations
```xliff
<?xml version="1.0"?>
<xliff version="1.2" xmlns="urn:oasis:names:tc:xliff:document:1.2">
    <file source-language="en" target-language="en" datatype="plaintext" original="file.ext">
        <body>
            <trans-unit id="didublab_cookielaw_cookie_text">
                <source>didublab_cookielaw_cookie_text</source>
                <target>This website use cookies. By continuing to browse this website, you declare to accept the use of cookies.</target>
            </trans-unit>
            <trans-unit id="didublab_cookielaw_cookie_accept">
                 <source>didublab_cookielaw_cookie_accept</source>
                 <target>Accept</target>
            </trans-unit>
            <trans-unit id="didublab_cookielaw_cookie_readmore">
                 <source>didublab_cookielaw_cookie_readmore</source>
                 <target>More info</target>
            </trans-unit>
        </body>
    </file>
</xliff>
```
