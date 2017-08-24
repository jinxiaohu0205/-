window.onload = function(){
	//	适配
	function size(originwidth){
    	var width=document.documentElement.clientWidth;
    	var bili=width/originwidth*100+"px";
    	$("html").css("font-size",bili);
    }
	 size(640);
}