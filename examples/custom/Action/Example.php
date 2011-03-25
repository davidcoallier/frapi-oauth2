<?php

/**
 * Action Example
 *
 * @link http://getfrapi.com
 * @author Frapi <frapi@getfrapi.com>
 * @link /example
 */
class Action_Example extends Frapi_Action implements Frapi_Action_Interface
{

    /**
     * Required parameters
     *
     * @var An array of required parameters.
     */
    protected $requiredParams = array();

    /**
     * The data container to use in toArray()
     *
     * @var A container of data to fill and return in toArray()
     */
    private $data = array();

    /**
     * To Array
     *
     * This method returns the value found in the database
     * into an associative array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }

    /**
     * Constructor
     *
     * We put a comment in here because the Zend Framework
     * code generate behaves oddly when a method doesn't have a
     * docblock and it prevents us from sync'ing the code in
     * the FRAPI admin.
     *
     */
    public function __construct()
    {
        $auth = Frapi_Plugins_OAuth2_Auth($this->getParams());
        $auth->authorize();
    }

    /**
     * Default Call Method
     *
     * This method is called when no specific request handler has been found
     *
     * @return array
     */
    public function executeAction()
    {
        throw new Frapi_Error('NO_PUT');
        return $this->toArray();
    }

    /**
     * Get Request Handler
     *
     * This method is called when a request is a GET
     *
     * @return array
     */
    public function executeGet()
    {
        // Return a list of all resources in the collection.
        if ($valid instanceof Frapi_Response) {
            return $valid;
        }

        $resources = array(
            'meta' => array(
                'total' => 'N',
                'desc'  => 'The total should be the active resources ' .
                           'contained in a collection/bucket.',
            ),
            'resources' => array(
                'res1' => array(
                    'href' => '/collection/res1',
                    'name' => 'res1',
                ),

                'res2' => array(
                    'href' => '/collection/res2',
                    'name' => 'res2',
                ),

                'res3' => array(
                    'href' => '/collection/res3',
                    'name' => 'res3',
                )
            ),
        );

        $this->data = $resources;
        return $this->toArray();
    }
}
