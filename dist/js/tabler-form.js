const jQuery = require("jquery");
const WebUploader = require("webuploader");
const flatpickr = require("flatpickr");
const {China} = require("flatpickr/dist/l10n/zh")

require("bootstrap");
require("selectize");
require("moment");

require('bootstrap/dist/css/bootstrap.min.css')
require("../css/selectize-for-bootstrap4.css");

window.$ = window.jQuery = jQuery;

(function($){
    var createFile = function(delay){
        delay = 1000;

        var input = document.createElement("INPUT");
        input.setAttribute("type", "file");
        input.style.display = "none";

        setTimeout(function(){
            input.remove();
        }, delay);

        return input;
    };

    var defaultOptions = {
        onsuccess:null,
        onerror:null,
        url:null,
        datetimePicker:{
            locale: China,
            format: "date",
        },
        uploader:{
            url:null,
            resize: false,
            chunked: true,
            chunkSize: 1024 * 1024 * 1,
            threads: 1,
        },
    };

    $.tablerFormSetup = function(options){
        defaultOptions = $.extend(true, defaultOptions, options);
    };

    $.fn.tablerForm = function (options) {
        options = $.extend(defaultOptions, options);

        //日期时间选择
        $(this).find(".custom-datetime").each(function () {
            var format = $(this).data("format") || options.dataPicker.format;
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

        $(this).find(".custom-range").each(function(){
            var min = parseFloat($(this).attr("min") || 0);
            var max = parseFloat($(this).attr("max") || 100);
            var that = $(this).parent().parent().find(".custom-range-input");

            $(this).change(() => {
                $(that).val($(this).val());
            });

            $(that).change(() => {
                var value = parseFloat($(that).val());
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
        $(this).find(".ajax-file-input").each(function(){
            var btn = $(this).parent().find(".ajax-file-btn");
            $(btn).click(() => {
                console.log($(this).data());
                var upOptions = $.extend(options.uploader ,$(this).data());

                var uploader = WebUploader.create(upOptions);
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

                var file = createFile();
                $(file).change(function(){
                    var files = $(this).prop("files");
                    for(let i = 0; i < files.length; i++){
                        uploader.addFile(files.item(i));
                    }
                    uploader.upload();
                });
                $(file).click();
            });
        });

        //selectize选择
        $(this).find(".selectize").each(function(){
            $(this).selectize({
                load: function(query, callback) {
                    console.log(query);
                }
            });
        });
    };
})(jQuery);