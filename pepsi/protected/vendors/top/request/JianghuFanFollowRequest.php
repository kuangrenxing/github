<?php
/**
 * TOP API: taobao.jianghu.fan.follow request
 * 
 * @author auto create
 * @since 1.0, 2011-11-08 17:16:34
 */
class JianghuFanFollowRequest
{
	/** 
	 * 掌柜的id，被关注者的id
	 **/
	private $shopOwnerId;
	
	private $apiParas = array();
	
	public function setShopOwnerId($shopOwnerId)
	{
		$this->shopOwnerId = $shopOwnerId;
		$this->apiParas["shop_owner_id"] = $shopOwnerId;
	}

	public function getShopOwnerId()
	{
		return $this->shopOwnerId;
	}

	public function getApiMethodName()
	{
		return "taobao.jianghu.fan.follow";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->shopOwnerId,"shopOwnerId");
	}
}
