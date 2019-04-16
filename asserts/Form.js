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
            theme: "fas",
            //'uploadExtraData':{name:name},
            'uploadUrl':"/examples/upload.php",
            'showRemove' :false,
            showUpload: false,
            dropZoneEnabled: false,
            allowedFileExtensions : ['png', 'jpg', "bmp"],
            'initialPreview':[
                //`<img src="${preview}" style="width: auto;height: auto;max-width: 100%;max-height: 100%;">`,
            ],
            'initialPreviewConfig':[
                {}
            ],
        }
    };
    $.fn.initFormOptions = function(options){
        defaultOptions = options;
    };
    $.fn.initForm = function(options){
        $(this).find("[name]").each(function(i, element){
            if($(this).hasClass("kyanag-form-editor")){
                let editor = new window.wangEditor(element);
                editor.create();
            }
            if($(this).hasClass("kyanag-form-image")){
                let preview = $(this).next().val();
                let valueContainer = $(this).next();
                (function (_this, valueContainer) {
                    let options = $.extend(defaultOptions.fileinput, {
                        'uploadExtraData':{name:name},
                        'initialPreview':[
                            `<img src="${preview}" style="width: auto;height: auto;max-width: 100%;max-height: 100%;">`,
                        ],
                    });
                    $(_this).fileinput(options).on("filebatchselected", function(event, files) {
                        $(this).fileinput("upload");
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