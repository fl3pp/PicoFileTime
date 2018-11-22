# PicoFileTime
A pico plugin to take the creation date from the file last write time.

Features 100% test coverage (without wrappers and connectors)

Pull requests welcome!

### Installation
Install via composer `composer require jflepp/picofiletime`

### Usage in themes

~~~ twig
{% for page in pages %}
    <li>{{ page.id }} - <a href="{{ page.url }}">{{ page.url }}</a> - {{ page.meta.creation_date }}</li>
{% endfor %}
~~~

~~~ twig
{{ current_page.meta.creation_date }}
~~~
