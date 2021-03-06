Mustache.php
============

A [Mustache](http://defunkt.github.com/mustache/) implementation in PHP.


Usage
-----

A quick example:

    <?php
    include('Mustache.php');
    $m = new Mustache;
    echo $m->render('Hello {{planet}}', array('planet' => 'World!'));
    // "Hello World!"
    ?>


And a more in-depth example--this is the canonical Mustache template:

    Hello {{name}}
    You have just won ${{value}}!
    {{#in_ca}}
    Well, ${{taxed_value}}, after taxes.
    {{/in_ca}}


Along with the associated Mustache class:

    <?php
    class Chris extends Mustache {
        public $name = "Chris";
        public $value = 10000;
    
        public function taxed_value() {
            return $this->value - ($this->value * 0.4);
        }
    
        public $in_ca = true;
    }


Render it like so:

    <?php
    $c = new Chris;
    echo $chris->render($template);
    ?>


Here's the same thing, a different way:

Create a view object--which could also be an associative array, but those don't do functions quite as well:

    <?php
    class Chris {
        public $name = "Chris";
        public $value = 10000;
    
        public function taxed_value() {
            return $this->value - ($this->value * 0.4);
        }
    
        public $in_ca = true;
    }
    ?>


And render it:

    <?php
    $chris = new Chris;
    $m = new Mustache;
    echo $m->render($template, $chris);
    ?>




Known Issues
------------

 * Things get weird when you change delimiters inside a section -- `delimiters` example currently fails with an
   "unclosed section" exception.


See Also
--------

 * [Readme for the Ruby Mustache implementation](http://github.com/defunkt/mustache/blob/master/README.md).
 * [mustache(1)](http://defunkt.github.com/mustache/mustache.1.html) and [mustache(5)](http://defunkt.github.com/mustache/mustache.5.html) man pages.