<?php
class TopClient
{
    public $appkey;

    public $secretKey;

    public $gatewayUrl = "http://gw.api.taobao.com/router/rest";

    public $format = "json";

    public $timeRange=1800;

    protected $signMethod = "md5";

    protected $apiVersion = "2.0";

    protected $sdkVersion = "top-sdk-php-20110701";

    public function init()
    {
        Yii::import('application.vendors.top.request.*');
    }

    protected function generateSign($params)
    {
        ksort($params);

        $stringToBeSigned = $this->secretKey;
        foreach ($params as $k => $v)
        {
            if("@" != substr($v, 0, 1))
            {
                $stringToBeSigned .= "$k$v";
            }
        }
        unset($k, $v);
        $stringToBeSigned .= $this->secretKey;

        return strtoupper(md5($stringToBeSigned));
    }

    protected function curl($url, $postFields = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT,10);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if (is_array($postFields) && 0 < count($postFields))
        {
            $postBodyString = "";
            $postMultipart = false;
            foreach ($postFields as $k => $v)
            {
                if("@" != substr($v, 0, 1))//判断是不是文件上传
                {
                    $postBodyString .= "$k=" . urlencode($v) . "&"; 
                }
                else//文件上传用multipart/form-data，否则用www-form-urlencoded
                {
                    $postMultipart = true;
                }
            }
            unset($k, $v);
            curl_setopt($ch, CURLOPT_POST, true);
            if ($postMultipart)
            {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            }
            else
            {
                curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString,0,-1));
            }
        }
        $reponse = curl_exec($ch);
        if (curl_errno($ch))
        {
            throw new Exception(curl_error($ch),0);
        }
        else
        {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode)
            {
                throw new Exception($reponse,$httpStatusCode);
            }
        }
        curl_close($ch);
        return $reponse;
    }

    protected function logCommunicationError($apiName, $requestUrl, $errorCode, $responseTxt)
    {
        $localIp = isset($_SERVER["SERVER_ADDR"]) ? $_SERVER["SERVER_ADDR"] : "CLI";
        $logData = array(
        date("Y-m-d H:i:s"),
        $apiName,
        $this->appkey,
        $localIp,
        PHP_OS,
        $this->sdkVersion,
        $requestUrl,
        $errorCode,
        str_replace("\n","",$responseTxt)
        );
        Yii::log(implode(' - ', $logData), CLogger::LEVEL_ERROR);
    }

    public function execute($request, $session = null)
    {
        //组装系统参数
        $sysParams["app_key"] = $this->appkey;
        $sysParams["v"] = $this->apiVersion;
        $sysParams["format"] = $this->format;
        $sysParams["sign_method"] = $this->signMethod;
        $sysParams["method"] = $request->getApiMethodName();
        $sysParams["timestamp"] = date("Y-m-d H:i:s");
        $sysParams["partner_id"] = $this->sdkVersion;
        if (null != $session)
        {
            $sysParams["session"] = $session;
        }

        //获取业务参数
        $apiParams = $request->getApiParas();

        //签名
        $sysParams["sign"] = $this->generateSign(array_merge($apiParams, $sysParams));

        //系统参数放入GET请求串
        $requestUrl = $this->gatewayUrl . "?";
        foreach ($sysParams as $sysParamKey => $sysParamValue)
        {
            $requestUrl .= "$sysParamKey=" . urlencode($sysParamValue) . "&";
        }
        $requestUrl = substr($requestUrl, 0, -1);

        //发起HTTP请求
        try
        {
            $resp = $this->curl($requestUrl, $apiParams);
        }
        catch (Exception $e)
        {
            $this->logCommunicationError($sysParams["method"],$requestUrl,"HTTP_ERROR_" . $e->getCode(),$e->getMessage());
            return false;
        }

        //解析TOP返回结果
        $respWellFormed = false;
        if ("json" == $this->format)
        {
            $search=array("\n","\r","\u","\t","\f","\b","/",'"');
            $replace=array("\\n","\\r","\\u","\\t","\\f","\\b","\/","\"");
            $resp=str_replace($search,$replace,$resp);
            $respObject = json_decode($resp);
            if (null !== $respObject)
            {
                $respWellFormed = true;
                foreach ($respObject as $propKey => $propValue)
                {
                    $respObject = $propValue;
                }
            }
        }
        else if("xml" == $this->format)
        {
            $respObject = @simplexml_load_string($resp);
            if (false !== $respObject)
            {
                $respWellFormed = true;
            }
        }

        //返回的HTTP文本不是标准JSON或者XML，记下错误日志
        if (false === $respWellFormed)
        {
            $this->logCommunicationError($sysParams["method"],$requestUrl,"HTTP_RESPONSE_NOT_WELL_FORMED",$resp);
            return false;
        }

        //如果TOP返回了错误码，记录到业务错误日志中
        if (isset($respObject->code))
        {
            $message='TOP RESPONSED ERROR:'.date("Y-m-d H:i:s").' - '.$resp;
            Yii::log($message,CLogger::LEVEL_ERROR);
        }
        return $respObject;
    }

    public function exec($paramsArray)
    {
        if (!isset($paramsArray["method"]))
        {
            trigger_error("No api name passed");
        }
        $inflector = new LtInflector;
        $inflector->conf["separator"] = ".";
        $requestClassName = ucfirst($inflector->camelize(substr($paramsArray["method"], 7))) . "Request";
        if (!class_exists($requestClassName))
        {
            trigger_error("No such api: " . $paramsArray["method"]);
        }

        $session = isset($paramsArray["session"]) ? $paramsArray["session"] : null;

        $req = new $requestClassName;
        foreach($paramsArray as $paraKey => $paraValue)
        {
            $inflector->conf["separator"] = "_";
            $setterMethodName = $inflector->camelize($paraKey);
            $inflector->conf["separator"] = ".";
            $setterMethodName = "set" . $inflector->camelize($setterMethodName);
            if (method_exists($req, $setterMethodName))
            {
                $req->$setterMethodName($paraValue);
            }
        }
        return $this->execute($req, $session);
    }

    public function getAuthUrl()
    {
        $url = 'http://container.open.taobao.com/container?appkey=' . $this->appkey ;
        return $url;
    }

    /**
     *验证和解析Taobao的授权回调参数
     *@param array $query Pass in the $_GET of the callback page
     *@return mixed Extacted params returned from taobao callback as an array, 
     *return false if top_sign is not valid or timestamp out of a acceptable time range.
     **/
    public function getCallbackResponse($query)
    {
        $sign = base64_encode(md5($this->appkey . $query['top_parameters'] . $query['top_session'] . $this->secretKey, true));
        if ($sign != $query['top_sign']) {
            return false;
        }
        $params = base64_decode($query['top_parameters']);
        $result = array();
        foreach (explode('&', $params) as $kv) {
            list($key, $value) = explode('=', $kv);
            $result[$key] = iconv("GBK", "UTF-8", $value);
        }
        $result['sessionKey'] = $query['top_session'];
        if (isset($result['ts']) && abs(intval(floatval($result['ts'])/1000) - time()) < $this->timeRange) {
            return $result;
        } else {
            return false;
        }
    }
}
