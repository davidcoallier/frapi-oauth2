Frapi OAuth2 Plugin
===================

OAuth2 Authentication is not built within FRAPI as it requires some sort of user-interaction (initial authorization) but we provide
helpers for developers to retrieve the access_token passed to the API. 

Even though OAuth does not automatically tie in with the FRAPI Authentication, it is fairly simply for developers to accept acces_tokens
using the Frapi-OAuth2 Helper.

introduction
------------
In order to get the OAuth2 Helper running you have to do a few things. Follow the steps below and you might be running in no time.

  1. If it doesn't exist already, create a **Library** directory in your FRAPI CUSTOM_PATH. 
  2. In that **Library** directory, create the following directories **Frapi/Plugins/OAuth2**. This can be done by doing **mkdir -p Frapi/Plugins/OAuth2**. Alternatively you can do: ***cd FRAPI_CUSTOM_PATH; mkdir Library; cd Library; git clone git://github.com/davidcoallier/frapi-oauth2.git .***. The Dot at the end is important.
  3. If you used **git clone** in step 2, skip this step and go to step 4. Copy the content of the *Frapi/Plugins/OAuth2/* in this repository to the one you created in your FRAPI install. 
  5. Add the following to your custom/AllFiles.php

	defined('CUSTOM_LIBRARY') || define('CUSTOM_LIBRARY', CUSTOM_PATH. DIRECTORY_SEPARATOR . 'Library');
	defined('CUSTOM_LIBRARY_FRAPI_PLUGINS') || 
		define('CUSTOM_LIBRARY_FRAPI_PLUGINS', CUSTOM_LIBRARY . DIRECTORY_SEPARATOR . 'Frapi' . DIRECTORY_SEPARATOR . 'Plugins');

	require CUSTOM_LIBRARY_FRAPI_PLUGINS . DIRECTORY_SEPARATOR . 'OAuth2' . DIRECTORY_SEPARATOR . 'Auth.php';


Auth.php
--------
In the **Library/Frapi/OAuth2/Auth.php** file, you should see a method called: authorize() which is documented explicitely inline
and should give you enough directions.


Authenticating the Users per action
-----------------------------------
As the OAuth2 Authorization is not built-in, here's how you use the OAuth2 helper to authorize your users.

In your `Action/Name.php` file you have 2 choices. Either you modify every `execute(POST|GET|DELETE|HEAD|ETC)` to contain
a check or you create a constructor that will be invoked on every action request.

The check is essentially this code:

    $auth = Frapi_Plugins_OAuth2_Auth($this->getParams());
    $auth->authorize();

If this check fails to find an access_token in the request or in the headers, it throws an error with HTTP code 401 and
the proper error message+format.


Example
-------
The `examples` directory located in this repository contains the structure of a `custom/Action/Example.php` FRAPI action that 
would have the OAuth2 verification in the constructore so all HTTP methods in this collection/resource are required to be
authenticated via OAuth2
