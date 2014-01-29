// Generated by CoffeeScript 1.6.3
(function(){var e=[].slice;jQuery(function(t){var n,r,i;i=void 0;(function(){var s,o,u;u=[];s=void 0;o=void 0;return i={start:function(e){var n;e==null&&(e=0);n=t.Deferred();r.loading.show();setTimeout(function(){return n.resolve()},e);return n.promise()},stop:function(){s&&s.reject();s=null;u=[];return r.loading.hide()},until:function(){var r,i,o;o=arguments[0],i=2<=arguments.length?e.call(arguments,1):[];o==null&&(o=0);s=s||t.Deferred().always(n.load.stop);r=u.push(!1)-1;i.push(n.load.start(o));t.when.apply(t,i).always(function(){u[r]=!0;if(-1===t.inArray(!1,u))return s.resolve()});return s.promise()}}})();n={p:function(e){return t("#cws-wp-help-"+e)},load:i,bindH2Updates:function(){r.menu=t("#adminmenu a.current .wp-menu-name");r.menu.length||(r.menu=t("#adminmenu a.current"));r.menu.text(r.h2.edit.input.val());return r.h2.edit.input.bind("keyup",function(){return r.menu.text(t(this).val())})},sortable:function(){t(this).sortable({opacity:.8,placeholder:"cws-wp-help-placeholder",axis:"y",cursor:"move",cursorAt:{left:0,top:0},distance:10,delay:50,handle:".sort-handle",items:"> li.cws-wp-help-local, > div#cws-wp-help-remote-docs-block",start:function(e,n){var r,i,s;r=t(n.item);s=t(".cws-wp-help-placeholder");i=void 0;r.attr("id")==="cws-wp-help-remote-docs-block"?i=4:i=-2;return s.height(r.height()+i)},update:function(e,i){var s;s=t.post(ajaxurl,{action:"cws_wp_help_reorder",_ajax_nonce:r.ul.data("nonce"),order:t(this).sortable("toArray")});return n.load.until(200,s)}});return t(this).find("> li:not(.cws-wp-help-is-slurped) > ul > li:nth-child(2)").parent("ul").each(n.sortable)},sortableInit:function(){r.ul.find("> #cws-wp-help-remote-docs-block > li").unwrap();r.ul.find("> li.cws-wp-help-is-slurped:first").before('<div id="cws-wp-help-remote-docs-block"></div>');r.ul.find("> li.cws-wp-help-is-slurped").detach().appendTo("#cws-wp-help-remote-docs-block");return r.ulSortable.each(n.sortable)},init:function(){var e;e=t("body");if(t.browser.mozilla)if(e.hasClass("branch-3.6")||e.hasClass("branch-3.7")){r.h2.edit.input.css({top:"-3px",left:"-5px","margin-bottom":"1px"});r.h3.edit.input.css({"margin-top":"2px","margin-bottom":"2.25px",left:"-6px"})}else{r.h2.edit.input.css({top:"-5px",left:"-7px","margin-bottom":"-3px"});r.h3.edit.input.css({"margin-top":"1px","margin-bottom":"-5px",left:"-8px"})}n.sortableInit();r.ul.find("li.page_item").each(function(){return t(this).attr("id","page-"+t(this).attr("class").match(/page-item-([0-9]+)/)[1])});r.apiURL.click(function(){return this.select()});r.saveButton.click(function(){return n.saveSettings()});r.cancelLink.click(function(e){e.preventDefault();n.restoreSettings();return n.hideSettings()});r.settingsButton.click(function(e){e.preventDefault();return n.revealSettings(!0)});r.h2.display.text.dblclick(function(){n.revealSettings();return r.h2.edit.input.focus().select()});r.h3.display.text.dblclick(function(){n.revealSettings();return r.h3.edit.input.focus().select()});r.returnMonitor.bind("keydown",function(e){if(13===e.which){t(this).blur();return n.saveSettings()}});n.bindH2Updates();return r.menuLocation.change(function(){var e,i,s;i=String(window.location);r.menuLocation.val().indexOf("submenu")===-1?i=i.replace("/index.php","/admin.php"):i=i.replace("/admin.php","/index.php");s=""+String(i)+"&wp-help-preview-menu-location="+r.menuLocation.val();e=String(i).replace(/\/wp-admin\/.*$/,"/wp-admin/js/common.js");return t("#adminmenu").load(s+" #adminmenu",function(){window.history.replaceState&&window.history.replaceState(null,null,i);t.getScript(e);return n.bindH2Updates()})})},fadeOutIn:function(e,t){return e.fadeOut(150,function(){return t.fadeIn(150)})},hideShow:function(e,t){e.hide();return t.show()},revealSettings:function(e){var t,i,s,o;o=[r.h2,r.h3];for(i=0,s=o.length;i<s;i++){t=o[i];n.hideShow(t.display.wrap,t.edit.wrap)}r.actions.fadeTo(200,.3);r.ul.fadeTo(200,.3);n.fadeOutIn(r.doc,r.settings);if(e)return r.h2.edit.input.focus().select()},restoreSettings:function(){return t("input, select",r.settings).each(function(){var e;e=t(this);if(e.data("original-value"))return e.val(e.data("original-value")).change()})},saveSettings:function(){var e;n.clearError();t([r.h2,r.h3]).each(function(){return this.display.text.text(this.edit.input.val())});e=t.post(ajaxurl,{action:"cws_wp_help_settings",_ajax_nonce:t("#_cws_wp_help_nonce").val(),h2:r.h2.edit.input.val(),h3:r.h3.edit.input.val(),menu_location:r.menuLocation.val(),slurp_url:r.slurp.val()});e.success(function(e){e=t.parseJSON(e);r.slurp.val(e.slurp_url);if(e.error){n.error(e.error);r.slurp.focus()}else n.hideSettings();if(e.topics){n.p("nodocs").remove();r.ul.html(e.topics);return n.sortableInit()}});return n.load.until(200,e)},hideSettings:function(){var e,t,i,s;s=[r.h2,r.h3];for(t=0,i=s.length;t<i;t++){e=s[t];n.hideShow(e.edit.wrap,e.display.wrap)}r.actions.fadeTo(200,1);r.ul.fadeTo(200,1);return n.fadeOutIn(r.settings,r.doc)},clearError:function(){return r.slurpError.html("").hide()},error:function(e){return r.slurpError.html("<p>"+e+"</p>").fadeIn(150)}};r={menu:function(){return t("#adminmenu a.current")},h2:{edit:{input:n.p("h2-label"),wrap:n.p("h2-label-wrap")},display:{text:t(".wrap h2:first"),wrap:t(".wrap h2:first")}},h3:{edit:{input:n.p("listing-label"),wrap:n.p("listing-labels")},display:{text:n.p("listing h3"),wrap:n.p("listing h3")}},settingsButton:n.p("settings-on"),doc:n.p("document"),ul:n.p("listing-wrap > ul"),ulSortable:n.p("listing-wrap > ul.can-sort"),actions:n.p("actions"),settings:n.p("settings"),listing:n.p("listing"),apiURL:n.p("api-url"),slurp:n.p("slurp-url"),slurpError:n.p("slurp-error"),saveButton:n.p("settings-save"),cancelLink:n.p("settings-cancel"),menuLocation:n.p("menu-location"),loading:n.p("loading"),returnMonitor:t('.wrap input[type="text"]')};return n.init()})}).call(this);