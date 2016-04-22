//封装bootstrap的模态窗
var BsModel={//传进json格式对象
	OpenModel :function (option){
				if(!option){
					option={};
				}
				if(!option.title){
					option.title="信息提示!";
				}
				if(!option.content){
					option.content="确认提示！";
				}
				if(!option.okcall){
					option.okcall=function(){}
					$("#BsModal .model-yes").hide();
				}else{
					$("#BsModal .model-yes").show();
				}
				if(!option.closecall){
					option.closecall=function(){}
				}
				
				$("#BsModal .modal-title").html(option.title);
				$("#BsModal .modal-body").html(option.content);
				
				$("#BsModal .model-yes").unbind().click(function(){
					option.okcall();
					$("#BsModal .model-body").children().remove();
				});
				
				$("#BsModal .model-close").unbind().click(function(){
					option.closecall();
					$("#BsModal .model-body").children().remove();
				});
				
				$('#BsModal').modal('show');
		},
	"CloseModel" :function(){
		$('#BsModal').modal('hide');
		$("#BsModal .model-body").children().remove();
	}
};
