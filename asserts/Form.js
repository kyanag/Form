//文件上传
(function($){
    if(WebUploader === undefined){
        console.error("依赖 WebUploader！");
        return false;
    }

    var parseOptions = function(options){
        var defaultOptions = {
            auto: true,
            // 文件接收服务端。
            server: options.url,
        };
        if(options.accept === 'image'){
            defaultOptions.accept = {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        }
        return defaultOptions;
    };

    var options = {
        url:"", //上传地址
        accept:null,
    };

    $.fn.fileupload = function(ops = {}){
        for (var _ in ops){
            options[_] = ops[_];
        }

        var id = $(this).attr("id");
        var eleValue = $(`#${id}`);
        var eleClearBtn = $(`#${id}-clear`);
        var eleSelectorBtn = $(`#${id}-selector`);
        var elePreview = $(`#${id}-preview`);
        var eleCard = $(`#${id}-card`);

        var dataFile = new function(){
            var url;
            this.set = function(url){
                $(eleValue).val(url);   //设置元素内容

                $(elePreview).find("img").attr("src", url);
                $(elePreview).show();   //预览
                $(eleCard).hide();      //隐藏上传
            };
            this.get = function () {
                return url;
            };
            this.clear = function(){
                this.url = null;

                $(elePreview).hide();   //预览
                $(eleCard).show();      //隐藏上传
            }
        };

        var _ = parseOptions(options);
        var uploader = WebUploader.create(_);
        uploader.on("uploadStart", function(file, percentage){
            $.fn.process.start();
        });
        uploader.on("uploadProgress", function(file, percentage){
            $.fn.process.report(percentage * 100);
        });
        uploader.on('uploadSuccess', function(file, response) {
            var url = response.urlpath;
            dataFile.set(url);
        });
        uploader.on('uploadError', function( file ) {
            layer.msg("上传失败!请稍后再试!");
            $.fn.process.completed();
        });
        uploader.on('uploadComplete', function( file ) {
            $.fn.process.completed();
            $(".file-uploader-temp").remove();//删除临时file
        });

        //注册点击事件
        $(eleCard).click(function(){
            var ele = createFileInput();
            $(ele).change(function(e, v){
                var file = e.target.files[0];
                uploader.addFile(file);
                uploader.upload();
            });
            $(ele).click();
        });

        //注册 清空 点击事件
        $(eleClearBtn).click(function(){
            dataFile.clear();
        });

        //注册选择按钮事件
        $(eleSelectorBtn).click(function(){
            //TODO 弹出文件列表， 提供选择
            layer.msg("暂未实现!");
        });
        $(eleValue).change(function(e){
            var url = $(this).val();
            dataFile.set(url);
        });

        //初始化
        if($(eleValue).val()){
            dataFile.set($(eleValue).val());
        }
    };

    var createFileInput = function(){
        var id = "file-" + function (len) {
            len = len || 32;
            var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';    /****默认去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1****/
            var maxPos = $chars.length;
            var pwd = '';
            for (i = 0; i < len; i++) {
                pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
            }
            return pwd;
        }(10);
        $(`<input type="file" id="${id}" class="file-uploader-temp" name="file" style="display: none"/>`).appendTo($("body"));
        return $(`#${id}`);
    };
})($);



(function($){
    var defaultOptions = {
        datetime:{
            'format':"yyyy-mm-dd",
            'language':"zh-CN",
            'autoclose': 1,
        },
        select2:{},
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

            if($(this).hasClass("kyanag-form-ajaximage") || $(this).hasClass("kyanag-form-ajaxfile")){
                $(this).fileupload();
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