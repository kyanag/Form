const jQuery = require("jquery");
const webUploader = require("webuploader");
const flatpickr = require("flatpickr");
const {Mandarin:zh} = require("flatpickr/dist/l10n/zh.js");
const ckEditor = require("@ckeditor/ckeditor5-build-classic");
const bootbox = require("bootbox");

require("bootstrap");
require("selectize");

require("@ckeditor/ckeditor5-build-classic/build/translations/zh-cn");
require('bootstrap/dist/css/bootstrap.min.css');
require("flatpickr/dist/flatpickr.min.css");

require("../css/selectize-for-bootstrap4.css");

window.$ = window.jQuery = jQuery;

(function($){
    let createFile = function(delay){
        delay = 1000;

        let input = document.createElement("INPUT");
        input.setAttribute("type", "file");
        input.style.display = "none";

        setTimeout(function(){
            input.remove();
        }, delay);

        return input;
    };

    let defaultOptions = {
        selectorPrefix:"oneform-",
        onsuccess:null,
        onerror:null,
        url:null,
        datetimePicker:{
            locale: zh,
        },
        uploader:{
            url:null,
            resize: false,
            chunked: true,
            chunkSize: 1024 * 1024 * 1,
            threads: 1,
        },
        ckeditor:{
            language: 'zh-cn'
        }
    };

    $.formerSetup = function(options){
        defaultOptions = $.extend(true, defaultOptions, options);
    };

    $.fn.former = function (options) {
        options = $.extend(defaultOptions, options);
        let selectorPrefix = options.selectorPrefix;

        let withPrefix = (val) => {
            return `${selectorPrefix}${val}`;
        };

        //日期时间选择
        $(this).find(`.${selectorPrefix}datetime`).each(function () {
            let format = $(this).data("format") || options.datetimePicker.format;
            if(format === "date"){
                format = "yyyy-MM-DD";
            }else if(format === "time"){
                format = "HH:MM";
            }else{
                format = "yyyy-MM-DD";
            }

            let pickerOptions = $.extend({}, options.datetimePicker, {format});
            flatpickr(this, pickerOptions);
        });

        $(this).find(`.${selectorPrefix}range`).each(function(){
            let min = parseFloat($(this).attr("min") || 0);
            let max = parseFloat($(this).attr("max") || 100);
            let that = $(this).parent().parent().find(".custom-range-input");

            $(this).change(() => {
                $(that).val($(this).val());
            });

            $(that).change(() => {
                let value = parseFloat($(that).val());
                if(value < min){
                    value = min;
                }
                if(value > max){
                    value = max;
                }
                $(this).val(value);
            });
        });

        //ajax文件上传
        $(this).find(`.${selectorPrefix}ajaxfile`).each(function(){
            let btn = $(this).parent().find(".ajax-file-btn");
            $(btn).click(() => {
                console.log($(this).data());
                let upOptions = $.extend(options.uploader ,$(this).data());

                let uploader = webUploader.create(upOptions);
                uploader.on("uploadSuccess", (file, response) => {
                    $(this).val(response.url);

                    $(this).popover({
                        content:"上传成功!",
                        delay: {
                            "show": 500,
                            "hide": 100
                        },
                        placement: "top",
                    });
                });

                let file = createFile();
                $(file).change(function(){
                    let files = $(this).prop("files");
                    for(let i = 0; i < files.length; i++){
                        uploader.addFile(files.item(i));
                    }
                    uploader.upload();
                });
                $(file).click();
            });
        });

        //selectize选择
        $(this).find(`.${selectorPrefix}selectize`).each(function(){
            $(this).selectize({
                load: function(query, callback) {
                    console.log(query);
                }
            });
        });

        //selectize选择
        $(this).find(`.${selectorPrefix}ckeditor`).each(function(){
            let editorOptions = $.extend(options.ckeditor, $(this).data());

            ckEditor.create( this, editorOptions)
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
                } );
        });

        //hasMany
        $(this).find(`.${selectorPrefix}hasmany`).each(function(){
            let id = $(this).attr("id");
            let tplTarget = $(this).data("tplTarget");
            let formZoneEle = $(this).find(`.${withPrefix("hasmany-formzone")}`);

            console.log(`.${withPrefix("hasmany-item-delete")}`);
            $(this).on("click", `.${withPrefix("hasmany-item-delete")}`, function(){
                bootbox.confirm("确认删除", (result) => {
                    if(result === true){
                        $(this).parent().parent().animate({height:'0px'}, "fast", function(){
                            $(this).remove();
                        })
                    }
                });
            });

            $(this).on("click", `.${withPrefix("hasmany-add")}`, () => {
                let length = $(formZoneEle).children().length;
                let tpl = $(tplTarget).html();

                console.log($(this).data());
                console.log(tplTarget);
                tpl = tpl.replace(/\?/g, length);

                let element = $(tpl);
                $(formZoneEle).append(element);

                $(element).former(options);
            });
        });
    };
})(jQuery);