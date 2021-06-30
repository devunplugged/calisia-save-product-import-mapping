<div>
    <div>
        <div id="mapping-notifications"></div>
    </div>
    <div id="mapping-select-row">
        <select id="mapping-mappings">
            <option value><?php _e('Pick Saved Mapping','calisia-save-product-import-mapping');?></option>
            <?php
                foreach($args['mappings'] as $name => $mapping){
                    echo '<option value="'.$name.'">'.$name.'</option>';
                }
            ?>
        </select>
        <button type="button" id="mapping-load"><?php _e('load','calisia-save-product-import-mapping');?></button>
        <button type="button" id="mapping-delete"><?php _e('delete','calisia-save-product-import-mapping');?></button>
    </div>
    <div id="mapping-save-row">
        <input type="text" id="mapping-name" placeholder="<?php _e('New Mapping Name','calisia-save-product-import-mapping');?>">
        <button type="button" id="mapping-save"><?php _e('save','calisia-save-product-import-mapping');?></button>
    </div>
</div>