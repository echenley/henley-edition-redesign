!function(t){var a=t(window).width();a>640?t(".comment img[data-gravatar]").each(function(){t(this).attr("src",t(this).attr("data-gravatar"))}):t(".comment img[data-gravatar]").hide();var e=t('iframe[src*="//www.youtube.com"], iframe[src*="//player.vimeo.com"]');e.each(function(){t(this).data("aspect_ratio",this.height/this.width).removeAttr("height").removeAttr("width")}),t(window).resize(function(){t("h1").css("z-index",1);var a=t("article").width();e.each(function(){var e=t(this);e.width(a).height(a*e.data("aspect_ratio"))})}).resize(),t(window).scroll(function(){if(t(window).width()>640){var a=t("header#header").height(),e=t(window).scrollTop(),i=74,r=t("nav#site-nav");if(e>=0&&a>e){var n=a-e;r.css({top:n})}else r.css(e>=i?{top:0}:{top:i})}}),t(".menu-link").click(function(){return t("nav#site-nav > ul").toggleClass("active"),!1}),t("nav#site-nav li.menu-item-has-children a").click(function(){t(this).parent().toggleClass("active")}),t(document).mouseup(function(a){var e=t("header#header");e.is(a.target)||0!==e.has(a.target).length||t("> ul",e).removeClass("active")})}(jQuery);