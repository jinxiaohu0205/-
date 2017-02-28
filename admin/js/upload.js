		function upload(url,inputobj,progressobj,imgobj){
			this.inputobj=inputobj||{};
			if(inputobj.nodeName=="INPUT"){
				this.inputobj=inputobj;
			}else if(typeof inputobj=="string"){
				this.inputobj=document.querySelector(inputobj);
			}
			
			this.progressobj=progressobj||{};
			console.log(progressobj)
			if(progressobj.nodeName=="INPUT"){
				this.progressobj=progressobj;
			}else if(typeof progressobj=="string"){
				this.progressobj=document.querySelector(progressobj);
			}
			
			this.imgobj=imgobj||{};
			if(imgobj.nodeName=="INPUT"){
				this.imgobj=imgobj;
			}else if(typeof imgobj=="string"){
				this.imgobj=document.querySelector(imgobj);
			}
			
			this.type=["png","jpg","zip","gif"];
			this.size=1024*1024*20;
			this.uploadName="file";
			this.url=url;
		}
		upload.prototype={
			up:function(callback){
				if(this.url){
					this.callback=callback;
					this.getCon();
				}else{
					alert("请指定路径");
				}
			},
			getCon:function(){
//				console.log(this.value);
				var that=this;
				
				this.inputobj.onchange=function(){
					that.data=this.files[0];
					var read=new FileReader();
					read.onload=function(e){
						that.imgobj.src=e.target.result;
					}
					read.readAsDataURL(that.data);
					if(that.check()){
						that.upfile();
					}
				}
			},
			check:function(){
				var that=this;
				console.log(this.data)
				var data=that.data;
				var size=data.size;
				var houzhui=data.name.substr(data.name.lastIndexOf(".")+1).toLowerCase();
				var flag=false;
				if(size>that.size){
					alert("文件过大");
					return false;
				};
				for(var i=0;i<that.type.length;i++){
					if(houzhui==that.type[i]){
						flag=true;
					}
				}
				if(!flag){
					alert("文件类型不符合");
					return false;
				}else{
					return true;
				}
				
			},
			upfile:function(){
				var that=this;
				var ajax=new XMLHttpRequest();
				ajax.onloadstart=function(e){
					that.start={};
				}	
				var form=new FormData();
				form.append(this.uploadName,this.data);
				ajax.upload.onprogress=function(e){
					var total=e.total;
					var loaded=e.loaded;
					var scale=loaded/total*100;
					that.progressobj.style.width=scale+"%";
				}
				ajax.onload=function(){
					if(that.callback){
						that.callback(ajax.response);
					}
					
				}
				ajax.open("post",that.url);
				ajax.send(form);
			}			
		}
//		window.onload=function(){
//			var obj=new upload("upload.php","input",".progress",".img img");
//			obj.up();
//		}
//		