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
        dataPicker:{
            format: "yyyy-mm-dd HH:MM"
        },
        uploader:{
            url:null,
        },
    };

    $.tablerFormSetup = function(options){
        defaultOptions = $.extend(defaultOptions, options);
    };

    $.fn.tablerForm = function (options) {
        options = $.extend(defaultOptions, options);

        $(this).find(".custom-datetime").each(function () {
            var format = $(this).data("format") || options.dataPicker.format;

            console.log(format);
            $(this).datetimepicker({
                uiLibrary: 'bootstrap4',
                locale: 'zh-cn',
                format: format
            });
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

        $(this).find(".ajax-file-input").each(function(){
            var uploader = WebUploader.create({
                // 文件接收服务端。
                server: options.uploader.url,
                // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
                resize: false,
                chunked: true,
                chunkSize: 1024 * 1024 * 1,
                threads: 1,
            });
            console.log(uploader);
            var btn = $(this).parent().find(".ajax-file-btn");
            $(btn).click(function(){
                uploader.reset();

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
    };
})(jQuery);