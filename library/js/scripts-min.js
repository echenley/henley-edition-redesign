!function(t){var e=t(window).width();e>640?t(".comment img[data-gravatar]").each(function(){t(this).attr("src",t(this).attr("data-gravatar"))}):t(".comment img[data-gravatar]").hide();var i=t('iframe[src*="//www.youtube.com"], iframe[src*="//player.vimeo.com"]');i.each(function(){t(this).data("aspect_ratio",this.height/this.width).removeAttr("height").removeAttr("width")}),t(window).resize(function(){var e=t("article").width();i.each(function(){var i=t(this);i.width(e).height(e*i.data("aspect_ratio"))});var a=t(".cp-cats"),o=t(".post-info").outerHeight(),s=a.outerHeight(),r=t(".post-thumbnail, .archive-thumbnail").width()/2,n=r-(o-s),c=2*Math.sqrt(r*r-n*n);a.width(c)}).resize(),t(window).scroll(function(){if(t(window).width()>=900){var e=t("#site-nav"),i=t("#wpadminbar").outerHeight()||0,a=t("#header").outerHeight(),o=t("#content-container").outerHeight(),s=t("#footer").offset().top-e.outerHeight()-i;if(o<=e.outerHeight())e.css({position:"relative",top:0});else{var r=t(this).scrollTop();e.css(r>=s?{position:"absolute",top:s-a,left:0,width:"100%"}:r>=a?{position:"fixed",top:i,bottom:"auto",left:t("#sidebar").offset().left,width:t("#sidebar").width()}:{position:"absolute",top:0,bottom:"auto",left:0,width:"100%"})}}}).scroll(),t(".menu-toggle").click(function(e){e.preventDefault(),t("#sidebar").toggleClass("active")}),t(".menu .menu-item-has-children > a").click(function(e){e.preventDefault();var i=t(this).parent();i.hasClass("active")?(i.siblings().removeClass("inactive active"),i.find("li").removeClass("inactive active"),i.removeClass("active")):(i.siblings().addClass("inactive").removeClass("active"),i.siblings().find(t("li")).removeClass("inactive active"),i.removeClass("inactive").addClass("active")),t(window).scroll()}),t(document).mouseup(function(e){var i=t("#sidebar, .menu-toggle");i.is(e.target)||0!==i.has(e.target).length||t("nav#site-nav > ul").removeClass("active")})}(jQuery);