<div>
    <div>
        <div id="mapping-notifications"></div>
    </div>
    <div id="mapping-select-row">
        <select id="mapping-mappings" title="<?php _e('Select mapping from previously saved list then click load to load the mapping or delete to delete it.','calisia-save-product-import-mapping');?>">
            <option value><?php _e('Pick Saved Mapping','calisia-save-product-import-mapping');?></option>
            <?php
                foreach($args['mappings'] as $name => $mapping){
                    echo '<option value="'.$name.'">'.$name.'</option>';
                }
            ?>
        </select>
        <button type="button" id="mapping-load" class="button button-primary" title="<?php _e('Load currently selected mapping.','calisia-save-product-import-mapping');?>"><?php _e('load','calisia-save-product-import-mapping');?></button>
        <button type="button" id="mapping-delete" class="button button-primary button-tomato" title="<?php _e('Delete currently selected mapping.','calisia-save-product-import-mapping');?>"><?php _e('delete','calisia-save-product-import-mapping');?></button>
        <input type="hidden" id="prompt-msg" value="<?php _e('Are you sure you want to delete that mapping??','calisia-save-product-import-mapping'); ?>">
    </div>
    <div id="mapping-save-row">
        <input type="text" id="mapping-name" placeholder="<?php _e('New Mapping Name','calisia-save-product-import-mapping');?>" title="<?php _e('Insert name of a new mapping then click save to save current mapping.','calisia-save-product-import-mapping');?>">
        <button type="button" id="mapping-save" class="button button-primary" title="<?php _e('Save current mapping with provided name.','calisia-save-product-import-mapping');?>"><?php _e('save','calisia-save-product-import-mapping');?></button>
    </div>
</div>