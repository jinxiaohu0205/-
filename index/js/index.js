$(function(){
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
	 // banner轮播
	    var wai=$(".banner")[0];
		var imgb=$("li",$(".imgbox")[0]); 
		var dian=$("li",$(".circle")[0]);
		var left=$(".anniu left")[0];
		var right=$(".anniu right")[0];
		var imgbox=$(".imgbox")[0];
		var width=parseInt(getStyle(imgb[0],"width"));
		var nub=0;
		var next=0;
		var flag=true;
		var t=setInterval(move,2000);
		function move(){
			next=nub+1;
			if(next>imgb.length-1){
				next=0;
			}
			imgb[next].style.left=width+"px";
			animate(imgb[nub],{left:-width},500);
			animate(imgb[next],{left:0},500,function(){
				flag=true;
			});

			for(var i=0;i<imgb.length;i++){
				dian[i].className="";
			}
			dian[next].className="first";
			nub=next;
		}	

		wai.onmouseover=function(){
			clearInterval(t);
		}
		wai.onmouseout=function(){
			t=setInterval(move,2000);
		}
		for(var j=0;j<dian.length;j++){
			dian[j].index=j;
			dian[j].onclick=function(){
				if(this.index>nub){
               	imgb[this.index].style.left=width+"px";
			    animate(imgb[nub],{left:-width},500);
			    animate(imgb[this.index],{left:0},500);

				}else if(this.index<nub){
                 imgb[this.index].style.left=-width+"px";
			     animate(imgb[nub],{left:+width},500);
			     animate(imgb[this.index],{left:0},500);
				}
				for(var d=0;d<dian.length;d++){
				dian[d].className="";
                
				}
				this.className="first";
				
				nub=this.index;
			}

		}
		
		left.onclick=function(){
	    	if (flag){
	    		flag=false;
	    		next=nub-1;
			if(next<0){
				next=imgb.length-1;
			}
			imgb[next].style.left=-width+"px";
			animate(imgb[nub],{left:+width},500);
			animate(imgb[next],{left:0},500,function(){
				flag=true;
			});

			for(var i=0;i<imgb.length;i++){
				
				dian[i].className="";
			}
			
			dian[next].className="first";
			nub=next;
	    	}
			
		}
		right.onclick=function(){
			if (flag){
				flag=false;
				next=nub+1;
			if(next>imgb.length-1){
				next=0;
			}
			imgb[next].style.left=width+"px";
			animate(imgb[nub],{left:-width},500);
			animate(imgb[next],{left:0},500,function(){
				flag=true;
			});

			for(var i=0;i<imgb.length;i++){
				dian[i].className="";
			}
			dian[next].className="first";
			nub=next;
			}
			
		}
		// 主页完结



		//人才招聘
		// 选项卡
		var btn1=$(".active")[0];
		var btn2=$(".green")[0];
		var sanjiao1=$(".xlsx",btn1)[0];
		var sanjiao2=$(".xlsx",btn2)[0];
		var imgpost=$(".imgpost");
		imgpost[0].style.display="block";
		imgpost[1].style.display='none';
		sanjiao1.style.display="block";
		sanjiao2.style.display="none";
		btn2.onclick=function(){
			btn2.className="active";
			btn1.className="green";
			imgpost[0].style.display="none";
			imgpost[1].style.display='block';
			sanjiao1.style.display="none";
			sanjiao2.style.display="block";
		}
		btn1.onclick=function(){
			btn2.className="green";
			btn1.className="active";
			imgpost[0].style.display="block";
			imgpost[1].style.display='none';
			sanjiao1.style.display="block";
			sanjiao2.style.display="none";
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
	
	
