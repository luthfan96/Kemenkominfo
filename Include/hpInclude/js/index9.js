$(document).ready(function(){$("#table").basictable(),$("#table-two-axis").basictable()});
!function(t){t.fn.basictable=function(a){var e=function(a,e){var i=[];e.tableWrap&&a.wrap('<div class="bt-wrapper"></div>');var s="";s=a.find("thead tr th").length?"thead th":a.find("tbody tr th").length?"tbody tr th":a.find("th").length?"tr:first th":"tr:first td",t.each(a.find(s),function(){var a=t(this),e=parseInt(a.attr("colspan"),10)||1,n=a.closest("tr").index();i[n]||(i[n]=[]);for(var s=0;e>s;s++)i[n].push(a)}),t.each(a.find("tbody tr"),function(){n(t(this),i,e)}),t.each(a.find("tfoot tr"),function(){n(t(this),i,e)})},n=function(a,e,n){a.children().each(function(){var a=t(this);if(""!==a.html()&&"&nbsp;"!==a.html()||n.showEmptyCells){for(var i=a.index(),s="",r=0;r<e.length;r++){0!=r&&(s+=": ");var o=e[r][i];s+=o.text()}a.attr("data-th",s),n.contentWrap&&!a.children().hasClass("bt-content")&&a.wrapInner('<span class="bt-content" />')}else a.addClass("bt-hide")})},i=function(a){t.each(a.find("td"),function(){var a=t(this),e=a.children(".bt-content").html();a.html(e)})},s=function(a,e){e.forceResponsive?t(window).width()<=e.breakpoint?r(a,e):o(a,e):a.removeClass("bt").outerWidth()>a.parent().width()?r(a,e):o(a,e)},r=function(t,a){t.addClass("bt"),a.tableWrap&&t.parent(".bt-wrapper").addClass("active")},o=function(t,a){t.removeClass("bt"),a.tableWrap&&t.parent(".bt-wrapper").removeClass("active")},c=function(t,a){t.find("td").removeAttr("data-th"),a.tableWrap&&t.unwrap(),a.contentWrap&&i(t),t.removeData("basictable")},b=function(t){t.data("basictable")&&s(t,t.data("basictable"))};this.each(function(){var n=t(this);if(0===n.length||n.data("basictable"))return n.data("basictable")&&("destroy"==a?c(n,n.data("basictable")):"start"===a?r(n,n.data("basictable")):"stop"===a?o(n,n.data("basictable")):s(n,n.data("basictable"))),!1;var i=t.extend({},t.fn.basictable.defaults,a),l={breakpoint:i.breakpoint,contentWrap:i.contentWrap,forceResponsive:i.forceResponsive,noResize:i.noResize,tableWrap:i.tableWrap,showEmptyCells:i.showEmptyCells};n.data("basictable",l),e(n,n.data("basictable")),l.noResize||(s(n,n.data("basictable")),t(window).bind("resize.basictable",function(){b(n)}))})},t.fn.basictable.defaults={breakpoint:568,contentWrap:!0,forceResponsive:!0,noResize:!1,tableWrap:!1,showEmptyCells:!1}}(jQuery);