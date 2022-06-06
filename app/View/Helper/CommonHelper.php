<?php 

App::uses('AppHelper', 'View/Helper');

class CommonHelper extends AppHelper {
	
	public function has_subcategory($id) {
		App::import("Model", "Subcategory");
		$model = new Subcategory();
		$data = $model->find("all");

		foreach($data as $item) {
			if($item["Subcategory"]["category_id"] == $id) {
				return false;
			}
		}
		return true;
	}
	
	public function get_from_BrandByid($id) {
		App::import("Model", "Brand");
		$model = new Brand();
		$data = $model->findById($id);
		return $data["Brand"]["title"];
	}

	public function get_from_PageByid($id) {
		App::import("Model", "Page");
		$model = new Page();
		$data = $model->findById($id);
		return $data["Page"]["title"];
	}

	public function get_namecategory($id) {
		App::import("Model", "Category");
		$model = new Category();
		$data = $model->findById($id);
		// debug($data); die;	
		return $data["Category"]["title"];
	}

	// public function has_subcategory($id) {
	// 	App::import("Model", "Subcategory");
	// 	$model = new Subcategory();
	// 	$data = $model ->find("all");
		
	// 	foreach($data as $item) {
	// 		if($item["Subcategory"]["category_id"] == $id) {
	// 			return true;
	// 		}
	// 	}
	// 	return false;
	// }


}
 ?>