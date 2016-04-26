# DengruCMS
DengruCMS is a PHP-powered content management system/framework created with the PDO database extension. It features a instant, flexible and creative way to create/manage your website and content. This framework was created in a project with the intention of implementing an smooth and easy way of managing and allowing continuous development of a website's frontend.

Features:
* Dashboard - a smooth and neat control panel that allows the website manager to create, manage and develop a website. It consists of different sections, one that implements page management, another one for user management for instance. It's very user friendly and easy to use.

* Dynamic Address Routing - a feature that implements dynamic url addressing, which allows for better robot-crawling and better flexibility for the frontend. It simply routes an address action like "index.php?q=page&id=154" to the page's namealias that is set from within the dashboard, in the page section. For example, a namealias can be something like "about-us" or "my-blog". This feature works with a webserver like Apache and Nginx or any other that supports dynamic url-rewriting.

* User Management - a simplified way to take control over the users of the website. Who is who, and who is the admin. This section features creation and deletion of users.

* Dynamic Templating - the backend-content is handled by rending html/php-templates instead of loading the page header and footer more than just a single time. A template might have a name like "index.tpl" or "thread.tpl", and each one of these handles their own content and purpose. For instance, the "thread.tpl" template is rendered when a user enters a thread in the forum board. This is a very neat feature that allows for pure creativity.

* PDO - the software is writed using the PDO-extention within the MySQL-package, with the purpose of allowing any type of database that supports the PDO-driver to be used, in other words, this system doesn't constrain you to use the regular MySQL database. Instead you can use the one you prefer the best. It could be MySQLi, MSSQL or postgresql. Pick and go!

* ... and many other features!


This software is copyrighted and prohibited for any unauthorized usage.

DengruCMS, by Dennis Grundelius - All rights reserved (c) 2016.
