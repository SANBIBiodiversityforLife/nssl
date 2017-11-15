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
	
	// Plants and animals are imported from this spreadsheet
	// Format: Group,Family,Species,Non-assessed status,Author UID
	if(($handle = fopen("http://nssl.sanbi.org.za/sites/default/files/species_for_import.csv", "r")) !== FALSE) {
		while(($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if($row > 1) { // Skip the header row
				$node = Node::create(array(
					'type' => 'species',
					'title' => $data[2],
					'langcode' => 'en',
					'uid' => $data[4],
					'status' => 0,
				));
				$node->field_family = $data[1];
				$node->field_type = $data[0];
				
				// Not assessed status
				if($data[3] == 'Not sensitive') {
					$node->field_sensitivity->value = 'preliminary_not_sensitive';
					$node->field_is_sensitive->value = 0;
				} else {
					$node->field_sensitivity->value = 'preliminary_sensitive';
					$node->field_is_sensitive->value = 1;
				}
				
				$node->save();
				kpr($data[0]);
			}
			
			$row++;
		}
		fclose($handle);
	}
	  	
	  
    return array(
      '#type' => 'markup',
      '#markup' => t('<br><br>Imported ' . ($row - 2)), // Subtracting 2 because we start off as 1 and add 1 at the end 
    );
  }
}