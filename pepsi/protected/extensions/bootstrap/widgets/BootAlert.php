<?php
/**
 * BootAlert class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright  Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

Yii::import('ext.bootstrap.widgets.BootWidget');
class BootAlert extends BootWidget
{
	/**
	 * @property array the keys for which to get flash messages.
	 */
	public $keys = array('success','info','warning','error');
	/**
	 * @property string the template to use for displaying flash messages.
	 */
	public $template = '<div class="alert-message {key}"><p>{message}</p></div>';
	/**
	 * @property array the html options.
	 */
	public $htmlOptions = array('class'=>'alert');

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		parent::init();
		$this->registerScriptFile('jquery.ui.bootalert.js');
	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		$id = $this->getId();

		if (isset($this->htmlOptions['id']))
			$id = $this->htmlOptions['id'];
		else
			$this->htmlOptions['id'] = $id;

		if (is_string($this->keys))
			$this->keys = array($this->keys);

		$markup = '';
		foreach ($this->keys as $key)
			if (Yii::app()->user->hasFlash($key))
				$markup .= strtr($this->template, array('{key}'=>$key, '{message}'=>Yii::app()->user->getFlash($key)));

		echo CHtml::openTag('div',$this->htmlOptions);
		echo $markup;
		echo '</div>';

		$this->options['keys'] = $this->keys;
		$this->options['template'] = $this->template;

		$options = CJavaScript::encode($this->options);
		Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$id,"jQuery('#{$id}').bootAlert({$options});");
	}
}