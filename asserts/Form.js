function Form(element){
    var columns = $(element).find("[name]");
    this.init = function(){
        console.log("form init!!");
        $(columns).each(function(i, element){
            if($(this).hasClass("kyanag-form-editor")){
                let editor = new window.wangEditor(element);
                editor.create();
            }
        });
    }
}