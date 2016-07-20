<?php
/**
 * @file
 * Contains \Drupal\ssp_import\Controller\SspImportController.
 */
namespace Drupal\ssp_import\Controller;
use Drupal\node\Entity\Node;
class SspImportController {
  public function content() {
    $row = 1;
	//$test_string = '';
	if (($handle = fopen("http://test.localhost/sites/default/files/ssp-animals.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($row > 1) {
				/*$node = Node::create(array(
					'type' => 'species',
					'title' => $data[0],
					'langcode' => 'en',
					'uid' => '1',
					'status' => 1,
				));
				$node->field_type = 'plant';
				$node->field_red_list_status = str_replace('*', '', $data[3]);
				if($node->field_red_list_status == '0' || $node->field_red_list_status == '') {
					$node->field_red_list_status = 'NE';
				}
				
				$node->field_rl_national_criteria = $data[4];
				$node->field_rl_pop_trend = $data[5];
				$node->field_justification = $data[1] . ' / ' . $data[2];
				// $node->field_range_size = $data[8]
				// $node->field_pop_size = $data[9]
				// $node->field_no_of_pops = $data[10]
				$exploitation = [];
				if($data[17] == "TRUE") { // Purpose material
					$exploitation[] = 'materials';
				}
				if($data[16] == "TRUE") { // Purpose fuel
					$exploitation[] = 'fuel';
				}
				if($data[15] == "TRUE") { // Purpose food
					$exploitation[] = 'food';
				}
				if($data[14] == "TRUE") { // Purpose horticulture
					$exploitation[] = 'trade';
				}
				if($data[13] == "TRUE") { // Purpose medicine
					$exploitation[] = 'muti';
				}
				$node->field_threats_in_the_wild = $exploitation;
				
				
				$node->save();
				kpr($data[0]);
				
				// Animals
				$node = Node::create(array(
					'type' => 'species',
					'title' => $data[0],
					'langcode' => 'en',
					'uid' => '1',
					'status' => 1,
				));
				$node->field_type = 'animal';
				$node->field_red_list_status = str_replace('*', '', $data[2]);
				if($node->field_red_list_status == '0' || $node->field_red_list_status == '') {
					$node->field_red_list_status = 'NE';
				}
				$node->field_justification = 'Assessor: ' . $data[1] . ' / Source: ' . $data[3] . ' / Threats: ' . $data[4] . ' + ' . $data[6] . ' / Motivation: ' . $data[5];
				$node->save();
				kpr($data[0]);*/
			}
			
			$row++;
		}
		fclose($handle);
	}
	  
	  
    return array(
      '#type' => 'markup',
      '#markup' => t('<br><br>Successful import!'),
    );
  }
}