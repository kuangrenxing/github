<?php
/**
 * TOP API: taobao.crm.group.move request
 * 
 * @author auto create
 * @since 1.0, 2011-11-08 17:16:34
 */
class CrmGroupMoveRequest
{
	/** 
	 * 需要移动的分组
	 **/
	private $fromGroupId;
	
	/** 
	 * 目的分组
	 **/
	private $toGroupId;
	
	private $apiParas = array();
	
	public function setFromGroupId($fromGroupId)
	{
		$this->fromGroupId = $fromGroupId;
		$this->apiParas["from_group_id"] = $fromGroupId;
	}

	public function getFromGroupId()
	{
		return $this->fromGroupId;
	}

	public function setToGroupId($toGroupId)
	{
		$this->toGroupId = $toGroupId;
		$this->apiParas["to_group_id"] = $toGroupId;
	}

	public function getToGroupId()
	{
		return $this->toGroupId;
	}

	public function getApiMethodName()
	{
		return "taobao.crm.group.move";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->fromGroupId,"fromGroupId");
		RequestCheckUtil::checkMinValue($this->fromGroupId,1,"fromGroupId");
		RequestCheckUtil::checkNotNull($this->toGroupId,"toGroupId");
		RequestCheckUtil::checkMinValue($this->toGroupId,1,"toGroupId");
	}
}
