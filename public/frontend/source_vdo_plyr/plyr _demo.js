"document"in self&&("classList"in document.createElement("_")?!function(){"use strict";var e=document.createElement("_");if(e.classList.add("c1","c2"),!e.classList.contains("c2")){var t=function(e){var t=DOMTokenList.prototype[e];DOMTokenList.prototype[e]=function(e){var i,o=arguments.length;for(i=0;o>i;i++)e=arguments[i],t.call(this,e)}};t("add"),t("remove")}if(e.classList.toggle("c3",!1),e.classList.contains("c3")){var i=DOMTokenList.prototype.toggle;DOMTokenList.prototype.toggle=function(e,t){return 1 in arguments&&!this.contains(e)==!t?t:i.call(this,e)}}e=null}():!function(e){"use strict";if("Element"in e){var t="classList",i="prototype",o=e.Element[i],n=Object,s=String[i].trim||function(){return this.replace(/^\s+|\s+$/g,"")},r=Array[i].indexOf||function(e){for(var t=0,i=this.length;i>t;t++)if(t in this&&this[t]===e)return t;return-1},a=function(e,t){this.name=e,this.code=DOMException[e],this.message=t},c=function(e,t){if(""===t)throw new a("SYNTAX_ERR","An invalid or illegal string was specified");if(/\s/.test(t))throw new a("INVALID_CHARACTER_ERR","String contains an invalid character");return r.call(e,t)},l=function(e){for(var t=s.call(e.getAttribute("class")||""),i=t?t.split(/\s+/):[],o=0,n=i.length;n>o;o++)this.push(i[o]);this._updateClassName=function(){e.setAttribute("class",this.toString())}},u=l[i]=[],d=function(){return new l(this)};if(a[i]=Error[i],u.item=function(e){return this[e]||null},u.contains=function(e){return e+="",-1!==c(this,e)},u.add=function(){var e,t=arguments,i=0,o=t.length,n=!1;do e=t[i]+"",-1===c(this,e)&&(this.push(e),n=!0);while(++i<o);n&&this._updateClassName()},u.remove=function(){var e,t,i=arguments,o=0,n=i.length,s=!1;do for(e=i[o]+"",t=c(this,e);-1!==t;)this.splice(t,1),s=!0,t=c(this,e);while(++o<n);s&&this._updateClassName()},u.toggle=function(e,t){e+="";var i=this.contains(e),o=i?t!==!0&&"remove":t!==!1&&"add";return o&&this[o](e),t===!0||t===!1?t:!i},u.toString=function(){return this.join(" ")},n.defineProperty){var p={get:d,enumerable:!0,configurable:!0};try{n.defineProperty(o,t,p)}catch(h){-2146823252===h.number&&(p.enumerable=!1,n.defineProperty(o,t,p))}}else n[i].__defineGetter__&&o.__defineGetter__(t,d)}}(self)),function(){function e(e,t,i){if(e)if(e.classList)e.classList[i?"add":"remove"](t);else{var o=(" "+e.className+" ").replace(/\s+/g," ").replace(" "+t+" ","");e.className=o+(i?" "+t:"")}}function t(t,i){if(t in s&&(i||t!=r)&&(r.length||t!=s.video)){switch(t){case s.video:o.source({type:"video",title:"View From A Blue Moon",sources:[{src:"https://cdn.selz.com/plyr/1.5/View_From_A_Blue_Moon_Trailer-HD.mp4",type:"video/mp4"},{src:"https://cdn.selz.com/plyr/1.5/View_From_A_Blue_Moon_Trailer-HD.webm",type:"video/webm"}],poster:"https://cdn.selz.com/plyr/1.5/View_From_A_Blue_Moon_Trailer-HD.jpg",tracks:[{kind:"captions",label:"English",srclang:"en",src:"https://cdn.selz.com/plyr/1.5/View_From_A_Blue_Moon_Trailer-HD.en.vtt","default":!0}]});break;case s.audio:o.source({type:"audio",title:"Kishi Bashi &ndash; &ldquo;It All Began With A Burst&rdquo;",sources:[{src:"https://cdn.selz.com/plyr/1.5/Kishi_Bashi_-_It_All_Began_With_a_Burst.mp3",type:"audio/mp3"},{src:"https://cdn.selz.com/plyr/1.5/Kishi_Bashi_-_It_All_Began_With_a_Burst.ogg",type:"audio/ogg"}]});break;case s.youtube:o.source({type:"video",title:"View From A Blue Moon",sources:[{src:"bTqVqk7FSmY",type:"youtube"}]});break;case s.vimeo:o.source({type:"video",title:"View From A Blue Moon",sources:[{src:"143418951",type:"vimeo"}]})}r=t;for(var a=n.length-1;a>=0;a--)e(n[a].parentElement,"active",!1);e(document.querySelector('[data-source="'+t+'"]').parentElement,"active",!0)}}document.body.addEventListener("ready",function(e){console.log(e)});var i=plyr.setup({debug:!0,title:"Video demo",iconUrl:"https://cdn.plyr.io/1.8.8/plyr.svg",tooltips:{controls:!0},captions:{defaultActive:!0}});plyr.loadSprite("../source_vdo_plyr/dist/demo.svg");for(var o=i[0].plyr,n=document.querySelectorAll("[data-source]"),s={video:"video",audio:"audio",youtube:"youtube",vimeo:"vimeo"},r=window.location.hash.replace("#",""),a=window.history&&window.history.pushState,c=n.length-1;c>=0;c--)n[c].addEventListener("click",function(){var e=this.getAttribute("data-source");t(e),a&&history.pushState({type:e},"","#"+e)});if(window.addEventListener("popstate",function(e){e.state&&"type"in e.state&&t(e.state.type)}),a){var l=!r.length;l&&(r=s.video),r in s&&history.replaceState({type:r},"",l?"":"#"+r),r!==s.video&&t(r,!0)}}(),document.domain.indexOf("plyr.io")>-1&&(!function(e,t,i,o,n,s,r){e.GoogleAnalyticsObject=n,e[n]=e[n]||function(){(e[n].q=e[n].q||[]).push(arguments)},e[n].l=1*new Date,s=t.createElement(i),r=t.getElementsByTagName(i)[0],s.async=1,s.src=o,r.parentNode.insertBefore(s,r)}(window,document,"script","//www.google-analytics.com/analytics.js","ga"),ga("create","UA-40881672-11","auto"),ga("send","pageview"));
