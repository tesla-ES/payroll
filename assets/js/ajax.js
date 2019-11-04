
function ajax_load_page(pageName,form_method,array ,elemnt ,action,loadJs,delmsg,delobj,callback,callafter_Js) {

    if (typeof array === 'undefined') { array = null;}// page parameter
    if (typeof elemnt === 'undefined' || elemnt == null) { elemnt = ".right_col";} // all screen or some div
    if (typeof form_method === 'undefined' || form_method == null) { form_method = "POST";} // all screen or some div
    if (typeof action === 'undefined') { action = null;} // append or not
    if (typeof loadJs === 'undefined') { loadJs = null;} // js file to load after
    if (typeof delmsg === 'undefined') { delmsg = false;}// show delete message to enshore befor delete
    if (typeof delobj === 'undefined') { delobj = null;} // object to remove when delete
    if(typeof callafter_Js === 'undefined') { callafter_Js = null;}

    //var content2 = obj.parent();
    //alert(content.html());
    //alert(content2.html());
    if (delmsg)
    {
        //   delMessageArray = {'pageName':pageName,'array':array,'elemnt':elemnt,'action':action,'loadJs':loadJs,'delobj' :delobj};
        conferm_delete(function(){ajax_load_page(pageName,form_method,array ,elemnt ,bigbox_response_data,loadJs,false,delobj,callback);},delmsg);
        // alert($('#myAdminOrderScript').attr('src'));
        //$('#myAdminOrderScript').attr('src','notification/js/metroMessageBox.js');
    }

    else {
        //  if data is json when delete record  to call notification
        $.ajax({
            method: form_method,
            url: pageName + ".php",
            data: array,
            cash:false
        }).done(function (data) {
            //alert(data);
            try{ jsonDataObj = JSON.parse(data)  //  if data is json when delete record  to call notification //must be valid JSON
                // to use data from json   use     jsonDataObj.msgType
            }catch(e){
                //must not be valid JSON
                if (action==null) {// not append  load all element
                    if($(elemnt).length) {
                        $(elemnt).html(data);
                        $(elemnt).removeClass(elemnt.substring(1)+"_animate").addClass(elemnt.substring(1)+"_animate",2);
                        var pos = $(elemnt).offset().top - 100;  ///  scroll to end
                        $('html, body').animate({scrollTop: pos}, 800);
                    }

                } else if(action=="append")  {
                    // append to element
                    $(elemnt).append(data);
                }
                else{
                    // when u want to call specific function  u can pass it to load page function
                    action(data, callback);
                    //compleat_callback=false;
                }
            }


            if (!(loadJs == null)) {
                if($.isArray(loadJs)){
                    // loop throw array
                    loadJs.forEach(function(entry) {
                        $.getScript(entry["js_file"])  ///  load important js file
                            .done(function (script, textStatus) {
                                if(!(entry["function"]==null)){
                                    callfunction(entry["function"]);
                                    // callafter_Js();
                                }
                                // console.log( textStatus );
                            });
                    });


                }
                else{
                    $.getScript(loadJs)  ///  load important js file
                        .done(function (script, textStatus) {
                            if(!(callafter_Js==null)){
                                callafter_Js();
                            }
                            //   alert(script);
                        });
                }
            }

            if(!(delobj==null)){ // if found delobj parameter
                var content = delobj.closest('.even');
                delanimate(content); /// delete record in animated way

            }
            if((!(callback==null))&&(compleat_callback)&& (action==null)){
                callback();
            }


            // to call bootstrap tooltip after ajax
            $('body').tooltip({
                selector: '[data-toggle="tooltip"]'
            });

            // to call panel control box after ajax call
            panel_change_start();
            // toggle_menu_item(pageName);
        });
    }
}
