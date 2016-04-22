(function(window) {
	window.pageManager = {
		$container: null,
		_pageStack: [],
		_configs: [],
		_defaultPage: null,
		_isGo: false,
		default: function(defaultPage) {
			this._defaultPage = defaultPage;
			return this;
		},
		init: function(container) {
			this.$container = container;
			var self = this;

			$(window).on('hashchange', function(e) {
				var _isBack = !self._isGo;
				self._isGo = false;
				if (!_isBack) {
					return;
				}

				var url = location.hash.indexOf('#') === 0 ? location.hash : '#';
				var found = null;
				for (var i = 0, len = self._pageStack.length; i < len; i++) {
					var stack = self._pageStack[i];
					if (stack.config.url === url) {
						found = stack;
						break;
					}
				}
				if (found) {
					self.back();
				} else {
					goDefault();
				}
			});

			function goDefault() {
				var url = location.hash.indexOf('#') === 0 ? location.hash : '#';
				var page = self._find('url', url) || self._find('name', self._defaultPage);
				self.go(page.name);
			}

			goDefault();

			return this;
		},
		push: function(config) {
			this._configs.push(config);
			return this;
		},
		go: function(to, data) {
			var config = this._find('name', to);
			if (!config) {
				return;
			}

			if (!data) {
				data = {};
			}

			var $html;
			$('#loadingToast').loadingShow();
			if (config.template == "#") { //远程加载
				$.ajax({
					type: "post",
					url: config.url,
					data: data,
					success: function(html) {
						$html = $(html).addClass('slideIn').addClass(config.name);
					},
					error: function() {
						$('#loadingToast').hide();
						$("#dialog").dialog("提示", "加载页面失败,请与管理员联系!");
					},
					async: false
				});
			} else { //本地跳转
				var html = $(config.template).html();
				$html = $(html).addClass('slideIn').addClass(config.name);
			}

			setTimeout(function() {
				$('#loadingToast').hide();
			}, 200);
			this.$container.append($html);
			this._pageStack.push({
				config: config,
				dom: $html
			});

			this._isGo = true;
			location.hash = config.url;

			if (!config.isBind) {
				this._bind(config);
			}

			return this;
		},
		back: function() {
			if (this._pageStack.length <= 1) {
				return;
			}

			var stack = this._pageStack.pop();
			if (!stack) {
				return;
			}
			stack.dom.addClass('slideOut').on('animationend', function() {
				stack.dom.remove();
			}).on('webkitAnimationEnd', function() {
				stack.dom.remove();
			});

			return this;
		},
		_find: function(key, value) {
			var page = null;
			for (var i = 0, len = this._configs.length; i < len; i++) {
				if (this._configs[i][key] === value) {
					page = this._configs[i];
					break;
				}
			}
			return page;
		},
		_bind: function(page) {
			var events = page.events || {};
			for (var t in events) {
				for (var type in events[t]) {
					this.$container.on(type, t, events[t][type]);
				}
			}
			page.isBind = true;
		}
	};
})(window);

(function($) {
	$.fn.dialog = function(title, content) {
		var t = $(this);
		t.find(".weui_dialog_title").html(title);
		t.find(".weui_dialog_bd").html(content);
		t.find(".weui_btn_dialog").click(function() {
			t.hide();
		});

		t.show();
	}

	$.fn.loadingShow = function() {
		if ($(this).css('display') != 'none') {
			return;
		}
		$(this).show();
	}
	
})($);
/**
 * Created by jf on 2015/9/11.
 */
$(function() {
	$("#goback").click(function() {
		pageManager.back();
	});

	var gs = {
		"name": "gs",
		"url": "chuang-gogs.html",
		"template": '#'
	};
	var uigs = {
		"name": "uigs",
		"url": "chuang-gouigs.html",
		"template": '#'
	};
	var wanggs = {
		"name": "wanggs",
		"url": "chuang-gowanggs.html",
		"template": '#'
	};
	var pinggs = {
		"name": "pinggs",
		"url": "chuang-gopinggs.html",
		"template": '#'
	};
	var chuangps = {
		"name": "chuangps",
		"url": "chuang-gochuangps.html",
		"template": "#",
		
	};
	var applysub = {
		"name": "applysub",
		"url": "",
		"template": "#tpl_applysub",
		"events": {
			".weui_btn_area #chaungback": {
				click: function() {
					pageManager.back();
				}
			},
			".weui_btn_area #homeback": {
				click: function() {
					pageManager.back();
					pageManager.back();
					pageManager.back();
				}
			}
		}
	}
	var applyfalse = {
		"name": "applyfalse",
		"url": "chuang-goapplyfalse.html",
		"template": "#"
	}
	var cxtalumnus = {
		"name": "cxtalumnus",
		"url": "cxt-goalumnus.html",
		"template": '#'
	};
	var cxtdynamic = {
		"name": "cxtdynamic",
		"url": "cxt-godynamic.html",
		"template": '#'
	};
	var cxtresume = {
		"name": "cxtresume",
		"url": "cxt-goresume.html",
		"template": '#'
	};
	var cxtaddresume = {
		"name": "cxtaddresume",
		"url": "cxt-goaddresume.html",
		"template": '#'
	};
	var zhaopin = {
		"name": "zhaopin",
		"url": "Qiye-gozhaopin.html",
		"template": '#'
	};
	var searchZhaopin = {
		"name": "searchZhaopin",
		"url": "Qiye-gosearchZhaopin.html",
		"template": '#'
	}
	var searchResume = {
		"name": "searchResume",
		"url": "Qiye-gosearchResume.html",
		"template": '#'
	}
	var checkResume = {
		"name": "checkResume",
		"url": "Qiye-gocheckResume.html",
		"template": '#'
	}
	var checkZhaopinMain = {
		"name": "checkZhaopinMain",
		"url": "Qiye-gocheckZhaopinMain.html",
		"template": '#'
	}
	var checkMyZhaopin = {
		"name": "checkMyZhaopin",
		"url": "Qiye-gocheckMyZhaopin.html",
		"template": '#'
	}
	var alterZhaopin = {
		"name": "alterZhaopin",
		"url": "Qiye-goalterZhaopin.html",
		"template": '#'
	}
	var entstore = {
		"name": "entstore",
		"url" : "Qiye-checkRes.html",
		"template":'#'
	}
	var jifen = {
		"name": "jifen",
		"url": "jifen-Lxrjifen.html",
		"template": '#'
	};

	var home = {
		"name": "home",
		"url": "#",
		"template": '#tpl_home',
		"events": {
			".home .js_grid": {
				click: function() {
					pageManager.go($(this).data("id"));
				}
			},
			".home .chuang" : {
				click : function(){
					pageManager.go($(this).data("id"));
//					var pid = $(this).data("pid");
//					if( pid ) {
//						pageManager.go("uigs",{"pid":pid});
//					} else {
//						pageManager.go($(this).data("id"));
//					}
				}
			},
		}
	};
	var offer = {
		"name": "offer",
		"url": "offer-offer.html",
		"template": '#'
	};
	var offeradd = {
		"name": "offeradd",
		"url": "offer-offeradd.html",
		"template": "#"
	};
	var offerdetails = {
		"name": "offerdetails",
		"url": "offer-offerdetails.html",
		"template": "#"
	};
	var offermine = {
		"name": "offermine",
		"url": "offer-offermine.html",
		"template": "#"
	};
	var Rankschool = {
		"name": "Rankschool",
		"url": "Rank-goschool.html",
		"template": '#'
	};
	var Rankpoint = {
		"name": "Rankpoint",
		"url": "Rank-gopoint.html",
		"template": '#'
	};
	var Rankpower = {
		"name": "Rankpower",
		"url": "Rank-gopower.html",
		"template": '#'
	};

	var school = {
		"name": "school",
		"url": "School-schools.html",
		"template": '#'
	};

	var register = {
		"name": "register",
		"url": "study-register.html",
		"template": "#"
	}

	var nologin = {
		"name": "nologin",
		"url": "",
		"template": "#tpl_nologin",
		"events": {
			".nologin #regist": {
				click: function() {
					pageManager.go("register");
				}
			},
			".nologin #nologinback": {
				click: function() {
					pageManager.back();
				}
			}
		}
	}

	var registok = {
		"name": "registok",
		"url": "",
		"template": "#tpl_registok",
		"events": {
			".registok #registok": {
				click: function() {
					pageManager.back();
					pageManager.back();
					pageManager.back();
				}
			}
		}
	}
	pageManager.push(gs)
		.push(wanggs)
		.push(pinggs)
		.push(uigs)
		.push(chuangps)
		.push(applysub)
		.push(applyfalse)
		.push(home)
		.push(cxtalumnus)
		.push(cxtdynamic)
		.push(cxtresume)
		.push(cxtaddresume)
		.push(offer)
		.push(jifen)
		.push(zhaopin)
		.push(searchZhaopin)
		.push(searchResume)
		.push(checkResume)
		.push(checkZhaopinMain)
		.push(checkMyZhaopin)
		.push(alterZhaopin)
		.push(entstore)
		.push(school)
		.push(Rankpower)
		.push(Rankpoint)
		.push(Rankschool)
		.push(offeradd)
		.push(offermine)
		.push(offerdetails)
		.push(register)
		.push(nologin)
		.push(registok)
		.default("home")
		.init($(".js_container"));

	$('#slider-box').touchSlider();
});