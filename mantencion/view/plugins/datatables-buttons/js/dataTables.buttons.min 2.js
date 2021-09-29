/*!
 Buttons for DataTables 1.6.5
 ©2016-2020 SpryMedia Ltd - datatables.net/license
*/
(function(e){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(q){return e(q,window,document)}):"object"===typeof exports?module.exports=function(q,r){q||(q=window);if(!r||!r.fn.dataTable)r=require("datatables.net")(q,r).$;return e(r,q,q.document)}:e(jQuery,window,document)})(function(e,q,r,m){function w(a,b,c){e.fn.animate?a.stop().fadeIn(b,c):(a.css("display","block"),c&&c.call(a))}function x(a,b,c){e.fn.animate?a.stop().fadeOut(b,c):(a.css("display","none"),c&&
c.call(a))}function z(a,b){var c=new i.Api(a),d=b?b:c.init().buttons||i.defaults.buttons;return(new p(c,d)).container()}var i=e.fn.dataTable,C=0,D=0,l=i.ext.buttons,p=function(a,b){if(!(this instanceof p))return function(b){return(new p(b,a)).container()};"undefined"===typeof b&&(b={});!0===b&&(b={});Array.isArray(b)&&(b={buttons:b});this.c=e.extend(!0,{},p.defaults,b);b.buttons&&(this.c.buttons=b.buttons);this.s={dt:new i.Api(a),buttons:[],listenKeys:"",namespace:"dtb"+C++};this.dom={container:e("<"+
this.c.dom.container.tag+"/>").addClass(this.c.dom.container.className)};this._constructor()};e.extend(p.prototype,{action:function(a,b){var c=this._nodeToButton(a);if(b===m)return c.conf.action;c.conf.action=b;return this},active:function(a,b){var c=this._nodeToButton(a),d=this.c.dom.button.active,c=e(c.node);if(b===m)return c.hasClass(d);c.toggleClass(d,b===m?!0:b);return this},add:function(a,b){var c=this.s.buttons;if("string"===typeof b){for(var d=b.split("-"),e=this.s,c=0,f=d.length-1;c<f;c++)e=
e.buttons[1*d[c]];c=e.buttons;b=1*d[d.length-1]}this._expandButton(c,a,e!==m,b);this._draw();return this},container:function(){return this.dom.container},disable:function(a){a=this._nodeToButton(a);e(a.node).addClass(this.c.dom.button.disabled).attr("disabled",!0);return this},destroy:function(){e("body").off("keyup."+this.s.namespace);var a=this.s.buttons.slice(),b,c;b=0;for(c=a.length;b<c;b++)this.remove(a[b].node);this.dom.container.remove();a=this.s.dt.settings()[0];b=0;for(c=a.length;b<c;b++)if(a.inst===
this){a.splice(b,1);break}return this},enable:function(a,b){if(!1===b)return this.disable(a);var c=this._nodeToButton(a);e(c.node).removeClass(this.c.dom.button.disabled).removeAttr("disabled");return this},name:function(){return this.c.name},node:function(a){if(!a)return this.dom.container;a=this._nodeToButton(a);return e(a.node)},processing:function(a,b){var c=this.s.dt,d=this._nodeToButton(a);if(b===m)return e(d.node).hasClass("processing");e(d.node).toggleClass("processing",b);e(c.table().node()).triggerHandler("buttons-processing.dt",
[b,c.button(a),c,e(a),d.conf]);return this},remove:function(a){var b=this._nodeToButton(a),c=this._nodeToHost(a),d=this.s.dt;if(b.buttons.length)for(var g=b.buttons.length-1;0<=g;g--)this.remove(b.buttons[g].node);b.conf.destroy&&b.conf.destroy.call(d.button(a),d,e(a),b.conf);this._removeKey(b.conf);e(b.node).remove();a=e.inArray(b,c);c.splice(a,1);return this},text:function(a,b){var c=this._nodeToButton(a),d=this.c.dom.collection.buttonLiner,d=c.inCollection&&d&&d.tag?d.tag:this.c.dom.buttonLiner.tag,
g=this.s.dt,f=e(c.node),h=function(a){return"function"===typeof a?a(g,f,c.conf):a};if(b===m)return h(c.conf.text);c.conf.text=b;d?f.children(d).html(h(b)):f.html(h(b));return this},_constructor:function(){var a=this,b=this.s.dt,c=b.settings()[0],d=this.c.buttons;c._buttons||(c._buttons=[]);c._buttons.push({inst:this,name:this.c.name});for(var g=0,f=d.length;g<f;g++)this.add(d[g]);b.on("destroy",function(b,d){d===c&&a.destroy()});e("body").on("keyup."+this.s.namespace,function(b){if(!r.activeElement||
r.activeElement===r.body){var c=String.fromCharCode(b.keyCode).toLowerCase();a.s.listenKeys.toLowerCase().indexOf(c)!==-1&&a._keypress(c,b)}})},_addKey:function(a){a.key&&(this.s.listenKeys+=e.isPlainObject(a.key)?a.key.key:a.key)},_draw:function(a,b){a||(a=this.dom.container,b=this.s.buttons);a.children().detach();for(var c=0,d=b.length;c<d;c++)a.append(b[c].inserter),a.append(" "),b[c].buttons&&b[c].buttons.length&&this._draw(b[c].collection,b[c].buttons)},_expandButton:function(a,b,c,d){for(var g=
this.s.dt,f=0,b=!Array.isArray(b)?[b]:b,h=0,k=b.length;h<k;h++){var n=this._resolveExtends(b[h]);if(n)if(Array.isArray(n))this._expandButton(a,n,c,d);else{var j=this._buildButton(n,c);j&&(d!==m&&null!==d?(a.splice(d,0,j),d++):a.push(j),j.conf.buttons&&(j.collection=e("<"+this.c.dom.collection.tag+"/>"),j.conf._collection=j.collection,this._expandButton(j.buttons,j.conf.buttons,!0,d)),n.init&&n.init.call(g.button(j.node),g,e(j.node),n),f++)}}},_buildButton:function(a,b){var c=this.c.dom.button,d=this.c.dom.buttonLiner,
g=this.c.dom.collection,f=this.s.dt,h=function(b){return"function"===typeof b?b(f,j,a):b};b&&g.button&&(c=g.button);b&&g.buttonLiner&&(d=g.buttonLiner);if(a.available&&!a.available(f,a))return!1;var k=function(a,b,c,d){d.action.call(b.button(c),a,b,c,d);e(b.table().node()).triggerHandler("buttons-action.dt",[b.button(c),b,c,d])},g=a.tag||c.tag,n=a.clickBlurs===m?!0:a.clickBlurs,j=e("<"+g+"/>").addClass(c.className).attr("tabindex",this.s.dt.settings()[0].iTabIndex).attr("aria-controls",this.s.dt.table().node().id).on("click.dtb",
function(b){b.preventDefault();!j.hasClass(c.disabled)&&a.action&&k(b,f,j,a);n&&j.trigger("blur")}).on("keyup.dtb",function(b){b.keyCode===13&&!j.hasClass(c.disabled)&&a.action&&k(b,f,j,a)});"a"===g.toLowerCase()&&j.attr("href","#");"button"===g.toLowerCase()&&j.attr("type","button");d.tag?(g=e("<"+d.tag+"/>").html(h(a.text)).addClass(d.className),"a"===d.tag.toLowerCase()&&g.attr("href","#"),j.append(g)):j.html(h(a.text));!1===a.enabled&&j.addClass(c.disabled);a.className&&j.addClass(a.className);
a.titleAttr&&j.attr("title",h(a.titleAttr));a.attr&&j.attr(a.attr);a.namespace||(a.namespace=".dt-button-"+D++);d=(d=this.c.dom.buttonContainer)&&d.tag?e("<"+d.tag+"/>").addClass(d.className).append(j):j;this._addKey(a);this.c.buttonCreated&&(d=this.c.buttonCreated(a,d));return{conf:a,node:j.get(0),inserter:d,buttons:[],inCollection:b,collection:null}},_nodeToButton:function(a,b){b||(b=this.s.buttons);for(var c=0,d=b.length;c<d;c++){if(b[c].node===a)return b[c];if(b[c].buttons.length){var e=this._nodeToButton(a,
b[c].buttons);if(e)return e}}},_nodeToHost:function(a,b){b||(b=this.s.buttons);for(var c=0,d=b.length;c<d;c++){if(b[c].node===a)return b;if(b[c].buttons.length){var e=this._nodeToHost(a,b[c].buttons);if(e)return e}}},_keypress:function(a,b){if(!b._buttonsHandled){var c=function(d){for(var g=0,f=d.length;g<f;g++){var h=d[g].conf,k=d[g].node;if(h.key)if(h.key===a)b._buttonsHandled=!0,e(k).click();else if(e.isPlainObject(h.key)&&h.key.key===a&&(!h.key.shiftKey||b.shiftKey))if(!h.key.altKey||b.altKey)if(!h.key.ctrlKey||
b.ctrlKey)if(!h.key.metaKey||b.metaKey)b._buttonsHandled=!0,e(k).click();d[g].buttons.length&&c(d[g].buttons)}};c(this.s.buttons)}},_removeKey:function(a){if(a.key){var b=e.isPlainObject(a.key)?a.key.key:a.key,a=this.s.listenKeys.split(""),b=e.inArray(b,a);a.splice(b,1);this.s.listenKeys=a.join("")}},_resolveExtends:function(a){for(var b=this.s.dt,c,d,g=function(c){for(var d=0;!e.isPlainObject(c)&&!Array.isArray(c);){if(c===m)return;if("function"===typeof c){if(c=c(b,a),!c)return!1}else if("string"===
typeof c){if(!l[c])throw"Unknown button type: "+c;c=l[c]}d++;if(30<d)throw"Buttons: Too many iterations";}return Array.isArray(c)?c:e.extend({},c)},a=g(a);a&&a.extend;){if(!l[a.extend])throw"Cannot extend unknown button type: "+a.extend;var f=g(l[a.extend]);if(Array.isArray(f))return f;if(!f)return!1;c=f.className;a=e.extend({},f,a);c&&a.className!==c&&(a.className=c+" "+a.className);var h=a.postfixButtons;if(h){a.buttons||(a.buttons=[]);c=0;for(d=h.length;c<d;c++)a.buttons.push(h[c]);a.postfixButtons=
null}if(h=a.prefixButtons){a.buttons||(a.buttons=[]);c=0;for(d=h.length;c<d;c++)a.buttons.splice(c,0,h[c]);a.prefixButtons=null}a.extend=f.extend}return a},_popover:function(a,b,c){var d=this.c,g=e.extend({align:"button-left",autoClose:!1,background:!0,backgroundClassName:"dt-button-background",contentClassName:d.dom.collection.className,collectionLayout:"",collectionTitle:"",dropup:!1,fade:400,rightAlignClassName:"dt-button-right",tag:d.dom.collection.tag},c),f=b.node(),h=function(){x(e(".dt-button-collection"),
g.fade,function(){e(this).detach()});e(b.buttons('[aria-haspopup="true"][aria-expanded="true"]').nodes()).attr("aria-expanded","false");e("div.dt-button-background").off("click.dtb-collection");p.background(!1,g.backgroundClassName,g.fade,f);e("body").off(".dtb-collection");b.off("buttons-action.b-internal")};!1===a&&h();c=e(b.buttons('[aria-haspopup="true"][aria-expanded="true"]').nodes());c.length&&(f=c.eq(0),h());c=e("<div/>").addClass("dt-button-collection").addClass(g.collectionLayout).css("display",
"none");a=e(a).addClass(g.contentClassName).attr("role","menu").appendTo(c);f.attr("aria-expanded","true");f.parents("body")[0]!==r.body&&(f=r.body.lastChild);g.collectionTitle&&c.prepend('<div class="dt-button-collection-title">'+g.collectionTitle+"</div>");w(c.insertAfter(f),g.fade);var d=e(b.table().container()),k=c.css("position");"dt-container"===g.align&&(f=f.parent(),c.css("width",d.width()));if("absolute"===k&&(c.hasClass(g.rightAlignClassName)||c.hasClass(g.leftAlignClassName)||"dt-container"===
g.align)){var n=f.position();c.css({top:n.top+f.outerHeight(),left:n.left});var j=c.outerHeight(),i=d.offset().top+d.height(),t=n.top+f.outerHeight()+j,i=t-i,t=n.top-j,m=d.offset().top,l=n.top-j-5;(i>m-t||g.dropup)&&-l<m&&c.css("top",l);var n=d.offset().left,d=d.width(),d=n+d,k=c.offset().left,s=c.width(),s=k+s,o=f.offset().left,u=f.outerWidth(),u=o+u,o=0;c.hasClass(g.rightAlignClassName)?(o=u-s,n>k+o&&(k=n-(k+o),d-=s+o,o=k>d?o+d:o+k)):(o=n-k,d<s+o&&(k=n-(k+o),d-=s+o,o=k>d?o+d:o+k));c.css("left",
c.position().left+o)}else"absolute"===k?(n=f.position(),c.css({top:n.top+f.outerHeight(),left:n.left}),j=c.outerHeight(),k=f.offset().top,o=0,o=f.offset().left,u=f.outerWidth(),u=o+u,k=c.offset().left,s=a.width(),s=k+s,l=n.top-j-5,i=d.offset().top+d.height(),t=n.top+f.outerHeight()+j,i=t-i,t=n.top-j,m=d.offset().top,(i>m-t||g.dropup)&&-l<m&&c.css("top",l),o="button-right"===g.align?u-s:o-k,c.css("left",c.position().left+o)):(k=c.height()/2,k>e(q).height()/2&&(k=e(q).height()/2),c.css("marginTop",
-1*k));g.background&&p.background(!0,g.backgroundClassName,g.fade,f);e("div.dt-button-background").on("click.dtb-collection",function(){});e("body").on("click.dtb-collection",function(b){var c=e.fn.addBack?"addBack":"andSelf",d=e(b.target).parent()[0];(!e(b.target).parents()[c]().filter(a).length&&!e(d).hasClass("dt-buttons")||e(b.target).hasClass("dt-button-background"))&&h()}).on("keyup.dtb-collection",function(a){a.keyCode===27&&h()});g.autoClose&&setTimeout(function(){b.on("buttons-action.b-internal",
function(a,b,c,d){d[0]!==f[0]&&h()})},0);e(c).trigger("buttons-popover.dt")}});p.background=function(a,b,c,d){c===m&&(c=400);d||(d=r.body);a?w(e("<div/>").addClass(b).css("display","none").insertAfter(d),c):x(e("div."+b),c,function(){e(this).removeClass(b).remove()})};p.instanceSelector=function(a,b){if(a===m||null===a)return e.map(b,function(a){return a.inst});var c=[],d=e.map(b,function(a){return a.name}),g=function(a){if(Array.isArray(a))for(var h=0,k=a.length;h<k;h++)g(a[h]);else"string"===typeof a?
-1!==a.indexOf(",")?g(a.split(",")):(a=e.inArray(a.trim(),d),-1!==a&&c.push(b[a].inst)):"number"===typeof a&&c.push(b[a].inst)};g(a);return c};p.buttonSelector=function(a,b){for(var c=[],d=function(a,b,c){for(var e,g,f=0,h=b.length;f<h;f++)if(e=b[f])g=c!==m?c+f:f+"",a.push({node:e.node,name:e.conf.name,idx:g}),e.buttons&&d(a,e.buttons,g+"-")},g=function(a,b){var f,h,i=[];d(i,b.s.buttons);f=e.map(i,function(a){return a.node});if(Array.isArray(a)||a instanceof e){f=0;for(h=a.length;f<h;f++)g(a[f],b)}else if(null===
a||a===m||"*"===a){f=0;for(h=i.length;f<h;f++)c.push({inst:b,node:i[f].node})}else if("number"===typeof a)c.push({inst:b,node:b.s.buttons[a].node});else if("string"===typeof a)if(-1!==a.indexOf(",")){i=a.split(",");f=0;for(h=i.length;f<h;f++)g(i[f].trim(),b)}else if(a.match(/^\d+(\-\d+)*$/))f=e.map(i,function(a){return a.idx}),c.push({inst:b,node:i[e.inArray(a,f)].node});else if(-1!==a.indexOf(":name")){var l=a.replace(":name","");f=0;for(h=i.length;f<h;f++)i[f].name===l&&c.push({inst:b,node:i[f].node})}else e(f).filter(a).each(function(){c.push({inst:b,
node:this})});else"object"===typeof a&&a.nodeName&&(i=e.inArray(a,f),-1!==i&&c.push({inst:b,node:f[i]}))},f=0,h=a.length;f<h;f++)g(b,a[f]);return c};p.defaults={buttons:["copy","excel","csv","pdf","print"],name:"main",tabIndex:0,dom:{container:{tag:"div",className:"dt-buttons"},collection:{tag:"div",className:""},button:{tag:"ActiveXObject"in q?"a":"button",className:"dt-button",active:"active",disabled:"disabled"},buttonLiner:{tag:"span",className:""}}};p.version="1.6.5";e.extend(l,{collection:{text:function(a){return a.i18n("buttons.collection",
"Collection")},className:"buttons-collection",init:function(a,b){b.attr("aria-expanded",!1)},action:function(a,b,c,d){a.stopPropagation();d._collection.parents("body").length?this.popover(!1,d):this.popover(d._collection,d)},attr:{"aria-haspopup":!0}},copy:function(a,b){if(l.copyHtml5)return"copyHtml5";if(l.copyFlash&&l.copyFlash.available(a,b))return"copyFlash"},csv:function(a,b){if(l.csvHtml5&&l.csvHtml5.available(a,b))return"csvHtml5";if(l.csvFlash&&l.csvFlash.available(a,b))return"csvFlash"},
excel:function(a,b){if(l.excelHtml5&&l.excelHtml5.available(a,b))return"excelHtml5";if(l.excelFlash&&l.excelFlash.available(a,b))return"excelFlash"},pdf:function(a,b){if(l.pdfHtml5&&l.pdfHtml5.available(a,b))return"pdfHtml5";if(l.pdfFlash&&l.pdfFlash.available(a,b))return"pdfFlash"},pageLength:function(a){var a=a.settings()[0].aLengthMenu,b=Array.isArray(a[0])?a[0]:a,c=Array.isArray(a[0])?a[1]:a;return{extend:"collection",text:function(a){return a.i18n("buttons.pageLength",{"-1":"Show all rows",_:"Show %d rows"},
a.page.len())},className:"buttons-page-length",autoClose:!0,buttons:e.map(b,function(a,b){return{text:c[b],className:"button-page-length",action:function(b,c){c.page.len(a).draw()},init:function(b,c,e){var g=this,c=function(){g.active(b.page.len()===a)};b.on("length.dt"+e.namespace,c);c()},destroy:function(a,b,c){a.off("length.dt"+c.namespace)}}}),init:function(a,b,c){var e=this;a.on("length.dt"+c.namespace,function(){e.text(c.text)})},destroy:function(a,b,c){a.off("length.dt"+c.namespace)}}}});i.Api.register("buttons()",
function(a,b){b===m&&(b=a,a=m);this.selector.buttonGroup=a;var c=this.iterator(!0,"table",function(c){if(c._buttons)return p.buttonSelector(p.instanceSelector(a,c._buttons),b)},!0);c._groupSelector=a;return c});i.Api.register("button()",function(a,b){var c=this.buttons(a,b);1<c.length&&c.splice(1,c.length);return c});i.Api.registerPlural("buttons().active()","button().active()",function(a){return a===m?this.map(function(a){return a.inst.active(a.node)}):this.each(function(b){b.inst.active(b.node,
a)})});i.Api.registerPlural("buttons().action()","button().action()",function(a){return a===m?this.map(function(a){return a.inst.action(a.node)}):this.each(function(b){b.inst.action(b.node,a)})});i.Api.register(["buttons().enable()","button().enable()"],function(a){return this.each(function(b){b.inst.enable(b.node,a)})});i.Api.register(["buttons().disable()","button().disable()"],function(){return this.each(function(a){a.inst.disable(a.node)})});i.Api.registerPlural("buttons().nodes()","button().node()",
function(){var a=e();e(this.each(function(b){a=a.add(b.inst.node(b.node))}));return a});i.Api.registerPlural("buttons().processing()","button().processing()",function(a){return a===m?this.map(function(a){return a.inst.processing(a.node)}):this.each(function(b){b.inst.processing(b.node,a)})});i.Api.registerPlural("buttons().text()","button().text()",function(a){return a===m?this.map(function(a){return a.inst.text(a.node)}):this.each(function(b){b.inst.text(b.node,a)})});i.Api.registerPlural("buttons().trigger()",
"button().trigger()",function(){return this.each(function(a){a.inst.node(a.node).trigger("click")})});i.Api.register("button().popover()",function(a,b){return this.map(function(c){return c.inst._popover(a,this.button(this[0].node),b)})});i.Api.register("buttons().containers()",function(){var a=e(),b=this._groupSelector;this.iterator(!0,"table",function(c){if(c._buttons)for(var c=p.instanceSelector(b,c._buttons),d=0,e=c.length;d<e;d++)a=a.add(c[d].container())});return a});i.Api.register("buttons().container()",
function(){return this.containers().eq(0)});i.Api.register("button().add()",function(a,b){var c=this.context;c.length&&(c=p.instanceSelector(this._groupSelector,c[0]._buttons),c.length&&c[0].add(b,a));return this.button(this._groupSelector,a)});i.Api.register("buttons().destroy()",function(){this.pluck("inst").unique().each(function(a){a.destroy()});return this});i.Api.registerPlural("buttons().remove()","buttons().remove()",function(){this.each(function(a){a.inst.remove(a.node)});return this});var v;
i.Api.register("buttons.info()",function(a,b,c){var d=this;if(!1===a)return this.off("destroy.btn-info"),x(e("#datatables_buttons_info"),400,function(){e(this).remove()}),clearTimeout(v),v=null,this;v&&clearTimeout(v);e("#datatables_buttons_info").length&&e("#datatables_buttons_info").remove();w(e('<div id="datatables_buttons_info" class="dt-button-info"/>').html(a?"<h2>"+a+"</h2>":"").append(e("<div/>")["string"===typeof b?"html":"append"](b)).css("display","none").appendTo("body"));c!==m&&0!==c&&
(v=setTimeout(function(){d.buttons.info(!1)},c));this.on("destroy.btn-info",function(){d.buttons.info(!1)});return this});i.Api.register("buttons.exportData()",function(a){if(this.context.length){var b=new i.Api(this.context[0]),c=e.extend(!0,{},{rows:null,columns:"",modifier:{search:"applied",order:"applied"},orthogonal:"display",stripHtml:!0,stripNewlines:!0,decodeEntities:!0,trim:!0,format:{header:function(a){return d(a)},footer:function(a){return d(a)},body:function(a){return d(a)}},customizeData:null},
a),d=function(a){if("string"!==typeof a)return a;a=a.replace(/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,"");a=a.replace(/<!\-\-.*?\-\->/g,"");c.stripHtml&&(a=a.replace(/<([^>'"]*('[^']*'|"[^"]*")?)*>/g,""));c.trim&&(a=a.replace(/^\s+|\s+$/g,""));c.stripNewlines&&(a=a.replace(/\n/g," "));c.decodeEntities&&(A.innerHTML=a,a=A.value);return a},a=b.columns(c.columns).indexes().map(function(a){var d=b.column(a).header();return c.format.header(d.innerHTML,a,d)}).toArray(),g=b.table().footer()?
b.columns(c.columns).indexes().map(function(a){var d=b.column(a).footer();return c.format.footer(d?d.innerHTML:"",a,d)}).toArray():null,f=e.extend({},c.modifier);b.select&&"function"===typeof b.select.info&&f.selected===m&&b.rows(c.rows,e.extend({selected:!0},f)).any()&&e.extend(f,{selected:!0});for(var f=b.rows(c.rows,f).indexes().toArray(),h=b.cells(f,c.columns),f=h.render(c.orthogonal).toArray(),h=h.nodes().toArray(),k=a.length,n=[],j=0,l=0,p=0<k?f.length/k:0;l<p;l++){for(var r=[k],q=0;q<k;q++)r[q]=
c.format.body(f[j],l,q,h[j]),j++;n[l]=r}a={header:a,footer:g,body:n};c.customizeData&&c.customizeData(a);return a}});i.Api.register("buttons.exportInfo()",function(a){a||(a={});var b;var c=a;b="*"===c.filename&&"*"!==c.title&&c.title!==m&&null!==c.title&&""!==c.title?c.title:c.filename;"function"===typeof b&&(b=b());b===m||null===b?b=null:(-1!==b.indexOf("*")&&(b=b.replace("*",e("head > title").text()).trim()),b=b.replace(/[^a-zA-Z0-9_\u00A1-\uFFFF\.,\-_ !\(\)]/g,""),(c=y(c.extension))||(c=""),b+=
c);c=y(a.title);c=null===c?null:-1!==c.indexOf("*")?c.replace("*",e("head > title").text()||"Exported data"):c;return{filename:b,title:c,messageTop:B(this,a.message||a.messageTop,"top"),messageBottom:B(this,a.messageBottom,"bottom")}});var y=function(a){return null===a||a===m?null:"function"===typeof a?a():a},B=function(a,b,c){b=y(b);if(null===b)return null;a=e("caption",a.table().container()).eq(0);return"*"===b?a.css("caption-side")!==c?null:a.length?a.text():"":b},A=e("<textarea/>")[0];e.fn.dataTable.Buttons=
p;e.fn.DataTable.Buttons=p;e(r).on("init.dt plugin-init.dt",function(a,b){if("dt"===a.namespace){var c=b.oInit.buttons||i.defaults.buttons;c&&!b._buttons&&(new p(b,c)).container()}});i.ext.feature.push({fnInit:z,cFeature:"B"});i.ext.features&&i.ext.features.register("buttons",z);return p});
