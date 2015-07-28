Templates System [![Build Status](https://travis-ci.org/SuperdeskWebPublisher/templates-system.svg?branch=master)](https://travis-ci.org/SuperdeskWebPublisher/templates-system) [![Code Climate](https://codeclimate.com/github/SuperdeskWebPublisher/templates-system/badges/gpa.svg)](https://codeclimate.com/github/SuperdeskWebPublisher/templates-system) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/SuperdeskWebPublisher/templates-system/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/SuperdeskWebPublisher/templates-system/?branch=master)
=====

Build fully functional templates system easy to use for your templators!

Features
========

### Twig tags:


**gimme**


Tag ```gimme``` have one required parameter and one optional:

 * (required) Meta object type (and name of variable available inside block) ex.: *article*
 * (optional) Keword `with` and parameters for Meta Loader ex.: `{ param: "value" }`

```twig

    {% gimme article %}
        {# article Meta will be available under "article" variable inside block #}
        {{ article.title }}
    {% endgimme %}
```

Meta Loaders sometimes requires some special parameters - like article number, language, user id etc.. 

```twig

    {% gimme article with { articleNumber: 1 } %}
        {# Meta Loader will use provided parameters to load article Meta #}
        {{ article.title }}
    {% endgimme %}
```

**gimmelist**


Tag ```gimmelist``` have two required parameter and two optional:

 * (required) Name of variable available inside block: `article`
 * (required) Keword `from` and type of requested Meta's in collection: `from articles` with filters passed to Meta Loader as extra parameters (`start`, `limit`, `order`)
 * (optional) Keword `with` and parameters for Meta Loader ex.: `with {foo: 'bar', param1: 'value1'}`
 * (optional) Keword `if` and expresion used for results filtering

required parameters:

```twig

    {% gimmelist article from articles %}
        {{ article.title }}
    {% endgimmelist %}
```

all parameters:

```twig

    {% gimmelist article from articles|start(0)|limit(10)|order('id', 'desc') 
        with {foo: 'bar', param1: 'value1'} 
        if article.title == "New Article 1"
    %}
        {{ article.title }}
    {% endgimmelist %}
```
