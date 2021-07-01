
jQuery(document).ready(function() {
    new cspim_buttons();
});

class cspim_buttons{
    constructor(){
        this.add_eventlisteners();
    }

    add_eventlisteners(){
        const save_button = document.getElementById('mapping-save');
        const load_button = document.getElementById('mapping-load');
        const delete_button = document.getElementById('mapping-delete');

        if(save_button){
            save_button.addEventListener(
                'click', 
                ()=>{
                    let ui = new cspim_ui();
                    ui.off();
                    ui.hide_errors();
                    let mapping = new cspim_mapping();
                    let ajax = new cspim_ajax();
                    ajax.call(
                        { 
                            action: "calisia_save_product_import_mapping_crud", 
                            crud: "create",
                            name: document.getElementById('mapping-name').value,
                            mapping: mapping.values
                        },
                        function (data){
                            let ui = new cspim_ui();
                            ui.on();
                            if(data.result == true){
                                ui.clearNameInput();
                                jQuery('#mapping-mappings').find('option:not(:first)').remove();
                                jQuery.each(data.mappings, function (key){
                                    jQuery('#mapping-mappings').append('<option value="'+key+'">'+key+'</option>')
                                });
                                
                            }else{
                                ui.error(data.error);
                            }
                        }
                    );
                }, 
                false
            );
        }
        if(load_button){
            load_button.addEventListener(
                'click', 
                ()=>{
                    let ui = new cspim_ui();
                    ui.off();
                    ui.hide_errors();
                    let ajax = new cspim_ajax();
                    ajax.call(
                        { 
                            action: "calisia_save_product_import_mapping_crud", 
                            crud: "read",
                            name: document.getElementById('mapping-mappings').value
                        },
                        function (data){
                            let ui = new cspim_ui();
                            ui.on();
                            if(data.result == true){
                                let mapping = new cspim_mapping();
                                mapping.values = data.mapping;
                                mapping.set_mapped_values();
                            }else{
                                ui.error(data.error);
                            }
                        }
                    );
                }, 
                false
            );
        }
        if(delete_button){
            delete_button.addEventListener(
                'click', 
                ()=>{
                    if (!confirm(jQuery("#prompt-msg").val())) {
                        return;
                    }
                    let ui = new cspim_ui();
                    ui.off();
                    ui.hide_errors();
                    let ajax = new cspim_ajax();
                    ajax.call(
                        { 
                            action: "calisia_save_product_import_mapping_crud", 
                            crud: "delete",
                            name: document.getElementById('mapping-mappings').value
                        },
                        function (data){
                            let ui = new cspim_ui();
                            ui.on();
                            if(data.result == true){
                                jQuery('#mapping-mappings').find('option:not(:first)').remove();
                                jQuery.each(data.mappings, function (key){
                                    jQuery('#mapping-mappings').append('<option value="'+key+'">'+key+'</option>')
                                });
                            }else{
                                ui.error(data.error);
                            }
                        }
                    );
                }, 
                false
            );
        }
    }
}

class cspim_ajax{
    call(dataObject, callback){
        jQuery.ajax({
            url: "admin-ajax.php",
            type: 'POST',
            data: dataObject,
            success: function( data ){
                data = JSON.parse(data);
                callback(data);
            }
        });
    }
}

class cspim_mapping{
    constructor(){
        this.values = [];
        this.get_mapping_values();
    }

    get_mapping_values(){
        let self = this;
        let selects = jQuery(".wc-importer-mapping-table select");
        selects.each(function() {
            self.values.push(jQuery(this).val());
        });
    }

    set_mapped_values(){
        jQuery.each(this.values, function (index,value){
            let select = jQuery(".wc-importer-mapping-table select:eq("+index+")");
            select.val(value);
        });
    }
}

class cspim_ui{

    on(){
        jQuery("#mapping-mappings").prop( "disabled", false );
        jQuery("#mapping-load").prop( "disabled", false );
        jQuery("#mapping-delete").prop( "disabled", false );
        jQuery("#mapping-name").prop( "disabled", false );
        jQuery("#mapping-save").prop( "disabled", false );
    }

    off(){
        jQuery("#mapping-mappings").prop( "disabled", true );
        jQuery("#mapping-load").prop( "disabled", true );
        jQuery("#mapping-delete").prop( "disabled", true );
        jQuery("#mapping-name").prop( "disabled", true );
        jQuery("#mapping-save").prop( "disabled", true );
    }

    error(msg){
        this.hide_errors();
        jQuery("#mapping-notifications").append("<div class='cspim_error'>"+msg+"</div>");
    }

    hide_errors(){
        jQuery("#mapping-notifications").text("");
    }

    clearNameInput(){
        jQuery("#mapping-name").val("");
    }
}