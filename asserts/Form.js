(function($){
    var defaultOptions = {
        datetime:{
            'format':"yyyy-mm-dd",
            'language':"zh-CN",
            'autoclose': 1,
        },
        select2:{},
        fileinput:{
        }
    };
    $.fn.initFormOptions = function(options){
        defaultOptions = options;
    };
    $.fn.initForm = function(options){
        $(this).find("[name]").each(function(i, element){
            if($(this).hasClass("kyanag-form-editor")){
                let editor = new window.wangEditor(element);
                editor.customConfig.zIndex = 1001;
                editor.create();
            }
            if($(this).hasClass("kyanag-form-image")){
                let preview = $(this).next().val();
                let valueContainer = $(this).next();
                (function (_this, valueContainer) {
                    let config = JSON.parse(window.atob($(_this).data("config")));
                    let options = $.extend(defaultOptions.fileinput, config);
                    console.log(config);
                    $(_this).fileinput(options).on("filebatchselected", function(event, files) {
                        console.log(event);
                        console.log(files);
                    }).on("fileuploaded", function (event, data, previewId, index){
                        $(valueContainer).val();
                    });
                })($(this), valueContainer);
            }
            if($(this).hasClass("kyanag-form-datetime")){
                $(this).datepicker(defaultOptions.datetime);
            }
            if($(this).hasClass("kyanag-form-multiselect")){
                $(this).select2(defaultOptions.select2);
            }
        })
    };
})($);