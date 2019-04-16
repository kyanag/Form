(function($){
    var defaultOptions = {
        datetime:{
            'format':"yyyy-mm-dd",
            'language':"zh-CN",
            'autoclose': 1,
        },
        select2:{},
        fileinput:{
            'language':"zh",
            'uploadExtraData':{name:name},
            'uploadUrl':"mock.json",
            'showRemove' :false,
            showUpload: false,
            dropZoneEnabled: false,
            allowedFileExtensions : ['png', 'jpg', "bmp"],
        },
    };
    $.fn.
    $.fn.initForm = function(options){

        $(this).find("[name]").each(function(i, element){
            if($(this).hasClass("kyanag-form-editor")){
                let editor = new window.wangEditor(element);
                editor.create();
            }
            if($(this).hasClass("kyanag-form-image")){
                var name = $(this).attr("name");
                var preview = $(this).next().val();
                var valueContainer = $(this).next();

                (function (_this, valueContainer) {
                    $(_this).fileinput({
                        'language':"zh",
                        'uploadExtraData':{name:name},
                        'uploadUrl':"mock.json",
                        'showRemove' :false,
                        showUpload: false,
                        dropZoneEnabled: false,
                        allowedFileExtensions : ['png', 'jpg', "bmp"],
                        'initialPreview':[
                            `<img src="${preview}" style="width: auto;height: auto;max-width: 100%;max-height: 100%;">`,
                        ],
                        'initialPreviewConfig':[
                            {}
                        ],
                    }).on("filebatchselected", function(event, files) {
                        $(this).fileinput("upload");
                    }).on("fileuploaded", function (event, data, previewId, index){

                        $(valueContainer).val();
                    });
                })($(this), valueContainer);
            }
            if($(this).hasClass("kyanag-form-datetime")){
                $(this).datepicker(form.datetimeOptions);
            }
            if($(this).hasClass("kyanag-form-multiselect")){
                var data = $(this).data();
                $(this).select2(data);
            }
        })
    };
})($);