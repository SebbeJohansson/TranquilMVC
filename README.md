# TranquilMVC
This is a small MVC, written for small sites in mind.

## Features ##
- Routing, for clean and good-looking URLs
- PDO-connection to the database
- Templates

## Routing ##
The router splits the PATH_INFO by each /, and instantiates the requested view based on the route.
Example:
```
localhost/admin/login
```
Will instantiate the view named login.php from the admin-view folder.
```
/views
--/admin
--/--/login.php
```

This view is then rendered into a outputbuffer that is then rendered into the template, and the template is then rendered to the user.  
Then from the view-file, we can choose to instantiate the respective model, or not.

## PDO ##
What can I say, basic PDO. For an example, take a look at /models/admin/login.php

## TODO ##
- Implement a page-builder, or something to create new pages that are visible to the end-user, thinking of GrapesJs.
- Write clTemplate.php to have more functions and be able to modify the template before rendering.
- Write clView.php, modify and render view.
- Form-editor.
- Caching.
- SASS-compilation.
