<?php
//	License for all code of this FreePBX module can be found in the license file inside the module directory
//	Copyright 2015 Sangoma Technologies.
namespace FreePBX\modules;
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }

class Daynight implements \BMO {
	public function __construct($freepbx = null) {
		if ($freepbx == null) {
			throw new Exception("Not given a FreePBX Object");
		}
		$this->FreePBX = $freepbx;
		$this->db = $freepbx->Database;
	}
    public function install() {}
    public function uninstall() {}
    public function backup() {}
    public function restore($backup) {}
    public function doConfigPageInit($page) {
    	$request=$_REQUEST;
		$action = isset($request['action'])?$request['action']:'';
		$password = isset($request['password'])?$request['password']:'';
		$fc_description = isset($request['fc_description'])?$request['fc_description']:'';
		$day_recording_id = isset($request['day_recording_id']) ? $request['day_recording_id'] :  '';
		$night_recording_id = isset($request['night_recording_id']) ? $request['night_recording_id'] :  '';
		isset($request['itemid'])?$itemid=$this->db->escapeSimple($request['itemid']):$itemid='';
		$extdisplay = isset($request['extdisplay'])? $request['extdisplay']:'';
		switch ($action) {
			case "add":
			case "edit":
			case "edited":
					daynight_edit($request,$itemid);
					redirect_standard('itemid', 'view');
					break;
			case "delete":
					daynight_del($itemid);
					redirect_standard();
					break;
		}
    }
	public function getActionBar($request) {
		$buttons = array();

		switch($request['display']) {
			case 'daynight':
				$buttons = array(
					'delete' => array(
						'name' => 'delete',
						'id' => 'delete',
						'value' => _('Delete')
					),
					'reset' => array(
						'name' => 'reset',
						'id' => 'reset',
						'value' => _('Reset')
					),
					'submit' => array(
						'name' => 'submit',
						'id' => 'submit',
						'value' => _('Submit')
					)
				);
				if ($request['itemid'] =='') {
					unset($buttons['delete']);
				}
				if($request['view'] != 'form'){
					unset($buttons);
				}
			break;
		}
		return $buttons;
	}
}
