<?php
/**
 * Created by PhpStorm.
 * User: Luke Hardiman
 * Date: 6/01/2015
 * Time: 12:25 AM
 * @name : my_module_lib
 * @Description : This is my libary of helpers may or maynot be used in my modules
 */


class my_module_lib {

    public function serviceFieldMerge($serviceFields, $arrayMerge)
    {
        //array('gogetssl_csr' => "test")
        return (object) array_merge((array) $serviceFields , (array) $arrayMerge );
    }

    public function ifSet($data, $notSet = ""){
        return (empty($data) || !isset($data)) ? $notSet : $data;
    }

    public function sendHeader(){
        header("Content-Disposition: attachment; filename=savethis.txt");
        header("Content-type: text/plain");

        echo "this is the file\n";
        echo " you could generate content here, instead.";
        exit(0);
    }

    /**
     * Returns either the VALUE's into an array or FALSE
     *
     * @param $getRequest       the $_GET or $_POST
     * @param $getValue         The get call
     * @return bool             Returns an array of all the values in each key, if any missing values will return an array in failed
     */
    public function getRequests($getRequest, $requiredKeys = array(), $returnFailed = false)
    {

        $response = array('failed' => false);

        $failed = array();
        foreach ($requiredKeys as $key) {
            //get the value
            $value = $this->getRequest($getRequest, $key);

            if ($value == false && $returnFailed == true)
                $failed[$key] = '';

            $response[$key] = $value;
        }

        if (count($failed) > 0)
            $response['failed'] = $failed;

        return $response;
    }

    /**
     * Returns either the VALUE or FALSE of a $_GET|$_POST
     *
     * @param $getRequest       the $_GET or $_POST
     * @param $getValue         The get call
     * @return bool             Returns the get|post value if valid otherwise returns FALSE
     */
    public function getRequest($getRequest, $getValue)
    {
        return isset($getRequest[$getValue]) && !empty($getRequest[$getValue]) ? $getRequest[$getValue] : false;
    }

    /**
     * Process ajax's call's only if the request is allowed calls method on main virtualmin by ref
     * @param $caller           Where to send the ajax call to
     * @param $getRequest       The request call from ajax
     * @param $postRequest
     * @param $allowedRequest   allowed ajax calls to process
     */
    public function processAjax(&$caller, $allowedRequest, $dataRequest, $packageRequest = array())
    {
        //all our ajax calls will be post for data and method calls by get
        if ($this->isAjaxRequest()) {
            $getRequest = $dataRequest['getRequest'];
            //get the request made and can only be request that are in our allowedrequest array
            $request = $this->isGetRequest($getRequest, $allowedRequest);


            //check that this allowed request is callable
            if ($request !== false)
                if (method_exists($caller, $request) && is_callable(array($caller, $request)))
                    $caller->$request($dataRequest, $packageRequest);

        }
        //invalid call
        $this->sendAjax("Invalid ajax call", false);
    }

    /**
     * @name    isAjaxRequest
     * @description Checks if a ajax call has been made
     * @return bool         Returns TRUE or FALSE if we have a ajax call
     */
    public function isAjaxRequest()
    {
        return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    }

    /**
     * This will loop the $get request and check if the $get is a tab that is in theTab array
     *
     * @param $getRequest
     * @param $request
     * @return bool
     */
    public function isGetRequest($getRequest, $allowedRequests = array())
    {
        return isset($getRequest['action']) && in_array($getRequest['action'], $allowedRequests) ? $getRequest['action'] : false;
    }

    /**
     * Sends back a JSON response with|without callback and exits execution
     * @param $data
     * @param bool $success '
     */
    public function sendAjax($data, $success = true)
    {
        //dump out json with possible callback
        $response = json_encode(
            array(
                "data" => $data,
                "success" => $success
            )
        );

        //$response = json_encode($response);

        echo isset($_GET['callback'])
            ? "{$_GET['callback']}($response)"
            : $response;

        exit(0);
    }

    /**
     * @name    dataRequest
     * @description This is to help keep the array name standards for get & post requests
     * @param $getRequest       parse the GET request
     * @param $postRequest      parse the POST request
     * @return array            Array containing a GET request & POST request
     * @todo                    Add checks to request
     */
    public function dataRequest($getRequest,$postRequest){
        return array(
            'getRequest'    => $getRequest,
            'postRequest'   => $postRequest
        );
    }

    /**
     * @name    packageRequest
     * @description This is to help keep the array name standards for package and service
     * @param $getRequest       parse the GET request
     * @param $postRequest      parse the POST request
     * @return array            Array containing a GET request & POST request
     * @todo                    Add checks to request
     */
    public function packageRequest($package,$service){
        return array(
            'package'    =>      $package,
            'service'    =>      $service
        );
    }


    /**
     * @param $content Content to be cleaned for json encoding
     * @return json_encoded string
     */
    public function encode_json($content)
    {
        return str_replace(array("\\n","\\t","\\r"), "", json_encode($content));
    }
}