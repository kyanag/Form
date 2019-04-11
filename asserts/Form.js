function Form(element){
    var columns = $(element).find("[name]");
    this.init = function(){
        console.log("form init!!");
        $(columns).each(function(i, element){
            if($(this).hasClass("kyanag-form-editor")){
                let editor = new window.wangEditor(element);
                editor.create();
            }
            if($(this).hasClass("kyanag-form-image")){
                var name = $(this).attr("name");
                $(this).fileinput({
                    'language':"zh",
                    'uploadExtraData':{name:name},
                    'uploadUrl':"upload.php",
                    showRemove :false,
                }).on("fileuploaded", function (event, data, previewId, index){
                    console.log(event);
                });
            }
            if($(this).hasClass("kyanag-form-datetime")){
                var data = $(this).data();
                $(this).datepicker(data);
            }
            if($(this).hasClass("kyanag-form-multiselect")){
                var data = $(this).data();
                $(this).select2(data);
            }
        });
    }
}