<?php
namespace App\mylibs;

class MyMarkdown extends \cebe\markdown\MarkdownExtra{
	//同ライブラリのGithub flavored用の実装と同一
	protected function renderText($text){
		if ($this->enableNewlines) {
			$br = $this->html5 ? "<br>\n" : "<br />\n";
			return strtr($text[1], ["  \n" => $br, "\n" => $br]);
		} else {
			return parent::renderText($text);
		}
	}
}