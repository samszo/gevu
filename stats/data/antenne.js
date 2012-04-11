<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1"><style type="text/css">/**
 * Highlight style classes
 * .a background color
 * .b underline
 * .c underline + font color
 */
 
@media screen{
em.diigoHighlight {
	text-align:inherit;
	text-decoration: inherit;
	line-height:inherit;
	font:inherit;
	color:inherit;
	display:inline;
	position:relative;
}
em.diigoHighlight.a_style.mouseOvered {
	background-color: #ffc62a !important;
}	

em.diigoHighlight.b_style.mouseOvered, em.diigoHighlight.c_style.mouseOvered {
	border-bottom: solid 2px #ffc62a;
}
	
em.diigoHighlight.c_style {
	color: #000099;
}
em.diigoHighlight.c_style.mouseOvered {
	color: #ffc62a;
}	

em.diigoHighlight.a_style.yellow {
	background-color: #FF9;
}

em.diigoHighlight.b_style.yellow, em.diigoHighlight.c_style.yellow {
	border-bottom: solid 2px #FF9;
}
	
img.diigoHighlight.yellow {/*image highlight*/
	cursor: pointer; 
	outline:2px solid #FF9;
}
	
em.diigoHighlight.a_style.blue {
	background-color: #ABD5FF;
}

em.diigoHighlight.b_style.blue, em.diigoHighlight.c_style.blue {
	border-bottom: solid 2px #ABD5FF;
}
	
img.diigoHighlight.blue {/*image highlight*/
	cursor: pointer; 
	outline:2px solid #ABD5FF;
}
	
	
em.diigoHighlight.a_style.green {
	background-color: #B2E57E;
}

em.diigoHighlight.b_style.green, em.diigoHighlight.c_style.green {
	border-bottom: solid 2px #B2E57E;
}

img.diigoHighlight.green {/*image highlight*/
	cursor: pointer; 
	outline:2px solid #B2E57E;
}	
	
	
em.diigoHighlight.a_style.pink {
	background-color: #ffcccc;
}

em.diigoHighlight.b_style.pink, em.diigoHighlight.c_style.pink {
	border-bottom: solid 2px #ffcccc;
}
	
img.diigoHighlight.pink {/*image highlight*/
	cursor: pointer; 
	outline:2px solid #ffcccc;
}	
	
img.diigoHighlight.mouseOvered {
	cursor: pointer; 
	outline:2px solid #ffc62a;
}	
	

div.diigotb-inline-cloud{
	position:fixed !important;
	width:440px !important;
	height:370px !important;
	left:0;top:0;
	background-color:#fef5c7 !important;
	z-index:9999999999 !important;
	display:none;
	-moz-border-radius:15px !important;
}
/*  capture image */

.diigotb-body #diigotb-upload-cover{
	cursor:crosshair!important;
	z-index:1999999!important;
	position:fixed!important;
	left:0!important;
	top:31px;
}
	
.diigotb-body #diigotb-upload-tip{
    color: #fff!important;
    padding:2px 4px!important;
    position:fixed!important;
    z-index:11000001!important;
}
	
.diigotb-body #diigotb-upload-select{
	position:fixed!important;
	z-index:1000001;
}
	
.diigotb-body #diigotb-upload-resizer{
	z-index:11000002!important;
	position:fixed!important;
	cursor:move!important;
	border:1px dashed black!important;
}
	
.diigotb-body #currentColor{
  background-color: #fff!important;
  width: 37px!important;
  height: 37px!important;
  padding: 1px!important;
  border: 1px solid #2e68e6!important;
  float: left!important;
  margin: 0 5px 0 0!important;
}
	
.diigotb-body #currentColor div{
  width: 37px!important;
  height: 37px!important;	
  margin:0!important;
}
.diigotb-body .selectPanel{
	margin-top:5px!important;
}
	
.diigotb-body .colorCell{
  float: left!important;
  margin: 0 1px 1px 0!important;
  border: 1px solid #5f92ff!important;
  width: 18px!important;
  height: 18px!important;
}
	
.diigotb-body .colorCell:hover{
  border: 1px solid #FF9900!important;
}
.diigotb-body .colorCell.actived{
  border: 1px solid #FF9900!important;
}	
	
.diigotb-body .colorCell div{
  width: 18px!important;
  height: 18px!important;
  cursor:pointer!important;
  margin:0!important;
}

.diigotb-body .capture-black{background-color:#000!important;}
.diigotb-body .capture-white{background-color:#fff!important;}
.diigotb-body .capture-gray{background-color:#808080!important;}
.diigotb-body .capture-light-gray{background-color:#c0c0c0!important;}

.diigotb-body .capture-red{background-color:#ff0000!important;}
.diigotb-body .capture-cyan{background-color:#00ffff!important;}
.diigotb-body .capture-orange{background-color:#ff9900!important;}
.diigotb-body .capture-blue{background-color:#0000ff!important;}

.diigotb-body .capture-yellow{background-color:#ffff00!important;}
.diigotb-body .capture-purple{background-color:#9900ff!important;}
.diigotb-body .capture-green{background-color:#00ff00!important;}
.diigotb-body .capture-pink{background-color:#ff00ff!important;}
	
.diigotb-body #diigotb-colorpanel{
	background:transparent url(chrome://diigotb/skin/ann-bar-palette-bg-left.png) no-repeat scroll left center!important;
	display:block;
	height:55px!important;
	position:fixed!important;
	width:180px!important;
	z-index:11000022!important;
	margin:0!important;
}
	
.diigotb-body .diigotb-cbg{
	background:transparent url(chrome://diigotb/skin/ann-bar-palette-bg-right.png) no-repeat scroll right top!important;
	height:55px!important;
	line-height:55px!important;
	padding-left:6px!important;
	width:180px!important;
	margin:0!important;
}

	
.diigotb-body #currentArrow{
	background:transparent url(chrome://diigotb/skin/ann-bar-palette-arrow.png) no-repeat scroll 0 0!important;
	height:6px!important;
	left:0;
	position:relative!important;
	top:-5px;
	width:7px!important;
	margin:0!important;
}
	
.diigotb-body #currentArrow._istop{
	background:transparent url(chrome://diigotb/skin/ann-bar-palette-arrow-down.png) no-repeat scroll 0 0!important;
	top:51px!important;
}
	
	
.diigotb-body #diigotb-text-area{
	position:fixed!important;
	z-index:11000010!important;
}
	
.diigotb-body .diigotb-text-input{
	font: 18px/22px Helvetica,Arial,sans-serif!important;
	border:0px solid #5f92ff!important;
	z-index:11000011!important;
}	
	
.diigotb-body #diigotb-editpanel{
	background:transparent url(chrome://diigotb/skin/ann-bar-bg-right.png) no-repeat scroll right center!important;
	height:35px!important;
	position: fixed!important;
	z-index:11000022!important;
	margin:0!important;
}
	
	
.diigotb-body .diigotb-btn div{
	cursor:pointer!important;
	width:18px!important;
	height:18px!important;
	margin:2px!important;
}
.diigotb-body .diigotb-btn{
	width:23px!important;
	height:23px!important;
}
		
	
.diigotb-body #diigotb-editpanel .diigotb-bg{
	background:transparent url(chrome://diigotb/skin/ann-bar-bg-left.png) repeat-x scroll left center!important;
	height:35px!important;
	padding-left:6px!important;
	line-height:35px!important;
	margin:0!important;
}
	
		
.diigotb-body div.diigotb-tip{
	-moz-border-radius:4px 4px 4px 4px;
	background-color:#f1f2f7;
	border:1px solid #767676;
	color:black;
	display:none;
	-moz-box-shadow:5px 5px 5px -5px #767676;
	font:12px Arial,Helvetica,sans-serif;
	margin:0 !important;
	padding:3px 6px !important;
	position:absolute;
	z-index:2147483647;
}
	
.diigotb-body #diigotb-editpanel div.diigotb-btn{
	padding:0px!important;
	display:inline-table!important;
	margin-bottom:0 !important;
	margin-left:0 !important;
	margin-right:0 !important;
	margin-top:5px;
}
	
	
.diigotb-body #diigotb-editpanel div.diigotb-sep img{
	padding:0!important;
	margin:0!important;
}
	
.diigotb-body #diigotb-editpanel div.diigotb-sep{
	padding:4px 0!important;
	display:inline-table!important;
	margin:0!important;
	line-height:0 !important;
}	
	
.diigotb-body #diigotb-editpanel div.diigotb-btn.enabled:hover{
	background: transparent url('chrome://diigotb/skin/ann-bar-opt-current.png') no-repeat!important;
}
	
.diigotb-body #diigotb-editpanel #diigotb-undo.enabled div{
	background: transparent url('chrome://diigotb/skin/ann-bar-opt-undo.png') no-repeat center center!important;
}
	
.diigotb-body #diigotb-editpanel div.diigotb-btn.actived{
	background: transparent url('chrome://diigotb/skin/ann-bar-opt-current.png') no-repeat!important;
}
	
.diigotb-image-border{
	border:1px solid #666 !important;
}
	
#diigotb-imagepanel{
	height:22px!important;
	position: absolute!important;
	z-index:11000022!important;
	margin:0!important;
}

#diigotb-imagepanel .diigotb-btn{
	cursor:pointer!important;
	width:20px!important;
	height:20px!important;
	margin:2px!important;
	float:left !important;
	background:transparent url(chrome://diigotb/skin/save-image-action-icons.png) no-repeat scroll!important;
}	
	
	
#diigotb-imagepanel #diigotb-quick-save{
	background-position:0 0!important;
}
		
#diigotb-imagepanel.processing #diigotb-quick-save{
	background-position:0 -20px!important;
	cursor:default!important;
}

		
#diigotb-imagepanel.needpremium #diigotb-quick-save{
	background-position:0 -20px!important;
	cursor:default!important;
}	

#diigotb-imagepanel.hassaved #diigotb-quick-save{
	background-position: -60px 0!important;
	cursor: pointer !important;
}

.diigotb-imagetip{
	background:transparent url(chrome://diigotb/skin/notice-bar-bg-right.png) no-repeat scroll right center !important;
	height:21px !important;
	margin:0 !important;
	position:absolute !important;
	z-index:11000022 !important;
	width:106px;
}
	
.diigotb-imagebg{
	background:transparent url(chrome://diigotb/skin/notice-bar-bg-left.png) repeat-x scroll left center !important;
	height:21px !important;
	margin:0 !important;
	padding-left:6px !important;
	width:90px;
}
	
.diigotb-imagetip-text{
	padding-left:20px!important;
	font:11px/13px Helvetica,Arial,sans-serif!important;
	color:white!important;
	line-height:20px!important;
	float:left;
}
	
.diigotb-imagetip.processing .diigotb-imagetip-text{
	background:transparent url(chrome://diigotb/skin/processing-fb.gif) no-repeat scroll left center !important;
}
	
.diigotb-imagetip.hassaved .diigotb-imagetip-text{
	background:transparent url(chrome://diigotb/skin/icon-done.png) no-repeat scroll left center !important;
}
	
.diigotb-border{
	position: absolute!important;
	z-index:11000000!important;
	margin:0!important;
	background-color: #4b8cdc!important;
}
.diigotb-left{
	width:1px!important;
}
.diigotb-right{
	width:1px!important;
}
.diigotb-top{
	height:1px!important;
}
.diigotb-bottom{
	height:1px!important;
}

.diigotb-body #diigotb-rect div{
	background: transparent url('chrome://diigotb/skin/ann-bar-opt-rectangle.png') no-repeat center center!important;
}	
.diigotb-body #diigotb-round div{
	background: transparent url('chrome://diigotb/skin/ann-bar-opt-ellipse.png') no-repeat center center!important;
}
.diigotb-body #diigotb-text div{
	background: transparent url('chrome://diigotb/skin/ann-bar-opt-font.png') no-repeat center center!important;
}
	
.diigotb-body #diigotb-arrow div{
	background: transparent url('chrome://diigotb/skin/ann-bar-opt-arrow.png') no-repeat center center!important;
}
	
.diigotb-body .diigotb-sep{
	background: transparent url('chrome://diigotb/skin/ann-bar-bg-separator.png') no-repeat center center!important;
}
	
.diigotb-body #diigotb-undo div{
	background: transparent url('chrome://diigotb/skin/ann-bar-opt-undo-disabled.png') no-repeat center center!important;
}
	
.diigotb-body #diigotb-capture-save div{
	background: transparent url('chrome://diigotb/skin/ann-bar-opt-quickly-save.png') no-repeat center center!important;
}
	
	
	
.diigotb-body #diigotb-upload-resizer div {
  position: absolute!important;
  width: 9px!important;
  height: 9px!important;
  /*background-color: white;*/
  z-index:11000002!important;
  margin:0px!important;
  background:transparent url(chrome://diigotb/skin/spot.png) no-repeat scroll left center!important;
}

.diigotb-body #diigotb-upload-resizer div.gleft {
  left: -9px!important;
}

.diigotb-body #diigotb-upload-resizer div.gtop {
  top: -9px!important;
}

.diigotb-body #diigotb-upload-resizer div.gright {
  right: -9px!important;
}

.diigotb-body #diigotb-upload-resizer div.gbottom {
  bottom: -9px!important;
}

.diigotb-body #diigotb-upload-resizer div.ghor {
  margin-left: auto!important;
  margin-right: auto!important;
  left: 0px!important;
  right: 0px!important;
}

.diigotb-body #diigotb-upload-resizer div.gver {
  margin-top: auto!important;
  margin-bottom: auto!important;
  top: 0px!important;
  bottom: 0px!important;
}
	
.diigotb-body{
	padding-top: 31px!important;
}
	
.diigotb-body #diigotb-topbar{
  background: url(chrome://diigotb/skin/topbar-bg.png) left top repeat-x!important;
  border-bottom: 1px solid #999!important;
  color: #555!important;
  font: 12px/18px Helvetica,Arial,sans-serif!important;
  height: 30px!important;
  line-height: 30px!important;
  position: fixed!important;
  left: 0!important;
  top: 0!important;
  text-align:center!important;
  z-index:1999999!important;
}

.diigotb-body #diigotb-msg img{
  margin:0 5px 0 0!important;
  vertical-align: middle!important;
}
	
.diigotb-body #diigotb-msg{
	color:#333!important;
}

.diigotb-body #diigotb-msg a{
  color: #0044cc!important;
  text-decoration: none!important;
}

.diigotb-body #diigotb-msg a:hover{
  text-decoration: underline!important;
}

.diigotb-body #diigotb-escLink{
  display: block!important;
  float: right!important;
  margin: 5px 5px 0 0!important;
  text-decoration: none!important;
  width: 50px!important;
  cursor:pointer!important;
}

.diigotb-body #diigotb-escLink:hover{
  text-decoration: underline!important;
}

.diigotb-body #diigotb-escLink span{
  background: url(chrome://diigotb/skin/esc-right.png) right top no-repeat!important;
  display: block!important;
  padding-right: 9px!important;
}

.diigotb-body #diigotb-escLink span strong{
  background: url(chrome://diigotb/skin/esc-left.png) left top no-repeat!important;
  display: block!important;
  color: #fff!important;
  font-weight: 700!important;
  line-height: 20px!important;
  text-indent:7px!important;
}
	
	

/*highlight label*/
.diigoHighlight .diigoHighlightLabel sup {
	font:normal normal normal 8px/8px "lucida grande",tahoma,verdana,arial,sans-serif;
	text-decoration:none;
	background-color:inherit;
	cursor:default;
}
	
body.diigoHiPen.yellow{
	cursor:url(chrome://diigotb/skin/highlighter-orange.cur), text !important
}
	
body.diigoHiPen.blue{
	cursor:url(chrome://diigotb/skin/highlighter-blue.cur), text !important
}

body.diigoHiPen.green{
	cursor:url(chrome://diigotb/skin/highlighter-green.cur), text !important
}	
	
body.diigoHiPen.pink{
	cursor:url(chrome://diigotb/skin/highlighter-pink.cur), text !important
}
em.diigoHighlight.type_0.commented {	
	padding-left:30px;
}
	
/*float note*/
div.diigoHighlight.type_2 {
	position:absolute;
	width:29px;
	height:36px;
	text-align:center;
	background:transparent url('chrome://diigotb/skin/float_icon.png') no-repeat 50% 50%;
	z-index:9996;
}
div.diigoHighlight.type_2.mouseOvered {
	position:absolute;
	width:37px;
	height:31px;
	text-align:center;
	background:transparent url('chrome://diigotb/skin/float_icon.png') no-repeat;
	z-index:9996;
}	
div.diigoHighlight.type_2 span {
	color:#000;
	font:bold 13px Arial, Helvetica, sans-serif;
	cursor: default;
	line-height: 37px;
	text-shadow: #fff 0 1px 0;
}
/*
* html div.diigoHighlight.type_2{
	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true,sizingMethod=scale, src="http://www.diigo.com/javascripts/webtoolbar/images/float_icon.png");
	overflow:hidden;
	background:none;
}
*/
	

div.diigoIcon.commented.TextIcon.diigoEdit{
	background-repeat:no-repeat !important;
	background-position:right !important;
}

	
div.diigoIcon.commented.ImageIcon.diigoEdit{
	background-repeat:no-repeat !important;
	background-position:right !important;
}


/*mouse over effect*/
/*
.diigoHighlight.id_190e5778b533dc0fa1b1660653a4f6f5 {outline: 2px dotted green !important;}
*/
div.diigoIcon{
	cursor:pointer !important;
	margin: 0pt; 
	padding: 0px 0px 0px 0px;
	position: absolute;
	display:none;
	width: 24px !important; 
	z-index:999999;
	height: 23px !important;
	background: transparent url('chrome://diigotb/skin/edit-highlight.png') no-repeat left;
}

div.diigoIcon span{
	color:#000000;
	display:block;
	font-family:Helvetica,Arial,sans-serif;
	font-size:13px;
	font-weight:700;
	line-height:18px;
	text-align:center;
	text-shadow:0 1px 1px #FFFFFF;
}

div.diigoIcon.commented.ImageIcon{
	display:block !important;
	background-color: transparent !important;
}
	
div.diigoIcon:hover{
	background-color: transparent !important;
	background-repeat:no-repeat !important;
	background-position:right !important;
}
	
div.diigoIcon.commented.TextIcon{
	display:block !important;
	left:0;
	bottom:0;
}
	
div.diigoIcon.commented.public{
	background: #FFFFFF url('chrome://diigotb/skin/public-annotation.png') no-repeat left;
}

div.diigoIcon.commented.private{
	background: #FFFFFF url('chrome://diigotb/skin/private-annotation.png') no-repeat left;
}
	
div.diigoIcon.commented.group{
	background: #FFFFFF url('chrome://diigotb/skin/group-annotation.png') no-repeat left;
}
	
/*Clip video*/
div.diigoClipVideo{
	float:left;
	height:16px;
	padding:0 16px 0 6px;
	background:#f5f5f5 url(chrome://diigotb/skin/toolbar-clip-bg.gif) no-repeat right 0;
	border:1px solid #ccc;
	border-bottom-width:0;
	font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
	z-index:999;
	position:absolute;
}

div.diigoClipVideo.clipped {
  background-position: right -32px; left: 717px; top: 135px;
}

	div.diigoClipVideo span{
		font-weight:bold;
		font-size:10px;
		line-height:16px;
		text-decoration:underline;
		color:#03f;
		cursor:pointer;
		margin-right:6px
	}
	div.diigoClipVideo span:hover,div.diigoClipVideo span:active{
		color:#00f
	}
	/*.diigolet input{
		font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
		font-size:9px;
	}*/
	
/*-----------notice msg--------------*/
.diigotb-notice-img  {
	float:left!important;
	height:16px!important;
	width:16px!important;
	margin-top:6px!important;
	margin-right:3px!important;
}
.success .diigotb-notice-img{
	background:url("chrome://diigotb/skin/notice-icons.png") no-repeat scroll 0 0 transparent!important;
}
.failed .diigotb-notice-img{
	background:url("chrome://diigotb/skin/notice-icons.png") no-repeat scroll -16px 0 transparent!important;
}
.info .diigotb-notice-img{
	background:url("chrome://diigotb/skin/notice-icons.png") no-repeat scroll -32px 0 transparent!important;
}
.process .diigotb-notice-img{
	background:url("chrome://diigotb/skin/processing.gif") no-repeat scroll left 0 transparent!important;
}	
	
.diigotb-notice-msg-rt  {
	background:url("chrome://diigotb/skin/notice-bar-2-bg-left.png") no-repeat scroll left bottom transparent!important;
	line-height:28px!important;
	padding-left:10px!important;
	height:30px!important;
}
.failed .diigotb-notice-msg-rt  {
	background:url("chrome://diigotb/skin/notice-bar-2-bg-left.png") no-repeat scroll left top transparent!important;
}
	
.diigotb-notice-close{
	float:right!important;
	height:16px!important;
	width:16px!important;
	margin-left:20px!important;
	margin-top:6px!important;
	cursor:pointer;
	background:url("chrome://diigotb/skin/notice-icons.png") no-repeat scroll -48px 0 transparent!important;
}

.diigotb-notice-close:hover{
	background-position: -63px 0!important;
}
	
.diigotb-notice-msg  {
	background:url("chrome://diigotb/skin/notice-bar-2-bg-right.png") no-repeat scroll right bottom transparent!important;
	float:right!important;
	height:30px!important;
	padding:0 11px 0 0!important;
	border: none!important;
	margin:0!important;
	position:fixed!important;
	font:12px/14px Helvetica,Arial,sans-serif!important;
	z-index:100000!important;
}
.diigotb-notice-msg a {
	color:#0044cc!important; 
	text-decoration:underline!important;
}
	
.failed.diigotb-notice-msg  {
	background:url("chrome://diigotb/skin/notice-bar-2-bg-right.png") no-repeat scroll right top transparent!important;
}
	
}


@media print{
em.diigoHighlight.a, em.diigoHighlight.b, em.diigoHighlight.c {
	border-bottom:0.5pt dashed Black;
}


/*image highlight*/
/*no inline comments*/
img.diigoHighlight {
	border:0.5pt dashed Black
}

/*float note*/
div.diigoHighlight.type_2 {
	display:none
}
div.diigoHighlight.type_2 span {
	display:none
}
}</style><style id="diigo-activeHighlight" type="text/css">dummyRuleForDigg{}</style></head><body>[{"ref":"BL","lib":"Antenne
 - BL","nb batiment":"158","nb logement":"2458","nb loc. act.":"11","nb 
loc. velo":"11","nb commerce":"0","nb bat. admi.":"1","nb foyer":"0","nb
 residence":"2"},{"ref":"CA","lib":"Antenne - CA","nb 
batiment":"201","nb logement":"3273","nb loc. act.":"17","nb loc. 
velo":"15","nb commerce":"0","nb bat. admi.":"1","nb foyer":"1","nb 
residence":"1"},{"ref":"CV","lib":"Antenne - CV","nb batiment":"185","nb
 logement":"3433","nb loc. act.":"14","nb loc. velo":"0","nb 
commerce":"11","nb bat. admi.":"1","nb foyer":"2","nb 
residence":"6"},{"ref":"ddd","lib":"antenne","nb batiment":"1","nb 
logement":"1","nb loc. act.":"0","nb loc. velo":"0","nb 
commerce":"0","nb bat. admi.":"0","nb foyer":"0","nb 
residence":"0"},{"ref":"MR","lib":"Antenne - MR","nb batiment":"172","nb
 logement":"2477","nb loc. act.":"40","nb loc. velo":"0","nb 
commerce":"3","nb bat. admi.":"2","nb foyer":"1","nb 
residence":"1"},{"ref":"QS","lib":"Antenne - QS","nb batiment":"237","nb
 logement":"3074","nb loc. act.":"34","nb loc. velo":"4","nb 
commerce":"14","nb bat. admi.":"20","nb foyer":"2","nb 
residence":"4"},{"ref":"UCUN","lib":"Antenne - UCUN","nb 
batiment":"1","nb logement":"0","nb loc. act.":"0","nb loc. 
velo":"0","nb commerce":"0","nb bat. admi.":"0","nb foyer":"0","nb 
residence":"0"}]</body></html>