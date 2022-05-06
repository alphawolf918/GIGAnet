// Copyright (C) 2008 InstantService.com, Inc. All rights reserved.
var ii_jsvar = new Object();
ii_Var.publishversion = '1452922958';

ii_Var.scrinc = '';

ii_Var.stringTypes = [0,0,0,0,0,0,0,0];
ii_Var.stringNoContain = [];
ii_Var.urlStrings = ['www.verisign.com/ssl/buy-ssl-certificates','http://www.rapidssl.com/ssl-certificate','http://www.verisign.com/trust-seal/features-benefits','http://www.verisign.com/trust-seal/','http://www.verisign.com.au/ssl','http://www.verisign.com.au/trust-seal/','http://www.verisign.com.sg/ssl','http://www.verisign.com.au/trust-seal'];

var ii_Inv = [
[14418,'Chat with US Sales',1,'','invitelayer',2,5,30,2,0,'https://www.verisign.com/assets/chat/images/chat-gray-bkg.gif ',350,199,53,115,'https://www.verisign.com/assets/chat/images/chat-gray-accept.gif','','https://admin.instantservice.com/links/5851/14753',2,0,0,186,115,'https://www.verisign.com/assets/chat/images/chat-gray-decline.gif','','','','','','','','','',''],
[15040,'Chat with Tech Support - Capture CSR',1,'','invitelayer',2,5,30,2,0,'https://www.verisign.com/assets/chat/images/chat-gray-bkg.gif ',350,199,35,120,'https://www.verisign.com/assets/chat/images/chat-gray-accept.gif','','https://admin.instantservice.com/Customer?ai=5851\u0026di=25856\u0026optionaldata1=\u0027+error_message+\u0027',1,500,320,180,120,'https://www.verisign.com/assets/chat/images/chat-gray-decline.gif','','','','','','','','','',''],
[15058,'Chat with Tech Support -- Order Summary',1,'','invitelayer',2,5,30,2,0,'https://www.verisign.com/assets/chat/images/chat-gray-bkg.gif ',350,199,35,120,'https://www.verisign.com/assets/chat/images/chat-gray-accept.gif','','https://admin.instantservice.com/Customer?ai=5851\u0026di=25856\u0026optionaldata1=\u0027+error_message+\u0027',1,500,320,180,120,'https://www.verisign.com/assets/chat/images/chat-gray-decline.gif','','','','','','','','','',''],
[35860,'Chat with RAPIDSSL Sales US',1,'','invitelayer',2,5,30,2,0,'http://www.rapidssl.com/assets/images/chat/chat-gray-bkg.gif  ',350,199,68,115,'http://www.rapidssl.com/assets/images/chat/accept.gif','','https://admin.instantservice.com/links/5851/18458',1,500,320,198,115,'http://www.rapidssl.com/assets/images/chat/decline.gif','','','','','','','','','',''],
[39200,'Chat with VRSN Trust Seal Sales US',1,'','invitelayer',2,5,30,2,0,'https://www.verisign.com/assets/chat/images/chat-gray-bkg.gif ',350,199,53,115,'https://www.verisign.com/assets/chat/images/chat-gray-accept.gif','','https://admin.instantservice.com/links/5851/39897',1,500,320,186,115,'https://www.verisign.com/assets/chat/images/chat-gray-decline.gif','','','','','','','','','',''],
[47980,'Chat with ANZ Sales (68340)',1,'','invitelayer',2,5,30,2,0,'https://www.verisign.com/assets/chat/images/chat-gray-bkg.gif ',350,199,53,115,'https://www.verisign.com/assets/chat/images/chat-gray-accept.gif','','https://admin.instantservice.com/links/5851/16144',2,0,0,186,115,'https://www.verisign.com/assets/chat/images/chat-gray-decline.gif','','','','','','','','','',''],
[48000,'Proactive chat with ASIA SSL website sales.',1,'','invitelayer',2,5,30,2,0,'https://www.verisign.com/assets/chat/images/chat-gray-bkg.gif ',350,199,53,115,'https://www.verisign.com/assets/chat/images/chat-gray-accept.gif','','https://admin.instantservice.com/links/5851/16145',2,0,0,186,115,'https://www.verisign.com/assets/chat/images/chat-gray-decline.gif','','','','','','','','','','']
];

var ii_Rules = [
[17472,0,14418,0,'Chat with US Sales',['50`120`6`0``0`0','4`0`7`0`1`6`0'],1,1,'14753',0,'','',''],
[45960,0,35860,0,'Chat with RAPIDSSL Sales US',['50`120`6`0``0`0','4`1`7`0`1`6`0'],1,1,'18458',0,'','',''],
[52040,0,39200,0,'Chat with VRSN Trust Seal Sales US',['50`120`6`0``0`0','4`2`7`0`1`6`0','4`3`7`0`1`6`0'],1,1,'39897',0,'','',''],
[68340,1,47980,0,'Chat with ANZ Sales SSL Pages',['50`30`6`0``0`0','4`4`7`0`1`6`0'],1,1,'16144',0,'','',''],
[96050,1,47980,0,'Chat with ANZ Sales Trust Seal',['50`30`6`0``6`0','4`5`7`0`1`6`0'],1,1,'16144',0,'','',''],
[68360,1,48000,0,'Chat with Singapore Sales SSL Pages',['50`30`6`0``0`0','4`6`7`0`1`6`0'],1,1,'16145',0,'','',''],
[96051,1,48000,0,'Chat with Singapore Sales Trust Seal Pages',['50`30`6`0``0`0','4`7`7`0`1`6`0'],1,1,'16145',0,'','','']
];

ii_Var.CustomOfferedJS = 'var trackingImage = new Image(); if(typeof(error_message)!=\u0027undefined\u0027){trackingImage.src = \u0022https://www.verisign.com/images/enroll/vspchat.gif?Log=1&event_type=Invitation_Offered&event_id=[%INVITATIONID%]&event_name=[%INVITATIONNAME%]&error=\u0022 + error_message + \u0022&page=\u0022 + document.location;}else{trackingImage.src = \u0022https://www.verisign.com/images/enroll/vspchat.gif?Log=1&event_type=Invitation_Offered&event_id=[%INVITATIONID%]&event_name=[%INVITATIONNAME%]&error=&page=\u0022 + document.location;}';
ii_Var.CustomAcceptedJS = 'var trackingImage = new Image(); if(typeof(error_message)!=\u0027undefined\u0027){trackingImage.src = \u0022https://www.verisign.com/images/enroll/vspchat.gif?Log=1&event_type=Invitation_Accepted&event_id=[%INVITATIONID%]&event_name=[%INVITATIONNAME%]&error=\u0022 + error_message + \u0022&page=\u0022 + document.location;}else{trackingImage.src = \u0022https://www.verisign.com/images/enroll/vspchat.gif?Log=1&event_type=Invitation_Accepted&event_id=[%INVITATIONID%]&event_name=[%INVITATIONNAME%]&error=&page=\u0022 + document.location;}';
ii_Var.CustomDeclinedJS = 'var trackingImage = new Image(); if(typeof(error_message)!=\u0027undefined\u0027){trackingImage.src = \u0022https://www.verisign.com/images/enroll/vspchat.gif?Log=1&event_type=Invitation_Declined&event_id=[%INVITATIONID%]&event_name=[%INVITATIONNAME%]&error=\u0022 + error_message + \u0022&page=\u0022 + document.location;}else{\u0022https://www.verisign.com/images/enroll/vspchat.gif?Log=1&event_type=Invitation_Declined&event_id=[%INVITATIONID%]&event_name=[%INVITATIONNAME%]&error=&page=\u0022 + document.location;}';
ii_Var.CustomTriggeredJS = 'var trackingImage = new Image(); if(typeof(error_message)!=\u0027undefined\u0027){trackingImage.src = \u0022https://www.verisign.com/images/enroll/vspchat.gif?Log=1&event_type=Rule_Triggered&event_id=[%RULEID%]&event_name=[%RULENAME%]&error=\u0022 + error_message + \u0022&page=\u0022 + document.location;}else{\u0022https://www.verisign.com/images/enroll/vspchat.gif?Log=1&event_type=Rule_Triggered&event_id=[%RULEID%]&event_name=[%RULENAME%]&error=&page=\u0022 + document.location;}';
