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
            uiLibrary: 'bootstrap4',
            locale: 'zh-cn',
            format: "yyyy-mm-dd HH:MM"
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

            let pickerOptions = $.extend({}, options.datetimePicker, {format});
            $(this).datetimepicker(pickerOptions);
        });

        $(this).find(".custom-range").each(function(){
            var min = parseFloat($(this).attr("min") || 0);
            var max = parseFloat($(this).attr("max") || 100);
            var that = $(this).parent().parent().find(".custom-range-input");
console.log(that);
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

        //select2选择
        $(this).find(".select2").each(function(){
            $(this).select2();
        });
    };
})(jQuery);