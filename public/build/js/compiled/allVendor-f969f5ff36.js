(function(){var a,b,c,d,e,f,g,h,i=[].slice,j={}.hasOwnProperty,k=function(a,b){function c(){this.constructor=a}for(var d in b)j.call(b,d)&&(a[d]=b[d]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a};g=function(){},b=function(){function a(){}return a.prototype.addEventListener=a.prototype.on,a.prototype.on=function(a,b){return this._callbacks=this._callbacks||{},this._callbacks[a]||(this._callbacks[a]=[]),this._callbacks[a].push(b),this},a.prototype.emit=function(){var a,b,c,d,e,f;if(d=arguments[0],a=2<=arguments.length?i.call(arguments,1):[],this._callbacks=this._callbacks||{},c=this._callbacks[d])for(e=0,f=c.length;f>e;e++)b=c[e],b.apply(this,a);return this},a.prototype.removeListener=a.prototype.off,a.prototype.removeAllListeners=a.prototype.off,a.prototype.removeEventListener=a.prototype.off,a.prototype.off=function(a,b){var c,d,e,f,g;if(!this._callbacks||0===arguments.length)return this._callbacks={},this;if(d=this._callbacks[a],!d)return this;if(1===arguments.length)return delete this._callbacks[a],this;for(e=f=0,g=d.length;g>f;e=++f)if(c=d[e],c===b){d.splice(e,1);break}return this},a}(),a=function(a){function c(a,b){var e,f,g;if(this.element=a,this.version=c.version,this.defaultOptions.previewTemplate=this.defaultOptions.previewTemplate.replace(/\n*/g,""),this.clickableElements=[],this.listeners=[],this.files=[],"string"==typeof this.element&&(this.element=document.querySelector(this.element)),!this.element||null==this.element.nodeType)throw new Error("Invalid dropzone element.");if(this.element.dropzone)throw new Error("Dropzone already attached.");if(c.instances.push(this),this.element.dropzone=this,e=null!=(g=c.optionsForElement(this.element))?g:{},this.options=d({},this.defaultOptions,e,null!=b?b:{}),this.options.forceFallback||!c.isBrowserSupported())return this.options.fallback.call(this);if(null==this.options.url&&(this.options.url=this.element.getAttribute("action")),!this.options.url)throw new Error("No URL provided.");if(this.options.acceptedFiles&&this.options.acceptedMimeTypes)throw new Error("You can't provide both 'acceptedFiles' and 'acceptedMimeTypes'. 'acceptedMimeTypes' is deprecated.");this.options.acceptedMimeTypes&&(this.options.acceptedFiles=this.options.acceptedMimeTypes,delete this.options.acceptedMimeTypes),this.options.method=this.options.method.toUpperCase(),(f=this.getExistingFallback())&&f.parentNode&&f.parentNode.removeChild(f),this.options.previewsContainer!==!1&&(this.previewsContainer=this.options.previewsContainer?c.getElement(this.options.previewsContainer,"previewsContainer"):this.element),this.options.clickable&&(this.clickableElements=this.options.clickable===!0?[this.element]:c.getElements(this.options.clickable,"clickable")),this.init()}var d,e;return k(c,a),c.prototype.Emitter=b,c.prototype.events=["drop","dragstart","dragend","dragenter","dragover","dragleave","addedfile","addedfiles","removedfile","thumbnail","error","errormultiple","processing","processingmultiple","uploadprogress","totaluploadprogress","sending","sendingmultiple","success","successmultiple","canceled","canceledmultiple","complete","completemultiple","reset","maxfilesexceeded","maxfilesreached","queuecomplete"],c.prototype.defaultOptions={url:null,method:"post",withCredentials:!1,parallelUploads:2,uploadMultiple:!1,maxFilesize:256,paramName:"file",createImageThumbnails:!0,maxThumbnailFilesize:10,thumbnailWidth:120,thumbnailHeight:120,filesizeBase:1e3,maxFiles:null,params:{},clickable:!0,ignoreHiddenFiles:!0,acceptedFiles:null,acceptedMimeTypes:null,autoProcessQueue:!0,autoQueue:!0,addRemoveLinks:!1,previewsContainer:null,hiddenInputContainer:"body",capture:null,renameFilename:null,dictDefaultMessage:"Drop files here to upload",dictFallbackMessage:"Your browser does not support drag'n'drop file uploads.",dictFallbackText:"Please use the fallback form below to upload your files like in the olden days.",dictFileTooBig:"File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.",dictInvalidFileType:"You can't upload files of this type.",dictResponseError:"Server responded with {{statusCode}} code.",dictCancelUpload:"Cancel upload",dictCancelUploadConfirmation:"Are you sure you want to cancel this upload?",dictRemoveFile:"Remove file",dictRemoveFileConfirmation:null,dictMaxFilesExceeded:"You can not upload any more files.",accept:function(a,b){return b()},init:function(){return g},forceFallback:!1,fallback:function(){var a,b,d,e,f,g;for(this.element.className=""+this.element.className+" dz-browser-not-supported",g=this.element.getElementsByTagName("div"),e=0,f=g.length;f>e;e++)a=g[e],/(^| )dz-message($| )/.test(a.className)&&(b=a,a.className="dz-message");return b||(b=c.createElement('<div class="dz-message"><span></span></div>'),this.element.appendChild(b)),d=b.getElementsByTagName("span")[0],d&&(null!=d.textContent?d.textContent=this.options.dictFallbackMessage:null!=d.innerText&&(d.innerText=this.options.dictFallbackMessage)),this.element.appendChild(this.getFallbackForm())},resize:function(a){var b,c,d;return b={srcX:0,srcY:0,srcWidth:a.width,srcHeight:a.height},c=a.width/a.height,b.optWidth=this.options.thumbnailWidth,b.optHeight=this.options.thumbnailHeight,null==b.optWidth&&null==b.optHeight?(b.optWidth=b.srcWidth,b.optHeight=b.srcHeight):null==b.optWidth?b.optWidth=c*b.optHeight:null==b.optHeight&&(b.optHeight=1/c*b.optWidth),d=b.optWidth/b.optHeight,a.height<b.optHeight||a.width<b.optWidth?(b.trgHeight=b.srcHeight,b.trgWidth=b.srcWidth):c>d?(b.srcHeight=a.height,b.srcWidth=b.srcHeight*d):(b.srcWidth=a.width,b.srcHeight=b.srcWidth/d),b.srcX=(a.width-b.srcWidth)/2,b.srcY=(a.height-b.srcHeight)/2,b},drop:function(){return this.element.classList.remove("dz-drag-hover")},dragstart:g,dragend:function(){return this.element.classList.remove("dz-drag-hover")},dragenter:function(){return this.element.classList.add("dz-drag-hover")},dragover:function(){return this.element.classList.add("dz-drag-hover")},dragleave:function(){return this.element.classList.remove("dz-drag-hover")},paste:g,reset:function(){return this.element.classList.remove("dz-started")},addedfile:function(a){var b,d,e,f,g,h,i,j,k,l,m,n,o;if(this.element===this.previewsContainer&&this.element.classList.add("dz-started"),this.previewsContainer){for(a.previewElement=c.createElement(this.options.previewTemplate.trim()),a.previewTemplate=a.previewElement,this.previewsContainer.appendChild(a.previewElement),l=a.previewElement.querySelectorAll("[data-dz-name]"),f=0,i=l.length;i>f;f++)b=l[f],b.textContent=this._renameFilename(a.name);for(m=a.previewElement.querySelectorAll("[data-dz-size]"),g=0,j=m.length;j>g;g++)b=m[g],b.innerHTML=this.filesize(a.size);for(this.options.addRemoveLinks&&(a._removeLink=c.createElement('<a class="dz-remove" href="javascript:undefined;" data-dz-remove>'+this.options.dictRemoveFile+"</a>"),a.previewElement.appendChild(a._removeLink)),d=function(b){return function(d){return d.preventDefault(),d.stopPropagation(),a.status===c.UPLOADING?c.confirm(b.options.dictCancelUploadConfirmation,function(){return b.removeFile(a)}):b.options.dictRemoveFileConfirmation?c.confirm(b.options.dictRemoveFileConfirmation,function(){return b.removeFile(a)}):b.removeFile(a)}}(this),n=a.previewElement.querySelectorAll("[data-dz-remove]"),o=[],h=0,k=n.length;k>h;h++)e=n[h],o.push(e.addEventListener("click",d));return o}},removedfile:function(a){var b;return a.previewElement&&null!=(b=a.previewElement)&&b.parentNode.removeChild(a.previewElement),this._updateMaxFilesReachedClass()},thumbnail:function(a,b){var c,d,e,f;if(a.previewElement){for(a.previewElement.classList.remove("dz-file-preview"),f=a.previewElement.querySelectorAll("[data-dz-thumbnail]"),d=0,e=f.length;e>d;d++)c=f[d],c.alt=a.name,c.src=b;return setTimeout(function(){return function(){return a.previewElement.classList.add("dz-image-preview")}}(this),1)}},error:function(a,b){var c,d,e,f,g;if(a.previewElement){for(a.previewElement.classList.add("dz-error"),"String"!=typeof b&&b.error&&(b=b.error),f=a.previewElement.querySelectorAll("[data-dz-errormessage]"),g=[],d=0,e=f.length;e>d;d++)c=f[d],g.push(c.textContent=b);return g}},errormultiple:g,processing:function(a){return a.previewElement&&(a.previewElement.classList.add("dz-processing"),a._removeLink)?a._removeLink.textContent=this.options.dictCancelUpload:void 0},processingmultiple:g,uploadprogress:function(a,b){var c,d,e,f,g;if(a.previewElement){for(f=a.previewElement.querySelectorAll("[data-dz-uploadprogress]"),g=[],d=0,e=f.length;e>d;d++)c=f[d],g.push("PROGRESS"===c.nodeName?c.value=b:c.style.width=""+b+"%");return g}},totaluploadprogress:g,sending:g,sendingmultiple:g,success:function(a){return a.previewElement?a.previewElement.classList.add("dz-success"):void 0},successmultiple:g,canceled:function(a){return this.emit("error",a,"Upload canceled.")},canceledmultiple:g,complete:function(a){return a._removeLink&&(a._removeLink.textContent=this.options.dictRemoveFile),a.previewElement?a.previewElement.classList.add("dz-complete"):void 0},completemultiple:g,maxfilesexceeded:g,maxfilesreached:g,queuecomplete:g,addedfiles:g,previewTemplate:'<div class="dz-preview dz-file-preview">\n  <div class="dz-image"><img data-dz-thumbnail /></div>\n  <div class="dz-details">\n    <div class="dz-size"><span data-dz-size></span></div>\n    <div class="dz-filename"><span data-dz-name></span></div>\n  </div>\n  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>\n  <div class="dz-error-message"><span data-dz-errormessage></span></div>\n  <div class="dz-success-mark">\n    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">\n      <title>Check</title>\n      <defs></defs>\n      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">\n        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>\n      </g>\n    </svg>\n  </div>\n  <div class="dz-error-mark">\n    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">\n      <title>Error</title>\n      <defs></defs>\n      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">\n        <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">\n          <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>\n        </g>\n      </g>\n    </svg>\n  </div>\n</div>'},d=function(){var a,b,c,d,e,f,g;for(d=arguments[0],c=2<=arguments.length?i.call(arguments,1):[],f=0,g=c.length;g>f;f++){b=c[f];for(a in b)e=b[a],d[a]=e}return d},c.prototype.getAcceptedFiles=function(){var a,b,c,d,e;for(d=this.files,e=[],b=0,c=d.length;c>b;b++)a=d[b],a.accepted&&e.push(a);return e},c.prototype.getRejectedFiles=function(){var a,b,c,d,e;for(d=this.files,e=[],b=0,c=d.length;c>b;b++)a=d[b],a.accepted||e.push(a);return e},c.prototype.getFilesWithStatus=function(a){var b,c,d,e,f;for(e=this.files,f=[],c=0,d=e.length;d>c;c++)b=e[c],b.status===a&&f.push(b);return f},c.prototype.getQueuedFiles=function(){return this.getFilesWithStatus(c.QUEUED)},c.prototype.getUploadingFiles=function(){return this.getFilesWithStatus(c.UPLOADING)},c.prototype.getAddedFiles=function(){return this.getFilesWithStatus(c.ADDED)},c.prototype.getActiveFiles=function(){var a,b,d,e,f;for(e=this.files,f=[],b=0,d=e.length;d>b;b++)a=e[b],(a.status===c.UPLOADING||a.status===c.QUEUED)&&f.push(a);return f},c.prototype.init=function(){var a,b,d,e,f,g,h;for("form"===this.element.tagName&&this.element.setAttribute("enctype","multipart/form-data"),this.element.classList.contains("dropzone")&&!this.element.querySelector(".dz-message")&&this.element.appendChild(c.createElement('<div class="dz-default dz-message"><span>'+this.options.dictDefaultMessage+"</span></div>")),this.clickableElements.length&&(d=function(a){return function(){return a.hiddenFileInput&&a.hiddenFileInput.parentNode.removeChild(a.hiddenFileInput),a.hiddenFileInput=document.createElement("input"),a.hiddenFileInput.setAttribute("type","file"),(null==a.options.maxFiles||a.options.maxFiles>1)&&a.hiddenFileInput.setAttribute("multiple","multiple"),a.hiddenFileInput.className="dz-hidden-input",null!=a.options.acceptedFiles&&a.hiddenFileInput.setAttribute("accept",a.options.acceptedFiles),null!=a.options.capture&&a.hiddenFileInput.setAttribute("capture",a.options.capture),a.hiddenFileInput.style.visibility="hidden",a.hiddenFileInput.style.position="absolute",a.hiddenFileInput.style.top="0",a.hiddenFileInput.style.left="0",a.hiddenFileInput.style.height="0",a.hiddenFileInput.style.width="0",document.querySelector(a.options.hiddenInputContainer).appendChild(a.hiddenFileInput),a.hiddenFileInput.addEventListener("change",function(){var b,c,e,f;if(c=a.hiddenFileInput.files,c.length)for(e=0,f=c.length;f>e;e++)b=c[e],a.addFile(b);return a.emit("addedfiles",c),d()})}}(this))(),this.URL=null!=(g=window.URL)?g:window.webkitURL,h=this.events,e=0,f=h.length;f>e;e++)a=h[e],this.on(a,this.options[a]);return this.on("uploadprogress",function(a){return function(){return a.updateTotalUploadProgress()}}(this)),this.on("removedfile",function(a){return function(){return a.updateTotalUploadProgress()}}(this)),this.on("canceled",function(a){return function(b){return a.emit("complete",b)}}(this)),this.on("complete",function(a){return function(){return 0===a.getAddedFiles().length&&0===a.getUploadingFiles().length&&0===a.getQueuedFiles().length?setTimeout(function(){return a.emit("queuecomplete")},0):void 0}}(this)),b=function(a){return a.stopPropagation(),a.preventDefault?a.preventDefault():a.returnValue=!1},this.listeners=[{element:this.element,events:{dragstart:function(a){return function(b){return a.emit("dragstart",b)}}(this),dragenter:function(a){return function(c){return b(c),a.emit("dragenter",c)}}(this),dragover:function(a){return function(c){var d;try{d=c.dataTransfer.effectAllowed}catch(e){}return c.dataTransfer.dropEffect="move"===d||"linkMove"===d?"move":"copy",b(c),a.emit("dragover",c)}}(this),dragleave:function(a){return function(b){return a.emit("dragleave",b)}}(this),drop:function(a){return function(c){return b(c),a.drop(c)}}(this),dragend:function(a){return function(b){return a.emit("dragend",b)}}(this)}}],this.clickableElements.forEach(function(a){return function(b){return a.listeners.push({element:b,events:{click:function(d){return(b!==a.element||d.target===a.element||c.elementInside(d.target,a.element.querySelector(".dz-message")))&&a.hiddenFileInput.click(),!0}}})}}(this)),this.enable(),this.options.init.call(this)},c.prototype.destroy=function(){var a;return this.disable(),this.removeAllFiles(!0),(null!=(a=this.hiddenFileInput)?a.parentNode:void 0)&&(this.hiddenFileInput.parentNode.removeChild(this.hiddenFileInput),this.hiddenFileInput=null),delete this.element.dropzone,c.instances.splice(c.instances.indexOf(this),1)},c.prototype.updateTotalUploadProgress=function(){var a,b,c,d,e,f,g,h;if(d=0,c=0,a=this.getActiveFiles(),a.length){for(h=this.getActiveFiles(),f=0,g=h.length;g>f;f++)b=h[f],d+=b.upload.bytesSent,c+=b.upload.total;e=100*d/c}else e=100;return this.emit("totaluploadprogress",e,c,d)},c.prototype._getParamName=function(a){return"function"==typeof this.options.paramName?this.options.paramName(a):""+this.options.paramName+(this.options.uploadMultiple?"["+a+"]":"")},c.prototype._renameFilename=function(a){return"function"!=typeof this.options.renameFilename?a:this.options.renameFilename(a)},c.prototype.getFallbackForm=function(){var a,b,d,e;return(a=this.getExistingFallback())?a:(d='<div class="dz-fallback">',this.options.dictFallbackText&&(d+="<p>"+this.options.dictFallbackText+"</p>"),d+='<input type="file" name="'+this._getParamName(0)+'" '+(this.options.uploadMultiple?'multiple="multiple"':void 0)+' /><input type="submit" value="Upload!"></div>',b=c.createElement(d),"FORM"!==this.element.tagName?(e=c.createElement('<form action="'+this.options.url+'" enctype="multipart/form-data" method="'+this.options.method+'"></form>'),e.appendChild(b)):(this.element.setAttribute("enctype","multipart/form-data"),this.element.setAttribute("method",this.options.method)),null!=e?e:b)},c.prototype.getExistingFallback=function(){var a,b,c,d,e,f;for(b=function(a){var b,c,d;for(c=0,d=a.length;d>c;c++)if(b=a[c],/(^| )fallback($| )/.test(b.className))return b},f=["div","form"],d=0,e=f.length;e>d;d++)if(c=f[d],a=b(this.element.getElementsByTagName(c)))return a},c.prototype.setupEventListeners=function(){var a,b,c,d,e,f,g;for(f=this.listeners,g=[],d=0,e=f.length;e>d;d++)a=f[d],g.push(function(){var d,e;d=a.events,e=[];for(b in d)c=d[b],e.push(a.element.addEventListener(b,c,!1));return e}());return g},c.prototype.removeEventListeners=function(){var a,b,c,d,e,f,g;for(f=this.listeners,g=[],d=0,e=f.length;e>d;d++)a=f[d],g.push(function(){var d,e;d=a.events,e=[];for(b in d)c=d[b],e.push(a.element.removeEventListener(b,c,!1));return e}());return g},c.prototype.disable=function(){var a,b,c,d,e;for(this.clickableElements.forEach(function(a){return a.classList.remove("dz-clickable")}),this.removeEventListeners(),d=this.files,e=[],b=0,c=d.length;c>b;b++)a=d[b],e.push(this.cancelUpload(a));return e},c.prototype.enable=function(){return this.clickableElements.forEach(function(a){return a.classList.add("dz-clickable")}),this.setupEventListeners()},c.prototype.filesize=function(a){var b,c,d,e,f,g,h,i;if(d=0,e="b",a>0){for(g=["TB","GB","MB","KB","b"],c=h=0,i=g.length;i>h;c=++h)if(f=g[c],b=Math.pow(this.options.filesizeBase,4-c)/10,a>=b){d=a/Math.pow(this.options.filesizeBase,4-c),e=f;break}d=Math.round(10*d)/10}return"<strong>"+d+"</strong> "+e},c.prototype._updateMaxFilesReachedClass=function(){return null!=this.options.maxFiles&&this.getAcceptedFiles().length>=this.options.maxFiles?(this.getAcceptedFiles().length===this.options.maxFiles&&this.emit("maxfilesreached",this.files),this.element.classList.add("dz-max-files-reached")):this.element.classList.remove("dz-max-files-reached")},c.prototype.drop=function(a){var b,c;a.dataTransfer&&(this.emit("drop",a),b=a.dataTransfer.files,this.emit("addedfiles",b),b.length&&(c=a.dataTransfer.items,c&&c.length&&null!=c[0].webkitGetAsEntry?this._addFilesFromItems(c):this.handleFiles(b)))},c.prototype.paste=function(a){var b,c;if(null!=(null!=a&&null!=(c=a.clipboardData)?c.items:void 0))return this.emit("paste",a),b=a.clipboardData.items,b.length?this._addFilesFromItems(b):void 0},c.prototype.handleFiles=function(a){var b,c,d,e;for(e=[],c=0,d=a.length;d>c;c++)b=a[c],e.push(this.addFile(b));return e},c.prototype._addFilesFromItems=function(a){var b,c,d,e,f;for(f=[],d=0,e=a.length;e>d;d++)c=a[d],f.push(null!=c.webkitGetAsEntry&&(b=c.webkitGetAsEntry())?b.isFile?this.addFile(c.getAsFile()):b.isDirectory?this._addFilesFromDirectory(b,b.name):void 0:null!=c.getAsFile?null==c.kind||"file"===c.kind?this.addFile(c.getAsFile()):void 0:void 0);return f},c.prototype._addFilesFromDirectory=function(a,b){var c,d,e;return c=a.createReader(),d=function(a){return"undefined"!=typeof console&&null!==console&&"function"==typeof console.log?console.log(a):void 0},(e=function(a){return function(){return c.readEntries(function(c){var d,f,g;if(c.length>0){for(f=0,g=c.length;g>f;f++)d=c[f],d.isFile?d.file(function(c){return a.options.ignoreHiddenFiles&&"."===c.name.substring(0,1)?void 0:(c.fullPath=""+b+"/"+c.name,a.addFile(c))}):d.isDirectory&&a._addFilesFromDirectory(d,""+b+"/"+d.name);e()}return null},d)}}(this))()},c.prototype.accept=function(a,b){return a.size>1024*this.options.maxFilesize*1024?b(this.options.dictFileTooBig.replace("{{filesize}}",Math.round(a.size/1024/10.24)/100).replace("{{maxFilesize}}",this.options.maxFilesize)):c.isValidFile(a,this.options.acceptedFiles)?null!=this.options.maxFiles&&this.getAcceptedFiles().length>=this.options.maxFiles?(b(this.options.dictMaxFilesExceeded.replace("{{maxFiles}}",this.options.maxFiles)),this.emit("maxfilesexceeded",a)):this.options.accept.call(this,a,b):b(this.options.dictInvalidFileType)},c.prototype.addFile=function(a){return a.upload={progress:0,total:a.size,bytesSent:0},this.files.push(a),a.status=c.ADDED,this.emit("addedfile",a),this._enqueueThumbnail(a),this.accept(a,function(b){return function(c){return c?(a.accepted=!1,b._errorProcessing([a],c)):(a.accepted=!0,b.options.autoQueue&&b.enqueueFile(a)),b._updateMaxFilesReachedClass()}}(this))},c.prototype.enqueueFiles=function(a){var b,c,d;for(c=0,d=a.length;d>c;c++)b=a[c],this.enqueueFile(b);return null},c.prototype.enqueueFile=function(a){if(a.status!==c.ADDED||a.accepted!==!0)throw new Error("This file can't be queued because it has already been processed or was rejected.");return a.status=c.QUEUED,this.options.autoProcessQueue?setTimeout(function(a){return function(){return a.processQueue()}}(this),0):void 0},c.prototype._thumbnailQueue=[],c.prototype._processingThumbnail=!1,c.prototype._enqueueThumbnail=function(a){return this.options.createImageThumbnails&&a.type.match(/image.*/)&&a.size<=1024*this.options.maxThumbnailFilesize*1024?(this._thumbnailQueue.push(a),setTimeout(function(a){return function(){return a._processThumbnailQueue()}}(this),0)):void 0},c.prototype._processThumbnailQueue=function(){return this._processingThumbnail||0===this._thumbnailQueue.length?void 0:(this._processingThumbnail=!0,this.createThumbnail(this._thumbnailQueue.shift(),function(a){return function(){return a._processingThumbnail=!1,a._processThumbnailQueue()}}(this)))},c.prototype.removeFile=function(a){return a.status===c.UPLOADING&&this.cancelUpload(a),this.files=h(this.files,a),this.emit("removedfile",a),0===this.files.length?this.emit("reset"):void 0},c.prototype.removeAllFiles=function(a){var b,d,e,f;for(null==a&&(a=!1),f=this.files.slice(),d=0,e=f.length;e>d;d++)b=f[d],(b.status!==c.UPLOADING||a)&&this.removeFile(b);return null},c.prototype.createThumbnail=function(a,b){var c;return c=new FileReader,c.onload=function(d){return function(){return"image/svg+xml"===a.type?(d.emit("thumbnail",a,c.result),void(null!=b&&b())):d.createThumbnailFromUrl(a,c.result,b)}}(this),c.readAsDataURL(a)},c.prototype.createThumbnailFromUrl=function(a,b,c,d){var e;return e=document.createElement("img"),d&&(e.crossOrigin=d),e.onload=function(b){return function(){var d,g,h,i,j,k,l,m;return a.width=e.width,a.height=e.height,h=b.options.resize.call(b,a),null==h.trgWidth&&(h.trgWidth=h.optWidth),null==h.trgHeight&&(h.trgHeight=h.optHeight),d=document.createElement("canvas"),g=d.getContext("2d"),d.width=h.trgWidth,d.height=h.trgHeight,f(g,e,null!=(j=h.srcX)?j:0,null!=(k=h.srcY)?k:0,h.srcWidth,h.srcHeight,null!=(l=h.trgX)?l:0,null!=(m=h.trgY)?m:0,h.trgWidth,h.trgHeight),i=d.toDataURL("image/png"),b.emit("thumbnail",a,i),null!=c?c():void 0}}(this),null!=c&&(e.onerror=c),e.src=b},c.prototype.processQueue=function(){var a,b,c,d;if(b=this.options.parallelUploads,c=this.getUploadingFiles().length,a=c,!(c>=b)&&(d=this.getQueuedFiles(),d.length>0)){if(this.options.uploadMultiple)return this.processFiles(d.slice(0,b-c));for(;b>a;){if(!d.length)return;this.processFile(d.shift()),a++}}},c.prototype.processFile=function(a){return this.processFiles([a])},c.prototype.processFiles=function(a){var b,d,e;for(d=0,e=a.length;e>d;d++)b=a[d],b.processing=!0,b.status=c.UPLOADING,this.emit("processing",b);return this.options.uploadMultiple&&this.emit("processingmultiple",a),this.uploadFiles(a)},c.prototype._getFilesWithXhr=function(a){var b,c;return c=function(){var c,d,e,f;for(e=this.files,f=[],c=0,d=e.length;d>c;c++)b=e[c],b.xhr===a&&f.push(b);return f}.call(this)},c.prototype.cancelUpload=function(a){var b,d,e,f,g,h,i;if(a.status===c.UPLOADING){for(d=this._getFilesWithXhr(a.xhr),e=0,g=d.length;g>e;e++)b=d[e],b.status=c.CANCELED;for(a.xhr.abort(),f=0,h=d.length;h>f;f++)b=d[f],this.emit("canceled",b);this.options.uploadMultiple&&this.emit("canceledmultiple",d)}else((i=a.status)===c.ADDED||i===c.QUEUED)&&(a.status=c.CANCELED,this.emit("canceled",a),this.options.uploadMultiple&&this.emit("canceledmultiple",[a]));return this.options.autoProcessQueue?this.processQueue():void 0},e=function(){var a,b;return b=arguments[0],a=2<=arguments.length?i.call(arguments,1):[],"function"==typeof b?b.apply(this,a):b},c.prototype.uploadFile=function(a){return this.uploadFiles([a])},c.prototype.uploadFiles=function(a){var b,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L;for(w=new XMLHttpRequest,x=0,B=a.length;B>x;x++)b=a[x],b.xhr=w;p=e(this.options.method,a),u=e(this.options.url,a),w.open(p,u,!0),w.withCredentials=!!this.options.withCredentials,s=null,g=function(c){return function(){var d,e,f;for(f=[],d=0,e=a.length;e>d;d++)b=a[d],f.push(c._errorProcessing(a,s||c.options.dictResponseError.replace("{{statusCode}}",w.status),w));return f}}(this),t=function(c){return function(d){var e,f,g,h,i,j,k,l,m;if(null!=d)for(f=100*d.loaded/d.total,g=0,j=a.length;j>g;g++)b=a[g],b.upload={progress:f,total:d.total,bytesSent:d.loaded};else{for(e=!0,f=100,h=0,k=a.length;k>h;h++)b=a[h],(100!==b.upload.progress||b.upload.bytesSent!==b.upload.total)&&(e=!1),b.upload.progress=f,b.upload.bytesSent=b.upload.total;if(e)return}for(m=[],i=0,l=a.length;l>i;i++)b=a[i],m.push(c.emit("uploadprogress",b,f,b.upload.bytesSent));return m}}(this),w.onload=function(b){return function(d){var e;if(a[0].status!==c.CANCELED&&4===w.readyState){if(s=w.responseText,w.getResponseHeader("content-type")&&~w.getResponseHeader("content-type").indexOf("application/json"))try{s=JSON.parse(s)}catch(f){d=f,s="Invalid JSON response from server."}return t(),200<=(e=w.status)&&300>e?b._finished(a,s,d):g()}}}(this),w.onerror=function(){return function(){return a[0].status!==c.CANCELED?g():void 0}}(this),r=null!=(G=w.upload)?G:w,r.onprogress=t,j={Accept:"application/json","Cache-Control":"no-cache","X-Requested-With":"XMLHttpRequest"},this.options.headers&&d(j,this.options.headers);for(h in j)i=j[h],i&&w.setRequestHeader(h,i);if(f=new FormData,this.options.params){H=this.options.params;for(o in H)v=H[o],f.append(o,v)}for(y=0,C=a.length;C>y;y++)b=a[y],this.emit("sending",b,w,f);if(this.options.uploadMultiple&&this.emit("sendingmultiple",a,w,f),"FORM"===this.element.tagName)for(I=this.element.querySelectorAll("input, textarea, select, button"),z=0,D=I.length;D>z;z++)if(l=I[z],m=l.getAttribute("name"),n=l.getAttribute("type"),"SELECT"===l.tagName&&l.hasAttribute("multiple"))for(J=l.options,A=0,E=J.length;E>A;A++)q=J[A],q.selected&&f.append(m,q.value);else(!n||"checkbox"!==(K=n.toLowerCase())&&"radio"!==K||l.checked)&&f.append(m,l.value);for(k=F=0,L=a.length-1;L>=0?L>=F:F>=L;k=L>=0?++F:--F)f.append(this._getParamName(k),a[k],this._renameFilename(a[k].name));return this.submitRequest(w,f,a)},c.prototype.submitRequest=function(a,b){return a.send(b)},c.prototype._finished=function(a,b,d){var e,f,g;for(f=0,g=a.length;g>f;f++)e=a[f],e.status=c.SUCCESS,this.emit("success",e,b,d),this.emit("complete",e);return this.options.uploadMultiple&&(this.emit("successmultiple",a,b,d),this.emit("completemultiple",a)),this.options.autoProcessQueue?this.processQueue():void 0},c.prototype._errorProcessing=function(a,b,d){var e,f,g;for(f=0,g=a.length;g>f;f++)e=a[f],e.status=c.ERROR,this.emit("error",e,b,d),this.emit("complete",e);return this.options.uploadMultiple&&(this.emit("errormultiple",a,b,d),this.emit("completemultiple",a)),this.options.autoProcessQueue?this.processQueue():void 0},c}(b),a.version="4.3.0",a.options={},a.optionsForElement=function(b){return b.getAttribute("id")?a.options[c(b.getAttribute("id"))]:void 0},a.instances=[],a.forElement=function(a){if("string"==typeof a&&(a=document.querySelector(a)),null==(null!=a?a.dropzone:void 0))throw new Error("No Dropzone found for given element. This is probably because you're trying to access it before Dropzone had the time to initialize. Use the `init` option to setup any additional observers on your Dropzone.");return a.dropzone},a.autoDiscover=!0,a.discover=function(){var b,c,d,e,f,g;for(document.querySelectorAll?d=document.querySelectorAll(".dropzone"):(d=[],b=function(a){var b,c,e,f;for(f=[],c=0,e=a.length;e>c;c++)b=a[c],f.push(/(^| )dropzone($| )/.test(b.className)?d.push(b):void 0);return f},b(document.getElementsByTagName("div")),b(document.getElementsByTagName("form"))),g=[],e=0,f=d.length;f>e;e++)c=d[e],g.push(a.optionsForElement(c)!==!1?new a(c):void 0);return g},a.blacklistedBrowsers=[/opera.*Macintosh.*version\/12/i],a.isBrowserSupported=function(){var b,c,d,e,f;if(b=!0,window.File&&window.FileReader&&window.FileList&&window.Blob&&window.FormData&&document.querySelector)if("classList"in document.createElement("a"))for(f=a.blacklistedBrowsers,d=0,e=f.length;e>d;d++)c=f[d],c.test(navigator.userAgent)&&(b=!1);else b=!1;else b=!1;return b},h=function(a,b){var c,d,e,f;for(f=[],d=0,e=a.length;e>d;d++)c=a[d],c!==b&&f.push(c);return f},c=function(a){return a.replace(/[\-_](\w)/g,function(a){return a.charAt(1).toUpperCase()})},a.createElement=function(a){var b;return b=document.createElement("div"),b.innerHTML=a,b.childNodes[0]},a.elementInside=function(a,b){if(a===b)return!0;for(;a=a.parentNode;)if(a===b)return!0;return!1},a.getElement=function(a,b){var c;if("string"==typeof a?c=document.querySelector(a):null!=a.nodeType&&(c=a),null==c)throw new Error("Invalid `"+b+"` option provided. Please provide a CSS selector or a plain HTML element.");return c},a.getElements=function(a,b){var c,d,e,f,g,h,i,j;if(a instanceof Array){e=[];try{for(f=0,h=a.length;h>f;f++)d=a[f],e.push(this.getElement(d,b))}catch(k){c=k,e=null}}else if("string"==typeof a)for(e=[],j=document.querySelectorAll(a),g=0,i=j.length;i>g;g++)d=j[g],e.push(d);else null!=a.nodeType&&(e=[a]);if(null==e||!e.length)throw new Error("Invalid `"+b+"` option provided. Please provide a CSS selector, a plain HTML element or a list of those.");return e},a.confirm=function(a,b,c){return window.confirm(a)?b():null!=c?c():void 0},a.isValidFile=function(a,b){var c,d,e,f,g;if(!b)return!0;for(b=b.split(","),d=a.type,c=d.replace(/\/.*$/,""),f=0,g=b.length;g>f;f++)if(e=b[f],e=e.trim(),"."===e.charAt(0)){if(-1!==a.name.toLowerCase().indexOf(e.toLowerCase(),a.name.length-e.length))return!0}else if(/\/\*$/.test(e)){if(c===e.replace(/\/.*$/,""))return!0
}else if(d===e)return!0;return!1},"undefined"!=typeof jQuery&&null!==jQuery&&(jQuery.fn.dropzone=function(b){return this.each(function(){return new a(this,b)})}),"undefined"!=typeof module&&null!==module?module.exports=a:window.Dropzone=a,a.ADDED="added",a.QUEUED="queued",a.ACCEPTED=a.QUEUED,a.UPLOADING="uploading",a.PROCESSING=a.UPLOADING,a.CANCELED="canceled",a.ERROR="error",a.SUCCESS="success",e=function(a){var b,c,d,e,f,g,h,i,j,k;for(h=a.naturalWidth,g=a.naturalHeight,c=document.createElement("canvas"),c.width=1,c.height=g,d=c.getContext("2d"),d.drawImage(a,0,0),e=d.getImageData(0,0,1,g).data,k=0,f=g,i=g;i>k;)b=e[4*(i-1)+3],0===b?f=i:k=i,i=f+k>>1;return j=i/g,0===j?1:j},f=function(a,b,c,d,f,g,h,i,j,k){var l;return l=e(b),a.drawImage(b,c,d,f,g,h,i,j,k/l)},d=function(a,b){var c,d,e,f,g,h,i,j,k;if(e=!1,k=!0,d=a.document,j=d.documentElement,c=d.addEventListener?"addEventListener":"attachEvent",i=d.addEventListener?"removeEventListener":"detachEvent",h=d.addEventListener?"":"on",f=function(c){return"readystatechange"!==c.type||"complete"===d.readyState?(("load"===c.type?a:d)[i](h+c.type,f,!1),!e&&(e=!0)?b.call(a,c.type||c):void 0):void 0},g=function(){var a;try{j.doScroll("left")}catch(b){return a=b,void setTimeout(g,50)}return f("poll")},"complete"!==d.readyState){if(d.createEventObject&&j.doScroll){try{k=!a.frameElement}catch(l){}k&&g()}return d[c](h+"DOMContentLoaded",f,!1),d[c](h+"readystatechange",f,!1),a[c](h+"load",f,!1)}},a._autoDiscoverFunction=function(){return a.autoDiscover?a.discover():void 0},d(window,a._autoDiscoverFunction)}).call(this);
(function($){$.fn.extend({slimScroll:function(options){var defaults={width:"auto",height:"250px",size:"7px",color:"#000",position:"right",distance:"1px",start:"top",opacity:.4,alwaysVisible:false,disableFadeOut:false,railVisible:false,railColor:"#333",railOpacity:.2,railDraggable:true,railClass:"slimScrollRail",barClass:"slimScrollBar",wrapperClass:"slimScrollDiv",allowPageScroll:false,wheelStep:20,touchScrollStep:200,borderRadius:"7px",railBorderRadius:"7px"};var o=$.extend(defaults,options);this.each(function(){var isOverPanel,isOverBar,isDragg,queueHide,touchDif,barHeight,percentScroll,lastScroll,divS="<div></div>",minBarHeight=30,releaseScroll=false;var me=$(this);if(me.parent().hasClass(o.wrapperClass)){var offset=me.scrollTop();bar=me.parent().find("."+o.barClass);rail=me.parent().find("."+o.railClass);getBarHeight();if($.isPlainObject(options)){if("height"in options&&options.height=="auto"){me.parent().css("height","auto");me.css("height","auto");var height=me.parent().parent().height();me.parent().css("height",height);me.css("height",height)}if("scrollTo"in options){offset=parseInt(o.scrollTo)}else if("scrollBy"in options){offset+=parseInt(o.scrollBy)}else if("destroy"in options){bar.remove();rail.remove();me.unwrap();return}scrollContent(offset,false,true)}return}else if($.isPlainObject(options)){if("destroy"in options){return}}o.height=o.height=="auto"?me.parent().height():o.height;var wrapper=$(divS).addClass(o.wrapperClass).css({position:"relative",overflow:"hidden",width:o.width,height:o.height});me.css({overflow:"hidden",width:o.width,height:o.height,"-ms-touch-action":"none"});var rail=$(divS).addClass(o.railClass).css({width:o.size,height:"100%",position:"absolute",top:0,display:o.alwaysVisible&&o.railVisible?"block":"none","border-radius":o.railBorderRadius,background:o.railColor,opacity:o.railOpacity,zIndex:90});var bar=$(divS).addClass(o.barClass).css({background:o.color,width:o.size,position:"absolute",top:0,opacity:o.opacity,display:o.alwaysVisible?"block":"none","border-radius":o.borderRadius,BorderRadius:o.borderRadius,MozBorderRadius:o.borderRadius,WebkitBorderRadius:o.borderRadius,zIndex:99});var posCss=o.position=="right"?{right:o.distance}:{left:o.distance};rail.css(posCss);bar.css(posCss);me.wrap(wrapper);me.parent().append(bar);me.parent().append(rail);if(o.railDraggable){bar.bind("mousedown",function(e){var $doc=$(document);isDragg=true;t=parseFloat(bar.css("top"));pageY=e.pageY;$doc.bind("mousemove.slimscroll",function(e){currTop=t+e.pageY-pageY;bar.css("top",currTop);scrollContent(0,bar.position().top,false)});$doc.bind("mouseup.slimscroll",function(e){isDragg=false;hideBar();$doc.unbind(".slimscroll")});return false}).bind("selectstart.slimscroll",function(e){e.stopPropagation();e.preventDefault();return false})}rail.hover(function(){showBar()},function(){hideBar()});bar.hover(function(){isOverBar=true},function(){isOverBar=false});me.hover(function(){isOverPanel=true;showBar();hideBar()},function(){isOverPanel=false;hideBar()});if(window.navigator.msPointerEnabled){me.bind("MSPointerDown",function(e,b){if(e.originalEvent.targetTouches.length){touchDif=e.originalEvent.targetTouches[0].pageY}});me.bind("MSPointerMove",function(e){e.originalEvent.preventDefault();if(e.originalEvent.targetTouches.length){var diff=(touchDif-e.originalEvent.targetTouches[0].pageY)/o.touchScrollStep;scrollContent(diff,true);touchDif=e.originalEvent.targetTouches[0].pageY}})}else{me.bind("touchstart",function(e,b){if(e.originalEvent.touches.length){touchDif=e.originalEvent.touches[0].pageY}});me.bind("touchmove",function(e){if(!releaseScroll){e.originalEvent.preventDefault()}if(e.originalEvent.touches.length){var diff=(touchDif-e.originalEvent.touches[0].pageY)/o.touchScrollStep;scrollContent(diff,true);touchDif=e.originalEvent.touches[0].pageY}})}getBarHeight();if(o.start==="bottom"){bar.css({top:me.outerHeight()-bar.outerHeight()});scrollContent(0,true)}else if(o.start!=="top"){scrollContent($(o.start).position().top,null,true);if(!o.alwaysVisible){bar.hide()}}attachWheel();function _onWheel(e){if(!isOverPanel){return}var e=e||window.event;var delta=0;if(e.wheelDelta){delta=-e.wheelDelta/120}if(e.detail){delta=e.detail/3}var target=e.target||e.srcTarget||e.srcElement;if($(target).closest("."+o.wrapperClass).is(me.parent())){scrollContent(delta,true)}if(e.preventDefault&&!releaseScroll){e.preventDefault()}if(!releaseScroll){e.returnValue=false}}function scrollContent(y,isWheel,isJump){releaseScroll=false;var delta=y;var maxTop=me.outerHeight()-bar.outerHeight();if(isWheel){delta=parseInt(bar.css("top"))+y*parseInt(o.wheelStep)/100*bar.outerHeight();delta=Math.min(Math.max(delta,0),maxTop);delta=y>0?Math.ceil(delta):Math.floor(delta);bar.css({top:delta+"px"})}percentScroll=parseInt(bar.css("top"))/(me.outerHeight()-bar.outerHeight());delta=percentScroll*(me[0].scrollHeight-me.outerHeight());if(isJump){delta=y;var offsetTop=delta/me[0].scrollHeight*me.outerHeight();offsetTop=Math.min(Math.max(offsetTop,0),maxTop);bar.css({top:offsetTop+"px"})}me.scrollTop(delta);me.trigger("slimscrolling",~~delta);showBar();hideBar()}function attachWheel(){if(window.addEventListener){this.addEventListener("DOMMouseScroll",_onWheel,false);this.addEventListener("mousewheel",_onWheel,false)}else{document.attachEvent("onmousewheel",_onWheel)}}function getBarHeight(){barHeight=Math.max(me.outerHeight()/me[0].scrollHeight*me.outerHeight(),minBarHeight);bar.css({height:barHeight+"px"});var display=barHeight==me.outerHeight()?"none":"block";bar.css({display:display})}function showBar(){getBarHeight();clearTimeout(queueHide);if(percentScroll==~~percentScroll){releaseScroll=o.allowPageScroll;if(lastScroll!=percentScroll){var msg=~~percentScroll==0?"top":"bottom";me.trigger("slimscroll",msg)}}else{releaseScroll=false}lastScroll=percentScroll;if(barHeight>=me.outerHeight()){releaseScroll=true;return}bar.stop(true,true).fadeIn("fast");if(o.railVisible){rail.stop(true,true).fadeIn("fast")}}function hideBar(){if(!o.alwaysVisible){queueHide=setTimeout(function(){if(!(o.disableFadeOut&&isOverPanel)&&!isOverBar&&!isDragg){bar.fadeOut("slow");rail.fadeOut("slow")}},1e3)}}});return this}});$.fn.extend({slimscroll:$.fn.slimScroll})})(jQuery);
;(function () {
	'use strict';

	/**
	 * @preserve FastClick: polyfill to remove click delays on browsers with touch UIs.
	 *
	 * @codingstandard ftlabs-jsv2
	 * @copyright The Financial Times Limited [All Rights Reserved]
	 * @license MIT License (see LICENSE.txt)
	 */

	/*jslint browser:true, node:true*/
	/*global define, Event, Node*/


	/**
	 * Instantiate fast-clicking listeners on the specified layer.
	 *
	 * @constructor
	 * @param {Element} layer The layer to listen on
	 * @param {Object} [options={}] The options to override the defaults
	 */
	function FastClick(layer, options) {
		var oldOnClick;

		options = options || {};

		/**
		 * Whether a click is currently being tracked.
		 *
		 * @type boolean
		 */
		this.trackingClick = false;


		/**
		 * Timestamp for when click tracking started.
		 *
		 * @type number
		 */
		this.trackingClickStart = 0;


		/**
		 * The element being tracked for a click.
		 *
		 * @type EventTarget
		 */
		this.targetElement = null;


		/**
		 * X-coordinate of touch start event.
		 *
		 * @type number
		 */
		this.touchStartX = 0;


		/**
		 * Y-coordinate of touch start event.
		 *
		 * @type number
		 */
		this.touchStartY = 0;


		/**
		 * ID of the last touch, retrieved from Touch.identifier.
		 *
		 * @type number
		 */
		this.lastTouchIdentifier = 0;


		/**
		 * Touchmove boundary, beyond which a click will be cancelled.
		 *
		 * @type number
		 */
		this.touchBoundary = options.touchBoundary || 10;


		/**
		 * The FastClick layer.
		 *
		 * @type Element
		 */
		this.layer = layer;

		/**
		 * The minimum time between tap(touchstart and touchend) events
		 *
		 * @type number
		 */
		this.tapDelay = options.tapDelay || 200;

		/**
		 * The maximum time for a tap
		 *
		 * @type number
		 */
		this.tapTimeout = options.tapTimeout || 700;

		if (FastClick.notNeeded(layer)) {
			return;
		}

		// Some old versions of Android don't have Function.prototype.bind
		function bind(method, context) {
			return function() { return method.apply(context, arguments); };
		}


		var methods = ['onMouse', 'onClick', 'onTouchStart', 'onTouchMove', 'onTouchEnd', 'onTouchCancel'];
		var context = this;
		for (var i = 0, l = methods.length; i < l; i++) {
			context[methods[i]] = bind(context[methods[i]], context);
		}

		// Set up event handlers as required
		if (deviceIsAndroid) {
			layer.addEventListener('mouseover', this.onMouse, true);
			layer.addEventListener('mousedown', this.onMouse, true);
			layer.addEventListener('mouseup', this.onMouse, true);
		}

		layer.addEventListener('click', this.onClick, true);
		layer.addEventListener('touchstart', this.onTouchStart, false);
		layer.addEventListener('touchmove', this.onTouchMove, false);
		layer.addEventListener('touchend', this.onTouchEnd, false);
		layer.addEventListener('touchcancel', this.onTouchCancel, false);

		// Hack is required for browsers that don't support Event#stopImmediatePropagation (e.g. Android 2)
		// which is how FastClick normally stops click events bubbling to callbacks registered on the FastClick
		// layer when they are cancelled.
		if (!Event.prototype.stopImmediatePropagation) {
			layer.removeEventListener = function(type, callback, capture) {
				var rmv = Node.prototype.removeEventListener;
				if (type === 'click') {
					rmv.call(layer, type, callback.hijacked || callback, capture);
				} else {
					rmv.call(layer, type, callback, capture);
				}
			};

			layer.addEventListener = function(type, callback, capture) {
				var adv = Node.prototype.addEventListener;
				if (type === 'click') {
					adv.call(layer, type, callback.hijacked || (callback.hijacked = function(event) {
						if (!event.propagationStopped) {
							callback(event);
						}
					}), capture);
				} else {
					adv.call(layer, type, callback, capture);
				}
			};
		}

		// If a handler is already declared in the element's onclick attribute, it will be fired before
		// FastClick's onClick handler. Fix this by pulling out the user-defined handler function and
		// adding it as listener.
		if (typeof layer.onclick === 'function') {

			// Android browser on at least 3.2 requires a new reference to the function in layer.onclick
			// - the old one won't work if passed to addEventListener directly.
			oldOnClick = layer.onclick;
			layer.addEventListener('click', function(event) {
				oldOnClick(event);
			}, false);
			layer.onclick = null;
		}
	}

	/**
	* Windows Phone 8.1 fakes user agent string to look like Android and iPhone.
	*
	* @type boolean
	*/
	var deviceIsWindowsPhone = navigator.userAgent.indexOf("Windows Phone") >= 0;

	/**
	 * Android requires exceptions.
	 *
	 * @type boolean
	 */
	var deviceIsAndroid = navigator.userAgent.indexOf('Android') > 0 && !deviceIsWindowsPhone;


	/**
	 * iOS requires exceptions.
	 *
	 * @type boolean
	 */
	var deviceIsIOS = /iP(ad|hone|od)/.test(navigator.userAgent) && !deviceIsWindowsPhone;


	/**
	 * iOS 4 requires an exception for select elements.
	 *
	 * @type boolean
	 */
	var deviceIsIOS4 = deviceIsIOS && (/OS 4_\d(_\d)?/).test(navigator.userAgent);


	/**
	 * iOS 6.0-7.* requires the target element to be manually derived
	 *
	 * @type boolean
	 */
	var deviceIsIOSWithBadTarget = deviceIsIOS && (/OS [6-7]_\d/).test(navigator.userAgent);

	/**
	 * BlackBerry requires exceptions.
	 *
	 * @type boolean
	 */
	var deviceIsBlackBerry10 = navigator.userAgent.indexOf('BB10') > 0;

	/**
	 * Determine whether a given element requires a native click.
	 *
	 * @param {EventTarget|Element} target Target DOM element
	 * @returns {boolean} Returns true if the element needs a native click
	 */
	FastClick.prototype.needsClick = function(target) {
		switch (target.nodeName.toLowerCase()) {

		// Don't send a synthetic click to disabled inputs (issue #62)
		case 'button':
		case 'select':
		case 'textarea':
			if (target.disabled) {
				return true;
			}

			break;
		case 'input':

			// File inputs need real clicks on iOS 6 due to a browser bug (issue #68)
			if ((deviceIsIOS && target.type === 'file') || target.disabled) {
				return true;
			}

			break;
		case 'label':
		case 'iframe': // iOS8 homescreen apps can prevent events bubbling into frames
		case 'video':
			return true;
		}

		return (/\bneedsclick\b/).test(target.className);
	};


	/**
	 * Determine whether a given element requires a call to focus to simulate click into element.
	 *
	 * @param {EventTarget|Element} target Target DOM element
	 * @returns {boolean} Returns true if the element requires a call to focus to simulate native click.
	 */
	FastClick.prototype.needsFocus = function(target) {
		switch (target.nodeName.toLowerCase()) {
		case 'textarea':
			return true;
		case 'select':
			return !deviceIsAndroid;
		case 'input':
			switch (target.type) {
			case 'button':
			case 'checkbox':
			case 'file':
			case 'image':
			case 'radio':
			case 'submit':
				return false;
			}

			// No point in attempting to focus disabled inputs
			return !target.disabled && !target.readOnly;
		default:
			return (/\bneedsfocus\b/).test(target.className);
		}
	};


	/**
	 * Send a click event to the specified element.
	 *
	 * @param {EventTarget|Element} targetElement
	 * @param {Event} event
	 */
	FastClick.prototype.sendClick = function(targetElement, event) {
		var clickEvent, touch;

		// On some Android devices activeElement needs to be blurred otherwise the synthetic click will have no effect (#24)
		if (document.activeElement && document.activeElement !== targetElement) {
			document.activeElement.blur();
		}

		touch = event.changedTouches[0];

		// Synthesise a click event, with an extra attribute so it can be tracked
		clickEvent = document.createEvent('MouseEvents');
		clickEvent.initMouseEvent(this.determineEventType(targetElement), true, true, window, 1, touch.screenX, touch.screenY, touch.clientX, touch.clientY, false, false, false, false, 0, null);
		clickEvent.forwardedTouchEvent = true;
		targetElement.dispatchEvent(clickEvent);
	};

	FastClick.prototype.determineEventType = function(targetElement) {

		//Issue #159: Android Chrome Select Box does not open with a synthetic click event
		if (deviceIsAndroid && targetElement.tagName.toLowerCase() === 'select') {
			return 'mousedown';
		}

		return 'click';
	};


	/**
	 * @param {EventTarget|Element} targetElement
	 */
	FastClick.prototype.focus = function(targetElement) {
		var length;

		// Issue #160: on iOS 7, some input elements (e.g. date datetime month) throw a vague TypeError on setSelectionRange. These elements don't have an integer value for the selectionStart and selectionEnd properties, but unfortunately that can't be used for detection because accessing the properties also throws a TypeError. Just check the type instead. Filed as Apple bug #15122724.
		if (deviceIsIOS && targetElement.setSelectionRange && targetElement.type.indexOf('date') !== 0 && targetElement.type !== 'time' && targetElement.type !== 'month') {
			length = targetElement.value.length;
			targetElement.setSelectionRange(length, length);
		} else {
			targetElement.focus();
		}
	};


	/**
	 * Check whether the given target element is a child of a scrollable layer and if so, set a flag on it.
	 *
	 * @param {EventTarget|Element} targetElement
	 */
	FastClick.prototype.updateScrollParent = function(targetElement) {
		var scrollParent, parentElement;

		scrollParent = targetElement.fastClickScrollParent;

		// Attempt to discover whether the target element is contained within a scrollable layer. Re-check if the
		// target element was moved to another parent.
		if (!scrollParent || !scrollParent.contains(targetElement)) {
			parentElement = targetElement;
			do {
				if (parentElement.scrollHeight > parentElement.offsetHeight) {
					scrollParent = parentElement;
					targetElement.fastClickScrollParent = parentElement;
					break;
				}

				parentElement = parentElement.parentElement;
			} while (parentElement);
		}

		// Always update the scroll top tracker if possible.
		if (scrollParent) {
			scrollParent.fastClickLastScrollTop = scrollParent.scrollTop;
		}
	};


	/**
	 * @param {EventTarget} targetElement
	 * @returns {Element|EventTarget}
	 */
	FastClick.prototype.getTargetElementFromEventTarget = function(eventTarget) {

		// On some older browsers (notably Safari on iOS 4.1 - see issue #56) the event target may be a text node.
		if (eventTarget.nodeType === Node.TEXT_NODE) {
			return eventTarget.parentNode;
		}

		return eventTarget;
	};


	/**
	 * On touch start, record the position and scroll offset.
	 *
	 * @param {Event} event
	 * @returns {boolean}
	 */
	FastClick.prototype.onTouchStart = function(event) {
		var targetElement, touch, selection;

		// Ignore multiple touches, otherwise pinch-to-zoom is prevented if both fingers are on the FastClick element (issue #111).
		if (event.targetTouches.length > 1) {
			return true;
		}

		targetElement = this.getTargetElementFromEventTarget(event.target);
		touch = event.targetTouches[0];

		if (deviceIsIOS) {

			// Only trusted events will deselect text on iOS (issue #49)
			selection = window.getSelection();
			if (selection.rangeCount && !selection.isCollapsed) {
				return true;
			}

			if (!deviceIsIOS4) {

				// Weird things happen on iOS when an alert or confirm dialog is opened from a click event callback (issue #23):
				// when the user next taps anywhere else on the page, new touchstart and touchend events are dispatched
				// with the same identifier as the touch event that previously triggered the click that triggered the alert.
				// Sadly, there is an issue on iOS 4 that causes some normal touch events to have the same identifier as an
				// immediately preceeding touch event (issue #52), so this fix is unavailable on that platform.
				// Issue 120: touch.identifier is 0 when Chrome dev tools 'Emulate touch events' is set with an iOS device UA string,
				// which causes all touch events to be ignored. As this block only applies to iOS, and iOS identifiers are always long,
				// random integers, it's safe to to continue if the identifier is 0 here.
				if (touch.identifier && touch.identifier === this.lastTouchIdentifier) {
					event.preventDefault();
					return false;
				}

				this.lastTouchIdentifier = touch.identifier;

				// If the target element is a child of a scrollable layer (using -webkit-overflow-scrolling: touch) and:
				// 1) the user does a fling scroll on the scrollable layer
				// 2) the user stops the fling scroll with another tap
				// then the event.target of the last 'touchend' event will be the element that was under the user's finger
				// when the fling scroll was started, causing FastClick to send a click event to that layer - unless a check
				// is made to ensure that a parent layer was not scrolled before sending a synthetic click (issue #42).
				this.updateScrollParent(targetElement);
			}
		}

		this.trackingClick = true;
		this.trackingClickStart = event.timeStamp;
		this.targetElement = targetElement;

		this.touchStartX = touch.pageX;
		this.touchStartY = touch.pageY;

		// Prevent phantom clicks on fast double-tap (issue #36)
		if ((event.timeStamp - this.lastClickTime) < this.tapDelay) {
			event.preventDefault();
		}

		return true;
	};


	/**
	 * Based on a touchmove event object, check whether the touch has moved past a boundary since it started.
	 *
	 * @param {Event} event
	 * @returns {boolean}
	 */
	FastClick.prototype.touchHasMoved = function(event) {
		var touch = event.changedTouches[0], boundary = this.touchBoundary;

		if (Math.abs(touch.pageX - this.touchStartX) > boundary || Math.abs(touch.pageY - this.touchStartY) > boundary) {
			return true;
		}

		return false;
	};


	/**
	 * Update the last position.
	 *
	 * @param {Event} event
	 * @returns {boolean}
	 */
	FastClick.prototype.onTouchMove = function(event) {
		if (!this.trackingClick) {
			return true;
		}

		// If the touch has moved, cancel the click tracking
		if (this.targetElement !== this.getTargetElementFromEventTarget(event.target) || this.touchHasMoved(event)) {
			this.trackingClick = false;
			this.targetElement = null;
		}

		return true;
	};


	/**
	 * Attempt to find the labelled control for the given label element.
	 *
	 * @param {EventTarget|HTMLLabelElement} labelElement
	 * @returns {Element|null}
	 */
	FastClick.prototype.findControl = function(labelElement) {

		// Fast path for newer browsers supporting the HTML5 control attribute
		if (labelElement.control !== undefined) {
			return labelElement.control;
		}

		// All browsers under test that support touch events also support the HTML5 htmlFor attribute
		if (labelElement.htmlFor) {
			return document.getElementById(labelElement.htmlFor);
		}

		// If no for attribute exists, attempt to retrieve the first labellable descendant element
		// the list of which is defined here: http://www.w3.org/TR/html5/forms.html#category-label
		return labelElement.querySelector('button, input:not([type=hidden]), keygen, meter, output, progress, select, textarea');
	};


	/**
	 * On touch end, determine whether to send a click event at once.
	 *
	 * @param {Event} event
	 * @returns {boolean}
	 */
	FastClick.prototype.onTouchEnd = function(event) {
		var forElement, trackingClickStart, targetTagName, scrollParent, touch, targetElement = this.targetElement;

		if (!this.trackingClick) {
			return true;
		}

		// Prevent phantom clicks on fast double-tap (issue #36)
		if ((event.timeStamp - this.lastClickTime) < this.tapDelay) {
			this.cancelNextClick = true;
			return true;
		}

		if ((event.timeStamp - this.trackingClickStart) > this.tapTimeout) {
			return true;
		}

		// Reset to prevent wrong click cancel on input (issue #156).
		this.cancelNextClick = false;

		this.lastClickTime = event.timeStamp;

		trackingClickStart = this.trackingClickStart;
		this.trackingClick = false;
		this.trackingClickStart = 0;

		// On some iOS devices, the targetElement supplied with the event is invalid if the layer
		// is performing a transition or scroll, and has to be re-detected manually. Note that
		// for this to function correctly, it must be called *after* the event target is checked!
		// See issue #57; also filed as rdar://13048589 .
		if (deviceIsIOSWithBadTarget) {
			touch = event.changedTouches[0];

			// In certain cases arguments of elementFromPoint can be negative, so prevent setting targetElement to null
			targetElement = document.elementFromPoint(touch.pageX - window.pageXOffset, touch.pageY - window.pageYOffset) || targetElement;
			targetElement.fastClickScrollParent = this.targetElement.fastClickScrollParent;
		}

		targetTagName = targetElement.tagName.toLowerCase();
		if (targetTagName === 'label') {
			forElement = this.findControl(targetElement);
			if (forElement) {
				this.focus(targetElement);
				if (deviceIsAndroid) {
					return false;
				}

				targetElement = forElement;
			}
		} else if (this.needsFocus(targetElement)) {

			// Case 1: If the touch started a while ago (best guess is 100ms based on tests for issue #36) then focus will be triggered anyway. Return early and unset the target element reference so that the subsequent click will be allowed through.
			// Case 2: Without this exception for input elements tapped when the document is contained in an iframe, then any inputted text won't be visible even though the value attribute is updated as the user types (issue #37).
			if ((event.timeStamp - trackingClickStart) > 100 || (deviceIsIOS && window.top !== window && targetTagName === 'input')) {
				this.targetElement = null;
				return false;
			}

			this.focus(targetElement);
			this.sendClick(targetElement, event);

			// Select elements need the event to go through on iOS 4, otherwise the selector menu won't open.
			// Also this breaks opening selects when VoiceOver is active on iOS6, iOS7 (and possibly others)
			if (!deviceIsIOS || targetTagName !== 'select') {
				this.targetElement = null;
				event.preventDefault();
			}

			return false;
		}

		if (deviceIsIOS && !deviceIsIOS4) {

			// Don't send a synthetic click event if the target element is contained within a parent layer that was scrolled
			// and this tap is being used to stop the scrolling (usually initiated by a fling - issue #42).
			scrollParent = targetElement.fastClickScrollParent;
			if (scrollParent && scrollParent.fastClickLastScrollTop !== scrollParent.scrollTop) {
				return true;
			}
		}

		// Prevent the actual click from going though - unless the target node is marked as requiring
		// real clicks or if it is in the whitelist in which case only non-programmatic clicks are permitted.
		if (!this.needsClick(targetElement)) {
			event.preventDefault();
			this.sendClick(targetElement, event);
		}

		return false;
	};


	/**
	 * On touch cancel, stop tracking the click.
	 *
	 * @returns {void}
	 */
	FastClick.prototype.onTouchCancel = function() {
		this.trackingClick = false;
		this.targetElement = null;
	};


	/**
	 * Determine mouse events which should be permitted.
	 *
	 * @param {Event} event
	 * @returns {boolean}
	 */
	FastClick.prototype.onMouse = function(event) {

		// If a target element was never set (because a touch event was never fired) allow the event
		if (!this.targetElement) {
			return true;
		}

		if (event.forwardedTouchEvent) {
			return true;
		}

		// Programmatically generated events targeting a specific element should be permitted
		if (!event.cancelable) {
			return true;
		}

		// Derive and check the target element to see whether the mouse event needs to be permitted;
		// unless explicitly enabled, prevent non-touch click events from triggering actions,
		// to prevent ghost/doubleclicks.
		if (!this.needsClick(this.targetElement) || this.cancelNextClick) {

			// Prevent any user-added listeners declared on FastClick element from being fired.
			if (event.stopImmediatePropagation) {
				event.stopImmediatePropagation();
			} else {

				// Part of the hack for browsers that don't support Event#stopImmediatePropagation (e.g. Android 2)
				event.propagationStopped = true;
			}

			// Cancel the event
			event.stopPropagation();
			event.preventDefault();

			return false;
		}

		// If the mouse event is permitted, return true for the action to go through.
		return true;
	};


	/**
	 * On actual clicks, determine whether this is a touch-generated click, a click action occurring
	 * naturally after a delay after a touch (which needs to be cancelled to avoid duplication), or
	 * an actual click which should be permitted.
	 *
	 * @param {Event} event
	 * @returns {boolean}
	 */
	FastClick.prototype.onClick = function(event) {
		var permitted;

		// It's possible for another FastClick-like library delivered with third-party code to fire a click event before FastClick does (issue #44). In that case, set the click-tracking flag back to false and return early. This will cause onTouchEnd to return early.
		if (this.trackingClick) {
			this.targetElement = null;
			this.trackingClick = false;
			return true;
		}

		// Very odd behaviour on iOS (issue #18): if a submit element is present inside a form and the user hits enter in the iOS simulator or clicks the Go button on the pop-up OS keyboard the a kind of 'fake' click event will be triggered with the submit-type input element as the target.
		if (event.target.type === 'submit' && event.detail === 0) {
			return true;
		}

		permitted = this.onMouse(event);

		// Only unset targetElement if the click is not permitted. This will ensure that the check for !targetElement in onMouse fails and the browser's click doesn't go through.
		if (!permitted) {
			this.targetElement = null;
		}

		// If clicks are permitted, return true for the action to go through.
		return permitted;
	};


	/**
	 * Remove all FastClick's event listeners.
	 *
	 * @returns {void}
	 */
	FastClick.prototype.destroy = function() {
		var layer = this.layer;

		if (deviceIsAndroid) {
			layer.removeEventListener('mouseover', this.onMouse, true);
			layer.removeEventListener('mousedown', this.onMouse, true);
			layer.removeEventListener('mouseup', this.onMouse, true);
		}

		layer.removeEventListener('click', this.onClick, true);
		layer.removeEventListener('touchstart', this.onTouchStart, false);
		layer.removeEventListener('touchmove', this.onTouchMove, false);
		layer.removeEventListener('touchend', this.onTouchEnd, false);
		layer.removeEventListener('touchcancel', this.onTouchCancel, false);
	};


	/**
	 * Check whether FastClick is needed.
	 *
	 * @param {Element} layer The layer to listen on
	 */
	FastClick.notNeeded = function(layer) {
		var metaViewport;
		var chromeVersion;
		var blackberryVersion;
		var firefoxVersion;

		// Devices that don't support touch don't need FastClick
		if (typeof window.ontouchstart === 'undefined') {
			return true;
		}

		// Chrome version - zero for other browsers
		chromeVersion = +(/Chrome\/([0-9]+)/.exec(navigator.userAgent) || [,0])[1];

		if (chromeVersion) {

			if (deviceIsAndroid) {
				metaViewport = document.querySelector('meta[name=viewport]');

				if (metaViewport) {
					// Chrome on Android with user-scalable="no" doesn't need FastClick (issue #89)
					if (metaViewport.content.indexOf('user-scalable=no') !== -1) {
						return true;
					}
					// Chrome 32 and above with width=device-width or less don't need FastClick
					if (chromeVersion > 31 && document.documentElement.scrollWidth <= window.outerWidth) {
						return true;
					}
				}

			// Chrome desktop doesn't need FastClick (issue #15)
			} else {
				return true;
			}
		}

		if (deviceIsBlackBerry10) {
			blackberryVersion = navigator.userAgent.match(/Version\/([0-9]*)\.([0-9]*)/);

			// BlackBerry 10.3+ does not require Fastclick library.
			// https://github.com/ftlabs/fastclick/issues/251
			if (blackberryVersion[1] >= 10 && blackberryVersion[2] >= 3) {
				metaViewport = document.querySelector('meta[name=viewport]');

				if (metaViewport) {
					// user-scalable=no eliminates click delay.
					if (metaViewport.content.indexOf('user-scalable=no') !== -1) {
						return true;
					}
					// width=device-width (or less than device-width) eliminates click delay.
					if (document.documentElement.scrollWidth <= window.outerWidth) {
						return true;
					}
				}
			}
		}

		// IE10 with -ms-touch-action: none or manipulation, which disables double-tap-to-zoom (issue #97)
		if (layer.style.msTouchAction === 'none' || layer.style.touchAction === 'manipulation') {
			return true;
		}

		// Firefox version - zero for other browsers
		firefoxVersion = +(/Firefox\/([0-9]+)/.exec(navigator.userAgent) || [,0])[1];

		if (firefoxVersion >= 27) {
			// Firefox 27+ does not have tap delay if the content is not zoomable - https://bugzilla.mozilla.org/show_bug.cgi?id=922896

			metaViewport = document.querySelector('meta[name=viewport]');
			if (metaViewport && (metaViewport.content.indexOf('user-scalable=no') !== -1 || document.documentElement.scrollWidth <= window.outerWidth)) {
				return true;
			}
		}

		// IE11: prefixed -ms-touch-action is no longer supported and it's recomended to use non-prefixed version
		// http://msdn.microsoft.com/en-us/library/windows/apps/Hh767313.aspx
		if (layer.style.touchAction === 'none' || layer.style.touchAction === 'manipulation') {
			return true;
		}

		return false;
	};


	/**
	 * Factory method for creating a FastClick object
	 *
	 * @param {Element} layer The layer to listen on
	 * @param {Object} [options={}] The options to override the defaults
	 */
	FastClick.attach = function(layer, options) {
		return new FastClick(layer, options);
	};


	if (typeof define === 'function' && typeof define.amd === 'object' && define.amd) {

		// AMD. Register as an anonymous module.
		define(function() {
			return FastClick;
		});
	} else if (typeof module !== 'undefined' && module.exports) {
		module.exports = FastClick.attach;
		module.exports.FastClick = FastClick;
	} else {
		window.FastClick = FastClick;
	}
}());

/*! AdminLTE app.js
 * ================
 * Main JS application file for AdminLTE v2. This file
 * should be included in all pages. It controls some layout
 * options and implements exclusive AdminLTE plugins.
 *
 * @Author  Almsaeed Studio
 * @Support <http://www.almsaeedstudio.com>
 * @Email   <support@almsaeedstudio.com>
 * @version 2.3.3
 * @license MIT <http://opensource.org/licenses/MIT>
 */
function _init(){"use strict";$.AdminLTE.layout={activate:function(){var a=this;a.fix(),a.fixSidebar(),$(window,".wrapper").resize(function(){a.fix(),a.fixSidebar()})},fix:function(){var a=$(".main-header").outerHeight()+$(".main-footer").outerHeight(),b=$(window).height(),c=$(".sidebar").height();if($("body").hasClass("fixed"))$(".content-wrapper, .right-side").css("min-height",b-$(".main-footer").outerHeight());else{var d;b>=c?($(".content-wrapper, .right-side").css("min-height",b-a),d=b-a):($(".content-wrapper, .right-side").css("min-height",c),d=c);var e=$($.AdminLTE.options.controlSidebarOptions.selector);"undefined"!=typeof e&&e.height()>d&&$(".content-wrapper, .right-side").css("min-height",e.height())}},fixSidebar:function(){return $("body").hasClass("fixed")?("undefined"==typeof $.fn.slimScroll&&window.console&&window.console.error("Error: the fixed layout requires the slimscroll plugin!"),void($.AdminLTE.options.sidebarSlimScroll&&"undefined"!=typeof $.fn.slimScroll&&($(".sidebar").slimScroll({destroy:!0}).height("auto"),$(".sidebar").slimscroll({height:$(window).height()-$(".main-header").height()+"px",color:"rgba(0,0,0,0.2)",size:"3px"})))):void("undefined"!=typeof $.fn.slimScroll&&$(".sidebar").slimScroll({destroy:!0}).height("auto"))}},$.AdminLTE.pushMenu={activate:function(a){var b=$.AdminLTE.options.screenSizes;$(document).on("click",a,function(a){a.preventDefault(),$(window).width()>b.sm-1?$("body").hasClass("sidebar-collapse")?$("body").removeClass("sidebar-collapse").trigger("expanded.pushMenu"):$("body").addClass("sidebar-collapse").trigger("collapsed.pushMenu"):$("body").hasClass("sidebar-open")?$("body").removeClass("sidebar-open").removeClass("sidebar-collapse").trigger("collapsed.pushMenu"):$("body").addClass("sidebar-open").trigger("expanded.pushMenu")}),$(".content-wrapper").click(function(){$(window).width()<=b.sm-1&&$("body").hasClass("sidebar-open")&&$("body").removeClass("sidebar-open")}),($.AdminLTE.options.sidebarExpandOnHover||$("body").hasClass("fixed")&&$("body").hasClass("sidebar-mini"))&&this.expandOnHover()},expandOnHover:function(){var a=this,b=$.AdminLTE.options.screenSizes.sm-1;$(".main-sidebar").hover(function(){$("body").hasClass("sidebar-mini")&&$("body").hasClass("sidebar-collapse")&&$(window).width()>b&&a.expand()},function(){$("body").hasClass("sidebar-mini")&&$("body").hasClass("sidebar-expanded-on-hover")&&$(window).width()>b&&a.collapse()})},expand:function(){$("body").removeClass("sidebar-collapse").addClass("sidebar-expanded-on-hover")},collapse:function(){$("body").hasClass("sidebar-expanded-on-hover")&&$("body").removeClass("sidebar-expanded-on-hover").addClass("sidebar-collapse")}},$.AdminLTE.tree=function(a){var b=this,c=$.AdminLTE.options.animationSpeed;$(document).on("click",a+" li a",function(a){var d=$(this),e=d.next();if(e.is(".treeview-menu")&&e.is(":visible")&&!$("body").hasClass("sidebar-collapse"))e.slideUp(c,function(){e.removeClass("menu-open")}),e.parent("li").removeClass("active");else if(e.is(".treeview-menu")&&!e.is(":visible")){var f=d.parents("ul").first(),g=f.find("ul:visible").slideUp(c);g.removeClass("menu-open");var h=d.parent("li");e.slideDown(c,function(){e.addClass("menu-open"),f.find("li.active").removeClass("active"),h.addClass("active"),b.layout.fix()})}e.is(".treeview-menu")&&a.preventDefault()})},$.AdminLTE.controlSidebar={activate:function(){var a=this,b=$.AdminLTE.options.controlSidebarOptions,c=$(b.selector),d=$(b.toggleBtnSelector);d.on("click",function(d){d.preventDefault(),c.hasClass("control-sidebar-open")||$("body").hasClass("control-sidebar-open")?a.close(c,b.slide):a.open(c,b.slide)});var e=$(".control-sidebar-bg");a._fix(e),$("body").hasClass("fixed")?a._fixForFixed(c):$(".content-wrapper, .right-side").height()<c.height()&&a._fixForContent(c)},open:function(a,b){b?a.addClass("control-sidebar-open"):$("body").addClass("control-sidebar-open")},close:function(a,b){b?a.removeClass("control-sidebar-open"):$("body").removeClass("control-sidebar-open")},_fix:function(a){var b=this;$("body").hasClass("layout-boxed")?(a.css("position","absolute"),a.height($(".wrapper").height()),$(window).resize(function(){b._fix(a)})):a.css({position:"fixed",height:"auto"})},_fixForFixed:function(a){a.css({position:"fixed","max-height":"100%",overflow:"auto","padding-bottom":"50px"})},_fixForContent:function(a){$(".content-wrapper, .right-side").css("min-height",a.height())}},$.AdminLTE.boxWidget={selectors:$.AdminLTE.options.boxWidgetOptions.boxWidgetSelectors,icons:$.AdminLTE.options.boxWidgetOptions.boxWidgetIcons,animationSpeed:$.AdminLTE.options.animationSpeed,activate:function(a){var b=this;a||(a=document),$(a).on("click",b.selectors.collapse,function(a){a.preventDefault(),b.collapse($(this))}),$(a).on("click",b.selectors.remove,function(a){a.preventDefault(),b.remove($(this))})},collapse:function(a){var b=this,c=a.parents(".box").first(),d=c.find("> .box-body, > .box-footer, > form  >.box-body, > form > .box-footer");c.hasClass("collapsed-box")?(a.children(":first").removeClass(b.icons.open).addClass(b.icons.collapse),d.slideDown(b.animationSpeed,function(){c.removeClass("collapsed-box")})):(a.children(":first").removeClass(b.icons.collapse).addClass(b.icons.open),d.slideUp(b.animationSpeed,function(){c.addClass("collapsed-box")}))},remove:function(a){var b=a.parents(".box").first();b.slideUp(this.animationSpeed)}}}if("undefined"==typeof jQuery)throw new Error("AdminLTE requires jQuery");$.AdminLTE={},$.AdminLTE.options={navbarMenuSlimscroll:!0,navbarMenuSlimscrollWidth:"3px",navbarMenuHeight:"200px",animationSpeed:500,sidebarToggleSelector:"[data-toggle='offcanvas']",sidebarPushMenu:!0,sidebarSlimScroll:!0,sidebarExpandOnHover:!1,enableBoxRefresh:!0,enableBSToppltip:!0,BSTooltipSelector:"[data-toggle='tooltip']",enableFastclick:!0,enableControlSidebar:!0,controlSidebarOptions:{toggleBtnSelector:"[data-toggle='control-sidebar']",selector:".control-sidebar",slide:!0},enableBoxWidget:!0,boxWidgetOptions:{boxWidgetIcons:{collapse:"fa-minus",open:"fa-plus",remove:"fa-times"},boxWidgetSelectors:{remove:'[data-widget="remove"]',collapse:'[data-widget="collapse"]'}},directChat:{enable:!0,contactToggleSelector:'[data-widget="chat-pane-toggle"]'},colors:{lightBlue:"#3c8dbc",red:"#f56954",green:"#00a65a",aqua:"#00c0ef",yellow:"#f39c12",blue:"#0073b7",navy:"#001F3F",teal:"#39CCCC",olive:"#3D9970",lime:"#01FF70",orange:"#FF851B",fuchsia:"#F012BE",purple:"#8E24AA",maroon:"#D81B60",black:"#222222",gray:"#d2d6de"},screenSizes:{xs:480,sm:768,md:992,lg:1200}},$(function(){"use strict";$("body").removeClass("hold-transition"),"undefined"!=typeof AdminLTEOptions&&$.extend(!0,$.AdminLTE.options,AdminLTEOptions);var a=$.AdminLTE.options;_init(),$.AdminLTE.layout.activate(),$.AdminLTE.tree(".sidebar"),a.enableControlSidebar&&$.AdminLTE.controlSidebar.activate(),a.navbarMenuSlimscroll&&"undefined"!=typeof $.fn.slimscroll&&$(".navbar .menu").slimscroll({height:a.navbarMenuHeight,alwaysVisible:!1,size:a.navbarMenuSlimscrollWidth}).css("width","100%"),a.sidebarPushMenu&&$.AdminLTE.pushMenu.activate(a.sidebarToggleSelector),a.enableBSToppltip&&$("body").tooltip({selector:a.BSTooltipSelector}),a.enableBoxWidget&&$.AdminLTE.boxWidget.activate(),a.enableFastclick&&"undefined"!=typeof FastClick&&FastClick.attach(document.body),a.directChat.enable&&$(document).on("click",a.directChat.contactToggleSelector,function(){var a=$(this).parents(".direct-chat").first();a.toggleClass("direct-chat-contacts-open")}),$('.btn-group[data-toggle="btn-toggle"]').each(function(){var a=$(this);$(this).find(".btn").on("click",function(b){a.find(".btn.active").removeClass("active"),$(this).addClass("active"),b.preventDefault()})})}),function(a){"use strict";a.fn.boxRefresh=function(b){function c(a){a.append(f),e.onLoadStart.call(a)}function d(a){a.find(f).remove(),e.onLoadDone.call(a)}var e=a.extend({trigger:".refresh-btn",source:"",onLoadStart:function(a){return a},onLoadDone:function(a){return a}},b),f=a('<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>');return this.each(function(){if(""===e.source)return void(window.console&&window.console.log("Please specify a source first - boxRefresh()"));var b=a(this),f=b.find(e.trigger).first();f.on("click",function(a){a.preventDefault(),c(b),b.find(".box-body").load(e.source,function(){d(b)})})})}}(jQuery),function(a){"use strict";a.fn.activateBox=function(){a.AdminLTE.boxWidget.activate(this)},a.fn.toggleBox=function(){var b=a(a.AdminLTE.boxWidget.selectors.collapse,this);a.AdminLTE.boxWidget.collapse(b)},a.fn.removeBox=function(){var b=a(a.AdminLTE.boxWidget.selectors.remove,this);a.AdminLTE.boxWidget.remove(b)}}(jQuery),function(a){"use strict";a.fn.todolist=function(b){var c=a.extend({onCheck:function(a){return a},onUncheck:function(a){return a}},b);return this.each(function(){"undefined"!=typeof a.fn.iCheck?(a("input",this).on("ifChecked",function(){var b=a(this).parents("li").first();b.toggleClass("done"),c.onCheck.call(b)}),a("input",this).on("ifUnchecked",function(){var b=a(this).parents("li").first();b.toggleClass("done"),c.onUncheck.call(b)})):a("input",this).on("change",function(){var b=a(this).parents("li").first();b.toggleClass("done"),a("input",b).is(":checked")?c.onCheck.call(b):c.onUncheck.call(b)})})}}(jQuery);
/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */
(function ($, AdminLTE) {

  "use strict";

  /**
   * List of all the available skins
   *
   * @type Array
   */
  var my_skins = [
    "skin-blue",
    "skin-black",
    "skin-red",
    "skin-yellow",
    "skin-purple",
    "skin-green",
    "skin-blue-light",
    "skin-black-light",
    "skin-red-light",
    "skin-yellow-light",
    "skin-purple-light",
    "skin-green-light"
  ];

  //Create the new tab
  var tab_pane = $("<div />", {
    "id": "control-sidebar-theme-demo-options-tab",
    "class": "tab-pane active"
  });

  //Create the tab button
  var tab_button = $("<li />", {"class": "active"})
      .html("<a href='#control-sidebar-theme-demo-options-tab' data-toggle='tab'>"
      + "<i class='fa fa-wrench'></i>"
      + "</a>");

  //Add the tab button to the right sidebar tabs
  $("[href='#control-sidebar-home-tab']")
      .parent()
      .before(tab_button);

  //Create the menu
  var demo_settings = $("<div />");

  //Layout options
  demo_settings.append(
      "<h4 class='control-sidebar-heading'>"
      + "Layout Options"
      + "</h4>"
        //Fixed layout
      + "<div class='form-group'>"
      + "<label class='control-sidebar-subheading'>"
      + "<input type='checkbox' data-layout='fixed' class='pull-right'/> "
      + "Fixed layout"
      + "</label>"
      + "<p>Activate the fixed layout. You can't use fixed and boxed layouts together</p>"
      + "</div>"
        //Boxed layout
      + "<div class='form-group'>"
      + "<label class='control-sidebar-subheading'>"
      + "<input type='checkbox' data-layout='layout-boxed'class='pull-right'/> "
      + "Boxed Layout"
      + "</label>"
      + "<p>Activate the boxed layout</p>"
      + "</div>"
        //Sidebar Toggle
      + "<div class='form-group'>"
      + "<label class='control-sidebar-subheading'>"
      + "<input type='checkbox' data-layout='sidebar-collapse' class='pull-right'/> "
      + "Toggle Sidebar"
      + "</label>"
      + "<p>Toggle the left sidebar's state (open or collapse)</p>"
      + "</div>"
        //Sidebar mini expand on hover toggle
      + "<div class='form-group'>"
      + "<label class='control-sidebar-subheading'>"
      + "<input type='checkbox' data-enable='expandOnHover' class='pull-right'/> "
      + "Sidebar Expand on Hover"
      + "</label>"
      + "<p>Let the sidebar mini expand on hover</p>"
      + "</div>"
        //Control Sidebar Toggle
      + "<div class='form-group'>"
      + "<label class='control-sidebar-subheading'>"
      + "<input type='checkbox' data-controlsidebar='control-sidebar-open' class='pull-right'/> "
      + "Toggle Right Sidebar Slide"
      + "</label>"
      + "<p>Toggle between slide over content and push content effects</p>"
      + "</div>"
        //Control Sidebar Skin Toggle
      + "<div class='form-group'>"
      + "<label class='control-sidebar-subheading'>"
      + "<input type='checkbox' data-sidebarskin='toggle' class='pull-right'/> "
      + "Toggle Right Sidebar Skin"
      + "</label>"
      + "<p>Toggle between dark and light skins for the right sidebar</p>"
      + "</div>"
  );
  var skins_list = $("<ul />", {"class": 'list-unstyled clearfix'});

  //Dark sidebar skins
  var skin_blue =
      $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
          .append("<a href='javascript:void(0);' data-skin='skin-blue' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
          + "<div><span style='display:block; width: 20%; float: left; height: 7px; background: #367fa9;'></span><span class='bg-light-blue' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
          + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
          + "</a>"
          + "<p class='text-center no-margin'>Blue</p>");
  skins_list.append(skin_blue);
  var skin_black =
      $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
          .append("<a href='javascript:void(0);' data-skin='skin-black' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
          + "<div style='box-shadow: 0 0 2px rgba(0,0,0,0.1)' class='clearfix'><span style='display:block; width: 20%; float: left; height: 7px; background: #fefefe;'></span><span style='display:block; width: 80%; float: left; height: 7px; background: #fefefe;'></span></div>"
          + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #222;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
          + "</a>"
          + "<p class='text-center no-margin'>Black</p>");
  skins_list.append(skin_black);
  var skin_purple =
      $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
          .append("<a href='javascript:void(0);' data-skin='skin-purple' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
          + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-purple-active'></span><span class='bg-purple' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
          + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
          + "</a>"
          + "<p class='text-center no-margin'>Purple</p>");
  skins_list.append(skin_purple);
  var skin_green =
      $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
          .append("<a href='javascript:void(0);' data-skin='skin-green' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
          + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-green-active'></span><span class='bg-green' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
          + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
          + "</a>"
          + "<p class='text-center no-margin'>Green</p>");
  skins_list.append(skin_green);
  var skin_red =
      $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
          .append("<a href='javascript:void(0);' data-skin='skin-red' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
          + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-red-active'></span><span class='bg-red' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
          + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
          + "</a>"
          + "<p class='text-center no-margin'>Red</p>");
  skins_list.append(skin_red);
  var skin_yellow =
      $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
          .append("<a href='javascript:void(0);' data-skin='skin-yellow' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
          + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-yellow-active'></span><span class='bg-yellow' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
          + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
          + "</a>"
          + "<p class='text-center no-margin'>Yellow</p>");
  skins_list.append(skin_yellow);

  //Light sidebar skins
  var skin_blue_light =
      $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
          .append("<a href='javascript:void(0);' data-skin='skin-blue-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
          + "<div><span style='display:block; width: 20%; float: left; height: 7px; background: #367fa9;'></span><span class='bg-light-blue' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
          + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
          + "</a>"
          + "<p class='text-center no-margin' style='font-size: 12px'>Blue Light</p>");
  skins_list.append(skin_blue_light);
  var skin_black_light =
      $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
          .append("<a href='javascript:void(0);' data-skin='skin-black-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
          + "<div style='box-shadow: 0 0 2px rgba(0,0,0,0.1)' class='clearfix'><span style='display:block; width: 20%; float: left; height: 7px; background: #fefefe;'></span><span style='display:block; width: 80%; float: left; height: 7px; background: #fefefe;'></span></div>"
          + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
          + "</a>"
          + "<p class='text-center no-margin' style='font-size: 12px'>Black Light</p>");
  skins_list.append(skin_black_light);
  var skin_purple_light =
      $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
          .append("<a href='javascript:void(0);' data-skin='skin-purple-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
          + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-purple-active'></span><span class='bg-purple' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
          + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
          + "</a>"
          + "<p class='text-center no-margin' style='font-size: 12px'>Purple Light</p>");
  skins_list.append(skin_purple_light);
  var skin_green_light =
      $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
          .append("<a href='javascript:void(0);' data-skin='skin-green-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
          + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-green-active'></span><span class='bg-green' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
          + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
          + "</a>"
          + "<p class='text-center no-margin' style='font-size: 12px'>Green Light</p>");
  skins_list.append(skin_green_light);
  var skin_red_light =
      $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
          .append("<a href='javascript:void(0);' data-skin='skin-red-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
          + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-red-active'></span><span class='bg-red' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
          + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
          + "</a>"
          + "<p class='text-center no-margin' style='font-size: 12px'>Red Light</p>");
  skins_list.append(skin_red_light);
  var skin_yellow_light =
      $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
          .append("<a href='javascript:void(0);' data-skin='skin-yellow-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
          + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-yellow-active'></span><span class='bg-yellow' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
          + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
          + "</a>"
          + "<p class='text-center no-margin' style='font-size: 12px;'>Yellow Light</p>");
  skins_list.append(skin_yellow_light);

  demo_settings.append("<h4 class='control-sidebar-heading'>Skins</h4>");
  demo_settings.append(skins_list);

  tab_pane.append(demo_settings);
  $("#control-sidebar-home-tab").after(tab_pane);

  setup();

  /**
   * Toggles layout classes
   *
   * @param String cls the layout class to toggle
   * @returns void
   */
  function change_layout(cls) {
    $("body").toggleClass(cls);
    AdminLTE.layout.fixSidebar();
    //Fix the problem with right sidebar and layout boxed
    if (cls == "layout-boxed")
      AdminLTE.controlSidebar._fix($(".control-sidebar-bg"));
    if ($('body').hasClass('fixed') && cls == 'fixed') {
      AdminLTE.pushMenu.expandOnHover();
      AdminLTE.layout.activate();
    }
    AdminLTE.controlSidebar._fix($(".control-sidebar-bg"));
    AdminLTE.controlSidebar._fix($(".control-sidebar"));
  }

  /**
   * Replaces the old skin with the new skin
   * @param String cls the new skin class
   * @returns Boolean false to prevent link's default action
   */
  function change_skin(cls) {
    $.each(my_skins, function (i) {
      $("body").removeClass(my_skins[i]);
    });

    $("body").addClass(cls);
    store('skin', cls);
    return false;
  }

  /**
   * Store a new settings in the browser
   *
   * @param String name Name of the setting
   * @param String val Value of the setting
   * @returns void
   */
  function store(name, val) {
    if (typeof (Storage) !== "undefined") {
      localStorage.setItem(name, val);
    } else {
      window.alert('Please use a modern browser to properly view this template!');
    }
  }

  /**
   * Get a prestored setting
   *
   * @param String name Name of of the setting
   * @returns String The value of the setting | null
   */
  function get(name) {
    if (typeof (Storage) !== "undefined") {
      return localStorage.getItem(name);
    } else {
      window.alert('Please use a modern browser to properly view this template!');
    }
  }

  /**
   * Retrieve default settings and apply them to the template
   *
   * @returns void
   */
  function setup() {
    var tmp = get('skin');
    if (tmp && $.inArray(tmp, my_skins))
      change_skin(tmp);

    //Add the change skin listener
    $("[data-skin]").on('click', function (e) {
      e.preventDefault();
      change_skin($(this).data('skin'));
    });

    //Add the layout manager
    $("[data-layout]").on('click', function () {
      change_layout($(this).data('layout'));
    });

    $("[data-controlsidebar]").on('click', function () {
      change_layout($(this).data('controlsidebar'));
      var slide = !AdminLTE.options.controlSidebarOptions.slide;
      AdminLTE.options.controlSidebarOptions.slide = slide;
      if (!slide)
        $('.control-sidebar').removeClass('control-sidebar-open');
    });

    $("[data-sidebarskin='toggle']").on('click', function () {
      var sidebar = $(".control-sidebar");
      if (sidebar.hasClass("control-sidebar-dark")) {
        sidebar.removeClass("control-sidebar-dark")
        sidebar.addClass("control-sidebar-light")
      } else {
        sidebar.removeClass("control-sidebar-light")
        sidebar.addClass("control-sidebar-dark")
      }
    });

    $("[data-enable='expandOnHover']").on('click', function () {
      $(this).attr('disabled', true);
      AdminLTE.pushMenu.expandOnHover();
      if (!$('body').hasClass('sidebar-collapse'))
        $("[data-layout='sidebar-collapse']").click();
    });

    // Reset options
    if ($('body').hasClass('fixed')) {
      $("[data-layout='fixed']").attr('checked', 'checked');
    }
    if ($('body').hasClass('layout-boxed')) {
      $("[data-layout='layout-boxed']").attr('checked', 'checked');
    }
    if ($('body').hasClass('sidebar-collapse')) {
      $("[data-layout='sidebar-collapse']").attr('checked', 'checked');
    }

  }
})(jQuery, $.AdminLTE);

/*! iCheck v1.0.1 by Damir Sultanov, http://git.io/arlzeA, MIT Licensed */
(function(h){function F(a,b,d){var c=a[0],e=/er/.test(d)?m:/bl/.test(d)?s:l,f=d==H?{checked:c[l],disabled:c[s],indeterminate:"true"==a.attr(m)||"false"==a.attr(w)}:c[e];if(/^(ch|di|in)/.test(d)&&!f)D(a,e);else if(/^(un|en|de)/.test(d)&&f)t(a,e);else if(d==H)for(e in f)f[e]?D(a,e,!0):t(a,e,!0);else if(!b||"toggle"==d){if(!b)a[p]("ifClicked");f?c[n]!==u&&t(a,e):D(a,e)}}function D(a,b,d){var c=a[0],e=a.parent(),f=b==l,A=b==m,B=b==s,K=A?w:f?E:"enabled",p=k(a,K+x(c[n])),N=k(a,b+x(c[n]));if(!0!==c[b]){if(!d&&
b==l&&c[n]==u&&c.name){var C=a.closest("form"),r='input[name="'+c.name+'"]',r=C.length?C.find(r):h(r);r.each(function(){this!==c&&h(this).data(q)&&t(h(this),b)})}A?(c[b]=!0,c[l]&&t(a,l,"force")):(d||(c[b]=!0),f&&c[m]&&t(a,m,!1));L(a,f,b,d)}c[s]&&k(a,y,!0)&&e.find("."+I).css(y,"default");e[v](N||k(a,b)||"");B?e.attr("aria-disabled","true"):e.attr("aria-checked",A?"mixed":"true");e[z](p||k(a,K)||"")}function t(a,b,d){var c=a[0],e=a.parent(),f=b==l,h=b==m,q=b==s,p=h?w:f?E:"enabled",t=k(a,p+x(c[n])),
u=k(a,b+x(c[n]));if(!1!==c[b]){if(h||!d||"force"==d)c[b]=!1;L(a,f,p,d)}!c[s]&&k(a,y,!0)&&e.find("."+I).css(y,"pointer");e[z](u||k(a,b)||"");q?e.attr("aria-disabled","false"):e.attr("aria-checked","false");e[v](t||k(a,p)||"")}function M(a,b){if(a.data(q)){a.parent().html(a.attr("style",a.data(q).s||""));if(b)a[p](b);a.off(".i").unwrap();h(G+'[for="'+a[0].id+'"]').add(a.closest(G)).off(".i")}}function k(a,b,d){if(a.data(q))return a.data(q).o[b+(d?"":"Class")]}function x(a){return a.charAt(0).toUpperCase()+
a.slice(1)}function L(a,b,d,c){if(!c){if(b)a[p]("ifToggled");a[p]("ifChanged")[p]("if"+x(d))}}var q="iCheck",I=q+"-helper",u="radio",l="checked",E="un"+l,s="disabled",w="determinate",m="in"+w,H="update",n="type",v="addClass",z="removeClass",p="trigger",G="label",y="cursor",J=/ipad|iphone|ipod|android|blackberry|windows phone|opera mini|silk/i.test(navigator.userAgent);h.fn[q]=function(a,b){var d='input[type="checkbox"], input[type="'+u+'"]',c=h(),e=function(a){a.each(function(){var a=h(this);c=a.is(d)?
c.add(a):c.add(a.find(d))})};if(/^(check|uncheck|toggle|indeterminate|determinate|disable|enable|update|destroy)$/i.test(a))return a=a.toLowerCase(),e(this),c.each(function(){var c=h(this);"destroy"==a?M(c,"ifDestroyed"):F(c,!0,a);h.isFunction(b)&&b()});if("object"!=typeof a&&a)return this;var f=h.extend({checkedClass:l,disabledClass:s,indeterminateClass:m,labelHover:!0,aria:!1},a),k=f.handle,B=f.hoverClass||"hover",x=f.focusClass||"focus",w=f.activeClass||"active",y=!!f.labelHover,C=f.labelHoverClass||
"hover",r=(""+f.increaseArea).replace("%","")|0;if("checkbox"==k||k==u)d='input[type="'+k+'"]';-50>r&&(r=-50);e(this);return c.each(function(){var a=h(this);M(a);var c=this,b=c.id,e=-r+"%",d=100+2*r+"%",d={position:"absolute",top:e,left:e,display:"block",width:d,height:d,margin:0,padding:0,background:"#fff",border:0,opacity:0},e=J?{position:"absolute",visibility:"hidden"}:r?d:{position:"absolute",opacity:0},k="checkbox"==c[n]?f.checkboxClass||"icheckbox":f.radioClass||"i"+u,m=h(G+'[for="'+b+'"]').add(a.closest(G)),
A=!!f.aria,E=q+"-"+Math.random().toString(36).replace("0.",""),g='<div class="'+k+'" '+(A?'role="'+c[n]+'" ':"");m.length&&A&&m.each(function(){g+='aria-labelledby="';this.id?g+=this.id:(this.id=E,g+=E);g+='"'});g=a.wrap(g+"/>")[p]("ifCreated").parent().append(f.insert);d=h('<ins class="'+I+'"/>').css(d).appendTo(g);a.data(q,{o:f,s:a.attr("style")}).css(e);f.inheritClass&&g[v](c.className||"");f.inheritID&&b&&g.attr("id",q+"-"+b);"static"==g.css("position")&&g.css("position","relative");F(a,!0,H);
if(m.length)m.on("click.i mouseover.i mouseout.i touchbegin.i touchend.i",function(b){var d=b[n],e=h(this);if(!c[s]){if("click"==d){if(h(b.target).is("a"))return;F(a,!1,!0)}else y&&(/ut|nd/.test(d)?(g[z](B),e[z](C)):(g[v](B),e[v](C)));if(J)b.stopPropagation();else return!1}});a.on("click.i focus.i blur.i keyup.i keydown.i keypress.i",function(b){var d=b[n];b=b.keyCode;if("click"==d)return!1;if("keydown"==d&&32==b)return c[n]==u&&c[l]||(c[l]?t(a,l):D(a,l)),!1;if("keyup"==d&&c[n]==u)!c[l]&&D(a,l);else if(/us|ur/.test(d))g["blur"==
d?z:v](x)});d.on("click mousedown mouseup mouseover mouseout touchbegin.i touchend.i",function(b){var d=b[n],e=/wn|up/.test(d)?w:B;if(!c[s]){if("click"==d)F(a,!1,!0);else{if(/wn|er|in/.test(d))g[v](e);else g[z](e+" "+w);if(m.length&&y&&e==B)m[/ut|nd/.test(d)?z:v](C)}if(J)b.stopPropagation();else return!1}})})}})(window.jQuery||window.Zepto);

//# sourceMappingURL=allVendor.js.map
