<?php
/**
 * TOP API: taobao.crm.members.group.batchadd request
 * 
 * @author auto create
 * @since 1.0, 2011-11-08 17:16:34
 */
class CrmMembersGroupBatchaddRequest
{
	/** 
	 * 会员的id
	 **/
	private $buyerIds;
	
	/** 
	 * 分组id
	 **/
	private $groupIds;
	
	private $apiParas = array();
	
	public function setBuyerIds($buyerIds)
	{
		$this->buyerIds = $buyerIds;
		$this->apiParas["buyer_ids"] = $buyerIds;
	}

	public function getBuyerIds()
	{
		return $this->buyerIds;
	}

	public function setGroupIds($groupIds)
	{
		$this->groupIds = $groupIds;
		$this->apiParas["group_ids"] = $groupIds;
	}

	public function getGroupIds()
	{
		return $this->groupIds;
	}

	public function getApiMethodName()
	{
		return "taobao.crm.members.group.batchadd";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->buyerIds,"buyerIds");
		RequestCheckUtil::checkMaxListSize($this->buyerIds,10,"buyerIds");
		RequestCheckUtil::checkNotNull($this->groupIds,"groupIds");
		RequestCheckUtil::checkMaxListSize($this->groupIds,10,"groupIds");
	}
}
