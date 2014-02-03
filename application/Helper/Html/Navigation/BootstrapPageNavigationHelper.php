<?php
namespace Helper\Html\Navigation;

class BootstrapPageNavigationHelper{
	private $currentPage;
	private $maxPage;
	private $baseNavigationUrl;
	private $navigationParameterPrefix;
	private $buttonCount = 3;
	
	
	public function __construct($currentPage, $maxPage, $baseNavigationUrl, $navigationParameterPrefix){
		$this->currentPage = $currentPage;
		$this->maxPage = $maxPage;
		$this->baseNavigationUrl = $baseNavigationUrl;
		$this->navigationParameterPrefix = $navigationParameterPrefix;		
	}
	
	public static function createInstance($currentPage, $maxPage, $baseNavigationUrl, $navigationParameterPrefix){
		 return new BootstrapPageNavigationHelper($currentPage, $maxPage, $baseNavigationUrl, $navigationParameterPrefix);
		
	}
	
	
	public function render(){
		$range = floor($this->buttonCount/2);		
		echo '<ul class="pagination">';
		$liClass = $this->currentPage==1? 'disabled':'';
		echo "<li class=\"{$liClass}\"><a href=\"{$this->baseNavigationUrl}{$this->navigationParameterPrefix}1\">&laquo;</a></li>";
		for ($i=$this->currentPage-$range;$i<=$this->currentPage+$range;$i++):
			if($i<=0) continue;
			if($i>$this->maxPage) break;
			$liClass = $i==$this->currentPage? 'active':'';
			$liUrl = $i==$this->currentPage? 'javascript:void(0)':"{$this->baseNavigationUrl}{$this->navigationParameterPrefix}{$i}";
			?>					
			  	<li class="<?php echo $liClass?>">
			  		<a href="<?php echo $liUrl ?>"><?php echo $i?></a>			  	
			  	</li>						
			<?php 				
		endfor;
		$liClass = $this->currentPage==$this->maxPage? 'disabled':'';
		echo "<li class=\"{$liClass}\"><a href=\"{$this->baseNavigationUrl}{$this->navigationParameterPrefix}1\">&raquo;</a></li>";
		echo '</ul>	';
			
	}
	
	
// 	public function getCurrentPage() {
// 		return $this->currentPage;
// 	}
// 	public function setCurrentPage($currentPage) {
// 		$this->currentPage = $currentPage;
// 		return $this;
// 	}
// 	public function getMaxPage() {
// 		return $this->maxPage;
// 	}
// 	public function setMaxPage($maxPage) {
// 		$this->maxPage = $maxPage;
// 		return $this;
// 	}
// 	public function getBaseNavigationUrl() {
// 		return $this->baseNavigationUrl;
// 	}
// 	public function setBaseNavigationUrl($baseNavigationUrl) {
// 		$this->baseNavigationUrl = $baseNavigationUrl;
// 		return $this;
// 	}
// 	public function getNavigationparameterName() {
// 		return $this->navigationparameterName;
// 	}
// 	public function setNavigationparameterName($navigationparameterName) {
// 		$this->navigationparameterName = $navigationparameterName;
// 		return $this;
// 	}
	
	
	
}