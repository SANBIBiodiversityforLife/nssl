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
	/* Plants */
	if (($handle = fopen("http://ssp.localhost/sites/default/files/ssp.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($row > 1) {
				$node = Node::create(array(
					'type' => 'species',
					'title' => $data[0],
					'langcode' => 'en',
					'uid' => '1',
					'status' => 0,
				));
				$node->field_type = 'Plant';
				
				// Past justification
				$node->field_justification = $data[1] . ' / ' . $data[2];
				
				// Standardise range size format
				$range = str_replace('<', '', str_replace('>', '', $data[6]));
				$matched = preg_match('\s*(\d+)\s*-\s*\d+', $range, $matches);
				if($matched == 1) {
					$range = $matches[1];
				}
				
				// Standardise population size format
				$pop_size =  str_replace('<', '', str_replace('>', '', $data[7]));
				$matched = preg_match('\s*(\d+)\s*-\s*\d+', $pop_size, $matches);
				if($matched == 1) {
					$pop_size = $matches[1];
				}
				
				// Standardise subpopulation number format
				$sub_pop_number = str_replace('<', '', str_replace('>', '', $data[8]));
				$matched = preg_match('\s*(\d+)\s*-\s*\d+', $sub_pop_number, $matches);
				if($matched == 1) {
					$sub_pop_number = $matches[1];
				}
				
				// Check the criteria for vulnerability
				$v_refs = [];
				if(trim($range) != '') {
					$range = (int) $range;
					if($range <= 100000) {
						$node->field_population_vulnerability->value = 'vulnerable';
						$v_refs[] = 'According to the SANBI Red List, this species has a range of under 100km<sup>2</sup>.';
					}
				}
				if(trim($pop_size) != '') {
					$pop_size = (int) $pop_size;
					if($pop_size <= 2500) {
						$node->field_population_vulnerability->value = 'vulnerable';
						$v_refs[] = 'According to the SANBI Red List, this species has a pop size of under 2500.';
					}
				}
				if(trim($sub_pop_number) != '') {
					$sub_pop_number = (int) $sub_pop_number;
					//kpr('small subpop number ' . $sub_pop_number);
					//kpr('test = ' . $sub_pop_number <= 5);
					if($sub_pop_number <= 5) {
						$node->field_population_vulnerability->value = 'vulnerable';
						$v_refs[] = 'According to the SANBI Red List, this species has 5 or fewer subpopulations.';
					}
				}
				
				if(count($v_refs) > 0) {
					$field_pop_vulnerability_refs = implode(' ', $v_refs);
				}
				//kpr($node->field_population_vulnerability->value);
				//$node->population_vulnerability;
				$node->save();
				kpr($data[0]);
			}
			
			$row++;
		}
		fclose($handle);
	}
	  	
	/* Animals */
	if (($handle = fopen("http://ssp.localhost/sites/default/files/ssp-animals.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($row > 1) {
				$node = Node::create(array(
					'type' => 'species',
					'title' => $data[0],
					'langcode' => 'en',
					'uid' => '1',
					'status' => 0,
				));
				$node->field_type = 'Animal';
				$node->field_justification = 'Assessor: ' . $data[1] . ' / Source: ' . $data[3] . ' / Threats: ' . $data[4] . ' + ' . $data[6] . ' / Motivation: ' . $data[5];
				$node->save();
				kpr($data[0]);
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