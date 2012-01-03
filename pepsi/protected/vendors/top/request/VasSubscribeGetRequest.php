<?php
/**
 * TOP API: taobao.vas.subscribe.get request
 * 
 * @author auto create
 * @since 1.0, 2011-11-08 17:16:34
 */
class VasSubscribeGetRequest
{
	/** 
	 * 应用收费代码，从合作伙伴后台（my.open.taobao.com）-收费管理-收费项目列表 能够获得该应用的收费代码
	 **/
	private $articleCode;
	
	/** 
	 * 淘宝会员名
	 **/
	private $nick;
	
	private $apiParas = array();
	
	public function setArticleCode($articleCode)
	{
		$this->articleCode = $articleCode;
		$this->apiParas["article_code"] = $articleCode;
	}

	public function getArticleCode()
	{
		return $this->articleCode;
	}

	public function setNick($nick)
	{
		$this->nick = $nick;
		$this->apiParas["nick"] = $nick;
	}

	public function getNick()
	{
		return $this->nick;
	}

	public function getApiMethodName()
	{
		return "taobao.vas.subscribe.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->articleCode,"articleCode");
		RequestCheckUtil::checkNotNull($this->nick,"nick");
	}
}