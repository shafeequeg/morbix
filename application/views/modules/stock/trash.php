<?php
foreach($items as $item): 
?>
<option value='<?php echo $item->item_id ?>'><?php echo $item->item_name ?></option>
<?php endforeach ?>