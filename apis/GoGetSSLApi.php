<?php
/**
 * Use any way you want. Free for all
 *
 * @author a.andrijenko@gogetssl.com
 * @version 1.0
 **/

class GoGetSSLApi
{
  protected $key;

  protected $lastStatus;
  protected $lastResponse;

  public function __construct($sandbox = false, $key = null)
  {
    if($key)
    {
      $this->key = $key;
    }
	if($sandbox)
		$this->URL = 'https://sandbox.gogetssl.com/api';
	else
		$this->URL = 'https://my.gogetssl.com/api';
  }

  public function auth($user, $pass)
  {
    $response = $this->call('/auth/', array(), array('user' => $user, 'pass' => $pass));

    if(!empty($response['key']))
    {
      $this->key = $response['key'];
      return $response;
    }

    return false;
  }

  public function setKey($key)
  {
    if ($key)
    {
          $this->key = $key;
    }
  }

  /*
  * Decode CSR
  */
  public function decodeCSR($csr, $brand = 1, $wildcard = 0)
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    if($csr)
    {
      $postData['csr'] = $csr;
      $postData['brand'] = $brand;
      $postData['wildcard'] = $wildcard;
    }

    return $this->call('/tools/csr/decode/', $getData, $postData);
  }

  /*
  * Get Domain Emails List
  */
  public function getWebServers($type)
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/tools/webservers/'. (int)$type, $getData);
  }

    public function getDomainAlternative($csr = null) {
        if (!$this->key) {
            throw new GoGetSSLAuthException();

        } else {
            $getData = array(
                'auth_key' => $this->key
            );
        }

        $postData['csr'] = $csr;

        return $this->call('/tools/domain/alternative/', $getData, $postData);
    }
    /*
      * Generate CSR
      */
    public function getCSR($csr_id,$domain)
    {
        if (!$this->key) {
            throw new GoGetSSLAuthException();

        } else {
            $getData = array(
                'auth_key' => $this->key
            );
            $postdata = array(
                'csr_commonname' => $domain,
                'csr_id'         => $csr_id
            );
        }
        ////tools/csr/generate/
        return $this->call('/tools/csr/get/', $getData,$postdata);
    }

    /*
    * Generate CSR
    */
    public function generateCSR($postData)
    {
        if (!$this->key) {
            throw new GoGetSSLAuthException();

        } else {
            $getData = array(
                'auth_key' => $this->key
            );
        }
        ////tools/csr/generate/
        return $this->call('/tools/csr/generate/', $getData, $postData);
    }
  /*
  * Get Domain Emails List
  */
  public function getDomainEmails($domain)
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

        if($domain)
        {
          $postData['domain'] = $domain;
        }

    return $this->call('/tools/domain/emails/', $getData, $postData);
  }

  public function getAllProductPrices()
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/products/all_prices/', $getData);
  }

  public function getAllProducts()
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/products/', $getData);
  }

  public function getProductDetails($productId)
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/products/details/'. $productId, $getData);
  }

  public function getProductPrice($productId)
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/products/price/'. $productId, $getData);
  }

  public function getUserAgreement($productId)
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/products/agreement/'. $productId, $getData);
  }

  public function getAccountBalance()
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/account/balance/', $getData);
  }

  public function getAccountDetails()
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/account/', $getData);
  }

  public function getTotalOrders()
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/account/total_orders/', $getData);
  }

  public function getAllInvoices()
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/account/invoices/', $getData);
  }

  public function getUnpaidInvoices()
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/account/invoices/unpaid/', $getData);
  }

  public function getTotalTransactions()
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/account/total_transactions/', $getData);
  }

  public function addSSLOrder($data)
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/orders/add_ssl_order/', $getData, $data);
  }

  public function addSSLRenewOrder($data)
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/orders/add_ssl_renew_order/', $getData, $data);
  }

  public function reIssueOrder($orderId, $data)
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/orders/ssl/reissue/'.(int)$orderId, $getData, $data);
  }

  public function activateSSLOrder($orderId)
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/orders/ssl/activate/'. (int)$orderId, $getData);
  }

  public function getOrderStatus($orderId)
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/orders/status/'. (int)$orderId, $getData);
  }

  public function comodoClaimFreeEV($orderId, $data)
  {
        if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

        return $this->call('/orders/ssl/comodo_claim_free_ev/'. (int)$orderId, $getData, $data);
  }


  public function getOrderInvoice($orderId)
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/orders/invoice/'. (int)$orderId, $getData);
  }

  public function getUnpaidOrders()
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/orders/list/unpaid/', $getData);
  }

  public function resendEmail($orderId)
  {
    if(!$this->key)
    {
      throw new GoGetSSLAuthException();
    }
    else
    {
      $getData = array('auth_key' => $this->key);
    }

    return $this->call('/orders/resendemail/'. (int)$orderId, $getData);
  }


  protected function call($uri, $getData = array(), $postData = array(), $forcePost = false, $isFile = false)
  {
    $url  = $this->URL . $uri;
    if(!empty($getData))
    {
      foreach($getData as $key => $value)
      {
        $url .= (strpos($url, '?') !== false ? '&' : '?')
          . urlencode($key) . '=' . rawurlencode($value);
      }
    }

    $post = (!empty($postData) || $forcePost);
    $c = curl_init($url);
    if($post)
    {
      curl_setopt($c, CURLOPT_POST, true);
    }
    if(!empty($postData))
    {
      $queryData = $isFile ? $postData : http_build_query($postData);
      curl_setopt($c, CURLOPT_POSTFIELDS, $queryData);
    }

    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
    $result = curl_exec($c);
    $status = curl_getinfo($c, CURLINFO_HTTP_CODE);
    curl_close($c);
    $this->lastStatus   = $status;
    $this->lastResponse = json_decode($result, true);
    return $this->lastResponse;
  }

  public function getLastStatus()
  {
    return $this->lastStatus;
  }

  public function getLastResponse()
  {
    return $this->lastResponse;
  }
}

class GoGetSSLAuthException extends Exception {
  public function __construct()
  {
    parent::__construct('Please authorize first');
  }
}
















