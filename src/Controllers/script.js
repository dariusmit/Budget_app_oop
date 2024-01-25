jQuery(document).ajaxComplete(function(event, xhr, settings) {
    if(typeof settings.extraData != 'undefined' && typeof settings.extraData.view_display_id != 'undefined') {
    
        switch(settings.extraData.view_display_id){
    
            case "your_view_id":
    
                console.log('your_view_id ajax results!');
    
                break;
    
            default:
    
                console.log('some other ajax result...');
    
                break;
    
        }
    }
}