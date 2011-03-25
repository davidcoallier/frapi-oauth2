<?php
/**
 * Custom Authorization Example
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://getfrapi.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@getfrapi.com so we can send you a copy immediately.
 *
 * The custom authorization class
 *
 * @uses      Frapi_Authorization_HTTP_Digest
 * @license   New BSD
 * @copyright echolibre ltd.
 * @package   frapi
 */
/**
 *
 * @license   New BSD
 * @copyright echolibre ltd.
 * @package   frapi
 */
class Custom_Model_Auth
{
    public static function authorize($params)
    {
        $auth = new Frapi_Plugins_OAuth2_Auth($params);
        $auth->authorize();
    }
}
