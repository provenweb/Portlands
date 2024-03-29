var siteURL = "http://parklands.provenweb.net";
var apiPath = "/mobile/api/";
var postPath = "/news/age/";
var latestPath = "/latest/";
var pagePath = "/school-information/";
var imgPath = "/wp-content/uploads/";

var categories;
var infoPages;
var newsletters;
var posts;

var connectionType = "notReady";

document.addEventListener("deviceready", onDeviceReady, false);

function onDeviceReady() {
	checkConnection();
}

function checkConnection() {
	var networkState;
	try {
		networkState = navigator.network.connection.type;
		if (networkState==Connection.ETHERNET || networkState==Connection.WIFI || networkState==Connection.CELL_4G || networkState==Connection.CELL_3G) { connectionType="fast" }
		if (networkState==Connection.CELL_2G) { connectionType="slow" }
		if (networkState==Connection.UNKNOWN || networkState==Connection.NONE) { connectionType="none" }
	} catch(err) {}

	$("#categoryList #loadingmsg").attr('class', connectionType);
	$("#newsletterList #loadingmsg").attr('class', connectionType);
	$("#schoolInfoList #loadingmsg").attr('class', connectionType);
}


function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function alertConfirm(b){
  if(b == 1){
   alert('BUTTON 1 WAS CLICKED');
  }
  else {
   alert('BUTTON 2 WAS CLICKED');
  }
}

function getCategoryList() {

	$.getJSON(siteURL + apiPath + 'getcategories.php?', function(data) {
		$('#categoryList li').remove();
		categories = data.items;

		//alert("Cat List Connection: "+connectionType);

		$.each(categories, function(index, category) {
			$('#categoryList').append('<li><a href="posts.html?id=' + category.slug + '&title=' + category.name + '">' +
					'<h4>' + category.name + '</h4></a></li>');
		});

		$('#categoryList').listview('refresh');
		$("#categoryPage div.ui-content").iscrollview();

		var numelements=$("#categoryList .ui-link-inherit").length;
		var boxheight=$(".ui-page div.ui-content").height();

		var elemheight=Math.round(boxheight/numelements);
		var elempadding=Math.round((elemheight-40)/2);
		if (elempadding<0) { elempadding=0; }

		$("#categoryList a.ui-link-inherit").css("padding-top",elempadding+"px");
		$("#categoryList a.ui-link-inherit").css("padding-bottom",elempadding+"px");
		$("#categoryList div.ui-btn-inner").css("height",elemheight+"px");


	});
}

function getInfoList() {


	$.getJSON(siteURL + apiPath + 'getinfolist.php?', function(data) {
		$('#schoolInfoList li').remove();
		infoPages = data.items;

		$.each(infoPages, function(index, page) {
			$('#schoolInfoList').append('<li><a href="viewpage.html?id=' + page.post_name + '">' +
					'<h4>' + page.post_title + '</h4></a></li>');
		});

		$('#schoolInfoList').append('<li><a href="posts.html?id=clubs&return=schoolinfo.html&title=Sports%20%26%20Clubs"><h4>Sports &amp; Clubs</h4></a></li>');
		$('#schoolInfoList').append('<li><a href="posts.html?id=events&return=schoolinfo.html&title=Events"><h4>Fundraising &amp; Events</h4></a></li>');

		$('#schoolInfoList').listview('refresh');
		$(".ui-page div.ui-content").iscrollview();

	});
}

function getNewsletters() {

	$.getJSON(siteURL + apiPath + 'getnewsletters.php?', function(data) {

		$('#newsletterList li').remove();
		newsletters = data.items;

		$.each(newsletters, function(index, post) {

			var strDate=post.post_date;
			var arrDate=strDate.split(" ");
			arrDate=arrDate[0].split("-");

			var month=new Array();
			month[1]="January";
			month[2]="February";
			month[3]="March";
			month[4]="April";
			month[5]="May";
			month[6]="June";
			month[7]="July";
			month[8]="August";
			month[9]="September";
			month[10]="October";
			month[11]="November";
			month[12]="December";

			var yr = arrDate[0];
			var mt = month[parseInt(arrDate[1])];
			var dt = parseInt(arrDate[2]);

			var append = "th";
			if (dt=="1"||dt=="21"||dt=="31") { append = "st" ; }
			if (dt=="2"||dt=="22") { append = "nd" ; }
			if (dt=="3"||dt=="23") { append = "rd" ; }

			thedate = dt + append + " " + mt + " " + yr ;

			$('#newsletterList').append('<li><a target="_blank" href="' + post.guid + '&download=1">' +
					'<h4>' + thedate + '</h4></a></li>');
		});

		$('#newsletterList').listview('refresh');
		$(".ui-page div.ui-content").iscrollview();

		$('#newsletterList li:first-child div div a h4').append('<span class="latestnews">LATEST</span>');

		var numelements=$("#newsletterList .ui-link-inherit").length;
		var boxheight=$("div.ui-content").height();

		var elemheight=Math.round(boxheight/numelements);
		var elempadding=Math.round((elemheight-40)/2);
		if (elempadding<0) { elempadding=0; }

		$("#newsletterList a.ui-link-inherit").css("padding-top",elempadding+"px");
		$("#newsletterList a.ui-link-inherit").css("padding-bottom",elempadding+"px");
		$("#newsletterList div.ui-btn-inner").css("height",elemheight+"px");


	});
}

function getPostList(data) {

	posts = data.items;
	$('.ui-page-active #postList li').remove();
	$.each(posts, function(index, post) {
		$('.ui-page-active #postList').append('<li><a data-ajax="false" rel="external" href="viewpost.html?link=' + post.link + '&category=' + getUrlVars()['title'] + '&return=' + escape(document.location.href) + '">' +
		post.image +
		'<h4>' + post.title + '</h4>' +
		'<p>' + post.date + '</p>' +
		'</a></li>');
	});

	$('.ui-page-active #postList').listview('refresh');
	$(".ui-page div.ui-content").iscrollview();

}

function getSinglePost(data) {

	posts = data.items;

	$.each(posts, function(index, thepost) {

		$('.ui-page-active #postTitle').text(thepost.title);
		$('.ui-page-active #postDate').text(thepost.date);
		$('.ui-page-active #author').text(thepost.author);
		$('.ui-page-active #postContent').html(thepost.content);
		$('.ui-page-active #avatar').html(thepost.avatar);
		$('.ui-page-active #postImage').html(thepost.image);
		$('.ui-page-active #gallery').html(thepost.gallery);
		$('.ui-page-active #attachments').html(thepost.attachments);

	});

	$(".ui-page-active #loadingmsg").remove();
	$(".ui-page-active #singleContent").attr('style', 'display:block');

	if ($('.ui-page-active #gallery').html()!="") {
		photoSwipeInstance = $("div.imggallery a", theTarget).photoSwipe(options,  currentPage.attr('pagename'));
	}


	$("#postViewPage div.ui-content").attr('id', 'thePageID');

	$("#thePageID").iscrollview();

}


function getSinglePage(data) {

	pages = data.items;

	$.each(pages, function(index, thepage) {

		$('.ui-page-active #postTitle').text(thepage.title);
		$('.ui-page-active #postContent').html(thepage.content);
		$('.ui-page-active #postImage').html(thepage.image);
		$('.ui-page-active #gallery').html(thepage.gallery);
		$('.ui-page-active #attachments').html(thepage.attachments);
	});

	if ($('.ui-page-active #gallery').html()!="") {
		photoSwipeInstance = $("div.imggallery a", theTarget).photoSwipe(options,  currentPage.attr('pagename'));
	}

	$(".ui-page-active #loadingmsg").remove();
	$(".ui-page-active #singleContent").attr('style', 'display:block');

	$(".ui-page div.ui-content").iscrollview();

}

function setButton(num) {

		var buttonclass=$('.ui-page-active #navbutton'+num).attr('class')
		buttonclass=buttonclass.replace("ui-btn-up-a","");
		buttonclass=buttonclass.replace("ui-btn-up","");
		buttonclass=buttonclass.replace("ui-btn-active","");
		buttonclass+=" ui-btn-active"
		$('.ui-page-active #navbutton'+num).attr('class',buttonclass);

}


function adjustHeights(pagename) {

		pagename="#"+pagename;
		var numelements=$(pagename+" .ui-listview .ui-link-inherit").length;
		var boxheight=$(pagename+" div.ui-content").height();

		var elemheight=Math.round(boxheight/numelements);
		var elempadding=Math.round((elemheight-40)/2);
		if (elempadding<0) { elempadding=0; }

		$(pagename+" .ui-listview a.ui-link-inherit").css("padding-top",elempadding+"px");
		$(pagename+" .ui-listview a.ui-link-inherit").css("padding-bottom",elempadding+"px");
		$(pagename+" .ui-listview div.ui-btn-inner").css("height",elemheight+"px");

}

function setBackURL() {


		var urlvars = getUrlVars()
		var returnurl = urlvars["return"];
		if (returnurl && returnurl!="") {
			returnurl = unescape(returnurl);
			$('.ui-page-active #backbutton').attr('href',returnurl)
		}
}

function getLatest() {

	$.getJSON(siteURL + latestPath + '?api=1', function(data) {
		$('#latestList li').remove();
		latestitems = data.items;

		$.each(latestitems, function(index, latestitem) {

			$('#latestList').append('<li><a data-ajax="false" rel="external" href="viewpost.html?link=' + latestitem.link + '&category=Latest&return=' + escape(document.location.href) + '"><strong>' + latestitem.title + '</strong><span>' + latestitem.date + '<span></a></li>');
		});

	});
}

function nextStory() {

   if (!hasScrolled) {
	if (scrollcounter==5) { myScroll.scrollToPage(0,0); scrollcounter=0; }
	scrollcounter++;
	setTimeout("if (!hasScrolled) { myScroll.scrollToPage('next',0); } nextStory()",4000);
   }
}

function doScroll() {

	hasScrolled=true;
}