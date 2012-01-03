<?php
/**
 * TOP API: taobao.huabao.poster.get request
 * 
 * @author auto create
 * @since 1.0, 2011-11-08 17:16:34
 */
class HuabaoPosterGetRequest
{
	/** 
	 * 画报的Id值
	 **/
	private $posterId;
	
	private $apiParas = array();
	
	public function setPosterId($posterId)
	{
		$this->posterId = $posterId;
		$this->apiParas["poster_id"] = $posterId;
	}

	public function getPosterId()
	{
		return $this->posterId;
	}

	public function getApiMethodName()
	{
		return "taobao.huabao.poster.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->posterId,"posterId");
	}
}
