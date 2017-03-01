(function(){
	
		// 主页
	//网站导航委派事件
		var button=$(".button")[0];
		var buttonn=$(".buttonn")[0];
			document.body.onclick=function(e){
				var ev=e||window.event;
				var aa=ev.target||ev.srcElement;
				if(aa.className==="button"||aa.className==="xiasanjiao"||aa.className==="zz"){
					buttonn.style.display="block";
				}else{
					buttonn.style.display="none";
				}

			}
	//首页点击
		var btn=$(".shouye");
		var ye=$(".lxt");
		for(var i=1;i<btn.length;i++){
			btn[i].index=i;
			btn[i].onclick=function(){
				  for(var c=0;c<ye.length;c++){
				  	ye[c].style.display="none";
				  }
				  ye[this.index].style.display="block";
			}
		}
	//		回到顶部
			var huiqu=$(".huiqu")[0];
			console.log(huiqu);
			huiqu.onclick=function(){
				alert(1);
				var obj=document.body.scrollTop?document.body:document.documentElement;
				scrollTop=obj.scrollTop;
				animate(obj,{scrollTop:0},500)
			
				}

})
