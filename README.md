PHP uploader
============

Description
-----------

Just an ugly and simple form for upload files using php.

Installation
------------

* Uncompress the zip file or clone it in a dir inside your hosting.

* Install [composer](https://getcomposer.org/download/) and then run ``` composer install ```

* Modify the .env file and enjoy.

* Notes: If you want to increase the upload files limit, check at *php.ini* the parameter *upload_max_filesize*. Check you have write permissions at /storage dir.

Dependencies
------------

* https://github.com/vlucas/phpdotenv

TODO
----

* Login.

* Better looking. I don't use any css. Maybe I could use a framework. Spoiler: I love [Bulma](https://bulma.io/).

* Copy the .env.example to .env and change parameters as your like.

* Refactor all into classes.

Inspiration
-----------

* https://www.tutorialrepublic.com/php-tutorial/php-file-upload.php

Author
------

* Jose Manuel Cerrejon Gonzalez (@ulysess10) ulysess[_at_]gmail[.]com - 2018

License
-------

* This work is licensed under a Creative Commons Attribution-ShareAlike 4.0 International License.